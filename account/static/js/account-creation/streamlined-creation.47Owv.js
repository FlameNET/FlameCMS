/**
 * Password validation and strength rating.
 *
 * @copyright   2011, Blizzard Entertainment, Inc
 * @class       Password
 */
var Password = Class.extend({

	/**
	 * Regex patterns for password validation.
	 * passwordPattern1: The ASCII printable character set
	 * passwordPattern2: At least one letter and one number
	 * maxRepetition: Use lower values to permit greater repetition.
	 * maxSequentiality: Use lower values to permit greater sequentiality.
     * maxSimilarity: Max similar characters allowed between password and email.
	 */
	passwordPattern1: new RegExp(),
	passwordPattern2: new RegExp(),
	maxRepetition: 0,
	maxSequentiality: 0,
    maxSimilarity: 0,

	/**
	 * Configuration.
	 */
	config: {},

	/**
	 * Initialize the class and apply the config.
	 */
	init: function(config) {

		config = typeof config !== 'undefined' ? config : {};

		// Merge configuration
		this.config = $.extend({
			passwordPattern1: new RegExp('^[\x20-\x7E]+$'),
			passwordPattern2: new RegExp('^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*).+$'),
			maxRepetition: 2,
			maxSequentiality: 4,
            maxSimilarity: 4
		}, config);

		config = this.config;

		this.passwordPattern1 = config.passwordPattern1;
		this.passwordPattern2 = config.passwordPattern2;
		this.maxRepetition = config.maxRepetition;
		this.maxSequentiality = config.maxSequentiality;
        this.maxSimilarity = config.maxSimilarity;

	},

	/**
	 * Check password to ensure it meets minimum requirements.
	 * Returns 0 if condition was not checked or password was empty.
	 * Returns -1 if condition was not met.
	 * Returns 1 if condition was met.
	 *
	 * @param password1 The password to be checked.
	 * @param password2 The re-entered password.
	 * @param email The user’s email address.
	 */
	check: function(password1, password2, email) {

		password1 = typeof password1 !== 'undefined' ? password1 : '';
		password2 = typeof password2 !== 'undefined' ? password2 : '';
		email = typeof email !== 'undefined' ? email : '';

		var results = [0, 0, 0, 0, 0];

		if (password1.length > 0) {
			// Password must be between 8–16 characters in length.
			if (password1.length >= 8 && password1.length <= 16) {
				results[0] = 1;
			} else {
				results[0] = -1;
			}
			// Password may only contain ASCII printable characters.
			if (this.passwordPattern1.test(password1)) {
				results[1] = 1;
			} else {
				results[1] = -1;
			}
			// Password must contain at least one alphabetic character and one numeric character.
			if (this.passwordPattern2.test(password1)) {
				results[2] = 1;
			} else {
				results[2] = -1;
			}
			// Cannot use password similar to account name.
            results[3] = this.isSimilar(password1, email);

			// Passwords must match.
			if (password2 === '') {
				results[4] = 0;
			} else if (password1 === password2) {
				results[4] = 1;
			} else {
				results[4] = -1;
			}
		}

		return results;
	},

    /**
     * Check if password is similar to account name.
     * Returns -1 if similar.
     * Returns 1 if not.
     *
     * @param password1 The password to be checked.
     * @param email The user’s email address.
     */
    isSimilar: function(password1, email) {
        if (password1 === "" || email === "" || password1.length < this.maxSimilarity) {
            return 1;
        }
        password1 = password1.toLowerCase();
        email = email.toLowerCase();
        for (var i = 0; i <= email.length - this.maxSimilarity; i++) {
            if (password1.indexOf(email.substring(i, i + this.maxSimilarity)) > -1) {
                return -1;
            }
        }
        return 1;
    },

	/**
	 * Rate a password’s strength.
	 * Returns 0 if password is empty or untested.
	 * Returns 1 if password is too short.
	 * Returns 2 if password is weak.
	 * Returns 3 if password is fair.
	 * Returns 4 if password is strong.
	 *
	 * @param password1 The password to be rated.
	 */
	rate: function(password1) {

		password1 = typeof password1 !== 'undefined' ? password1 : '';
		
		var result = 0;

		if (password1.length > 0) {
			if (password1.length >= 8) {
				if (this.passwordPattern1.test(password1) && this.passwordPattern2.test(password1) && password1.length > 10 && !this.hasRepetition(password1) && !this.hasSequentiality(password1)) {
					result = 4;
				} else {
					if (this.passwordPattern1.test(password1) && this.passwordPattern2.test(password1) && password1.length > 8 && !this.hasRepetition(password1) && !this.hasSequentiality(password1)) {
						result = 3;
					} else {
						result = 2;
					}
				}
			} else {
				result = 1;
			}
		}

		return result;

	},

	/**
	 * Check for repetition in a string.
	 * Returns true if the string has high repetition, false otherwise.
	 *
	 * @param string The string to check.
	 */
	hasRepetition: function(string) {

		string = typeof string !== 'undefined' ? string : '';
		pLen = typeof pLen !== 'undefined' ? pLen : 2;

		var pLen = this.maxRepetition,
			res = '',
			repeated;

		for (var i = 0, len = string.length; i < len; i++) {
			repeated = true;
			for (var j = 0; j < pLen && (j + i + pLen) < string.length; j++) {
				repeated = repeated && (string.charAt(j + i) === string.charAt(j + i + pLen));
			}
			if (j < pLen) {
				repeated = false;
			}
			if (repeated) {
				i += pLen - 1;
				repeated = false;
			} else {
				res += string.charAt(i);
			}
		}

		return res.length - string.length < 0;

	},

	/**
	 * Check for sequentiality in a string.
	 * Returns true if the string has high sequentiality, false otherwise.
	 *
	 * @param string The string to check.
	 */
	hasSequentiality: function(string) {

		string = typeof string !== 'undefined' ? string.toLowerCase() : '';

		var pLen = this.maxSequentiality,
			lowercase = 'abcdefghijklmnopqrstuvwxyz',
			lowercaseReverse = lowercase.split('').reverse().join(''),
			numbers = '1234567890',
			numbersReverse = numbers.split('').reverse().join(''),
			qwerty = 'qwertyuiopasdfghjklzxcvbnm!@#$%^&*()_+',
			qwertyReverse = qwerty.split('').reverse().join(''),
			chunk = ' ' + string.slice(0, pLen - 1);

		for (var i = pLen, len = string.length; i < len; i++) {
			chunk = chunk.slice(1) + string.charAt(i);
			if (lowercase.indexOf(chunk) > -1 || numbers.indexOf(chunk) > -1 || qwerty.indexOf(chunk) > -1 ||
				lowercaseReverse.indexOf(chunk) > -1 || numbersReverse.indexOf(chunk) > -1 || qwertyReverse.indexOf(chunk) > -1) {
				return true;
			}
		}

		return false;

	}


});

/**
 * Email validation.
 *
 * @copyright   2011, Blizzard Entertainment, Inc
 * @class       Email
 */
var Email = Class.extend({

	/**
	 * Regex patterns for password validation.
	 */
	emailPattern: new RegExp(),

	/**
	 * Configuration.
	 */
	config: {},

	/**
	 * Initialize the class and apply the config.
	 */
	init: function(config) {

		config = typeof config !== 'undefined' ? config : {};

		// Merge configuration
		this.config = $.extend({
			emailPattern: new RegExp('^[0-9a-zA-Z+_.-]+@[0-9a-zA-Z_-]+\\.[0-9a-zA-Z_.-]+$')
		}, config);

		this.emailPattern = this.config.emailPattern;

	},

	/**
	 * Check email address to ensure it meets minimum requirements.
	 * Returns 0 if condition was not checked or email was empty.
	 * Returns -1 if condition was not met.
	 * Returns 1 if condition was met.
	 *
	 * @param email1 The email address to be checked.
	 * @param email2 The re-entered email address (only checked if config.verify is true).
	 */
	check: function(email1, email2) {

		email1 = typeof email1 !== 'undefined' ? email1 : '';
		email2 = typeof email2 !== 'undefined' ? email2 : '';

		var results = [0, 0];

		if (email1 === '') {
			results[0] = 0; // no data
		} else if (this.emailPattern.test(email1)) {
			results[0] = 1; // valid
		} else {
			results[0] = -1; // invalid
		}

		if (email1 === '') {
			results[1] = 0; // no data
		} else if (email1.toLocaleLowerCase() === email2.toLocaleLowerCase()) {
			results[1] = 1; // match
		} else {
			results[1] = -1; // mismatch
		}

		return results;

	}

});

/**
 * Account creation utility.
 *
 * @copyright   2011, Blizzard Entertainment, Inc
 * @class       Creation
 */
var Creation = Class.extend({

	/**
	 * jQuery objects for specific elements.
	 */
	form: null,
	countryAvailable: false,
	countrySelect: null,
	countryWarning: null,
	countrySubmit: null,
	countryCancel: null,
	countryDefault: null,
	countryBlockable: null,
	countryBlock: null,
	countryOriginal: null,
	countryBlocked: null,

	emailInput1: null,
	emailMessage1: null,
	emailInput2: null,
	emailMessage2: null,
	emailRight: null,
	emailLeft: null,
	emailValidator: new Email(),
	emailValidated: false,
	emailConfirmationValidated: false,
	emailTimer: null,
	activeEmailInput: -1,
	useAutocomplete: false,
	autocompleteOptions: {},
	domains: [],
	usernameTest: new RegExp(),

	contactInput1: null,
	contactMessage1: null,
	contactInput2: null,
	contactMessage2: null,
	contactRight: null,
	contactLeft: null,
	contactValidated: false,
	contactConfirmationValidated: false,
	contactTimer: null,
	contactInfo: null,
	showContactInfo: false,

	passwordInput1: null,
	passwordMessage1: null,
	passwordMessage1Default: null,
	passwordInput2: null,
	passwordMessage2: null,
	passwordMessage2Default: null,
	passwordRight: null,
	passwordLeft: null,
	passwordResult: null,
	passwordRating: null,
	passwordLevels: [],
	passwordGuidelines: null,
	passwordValidator: new Password(),
	passwordValidated: false,
	passwordTimer: null,
	passwordGuidelinesTimer: null,
	goodPassword:false,
	showPasswordGuidelines: true,
	activePasswordInput: -1,

	secretQuestion: null,
	secretAnswer: null,
	secretInfo: null,
	secretTimer: null,
	showSecretInfo: false,

	slideUpDuration: 125,
	slideDownDuration: 250,

	focusElements: null,
	warningLines: null,

	requiredFieldsQuery: "",
	missingRequiredAgreementsQuery: "",

	allFields: null,

	fieldParentsQuery: "",
	fieldLabelsQuery: "",
	inputErrorClass: "",

	errorContainerQuery: "",
	errorMessageWrapperQuery: "",

	contentContainerQuery: "",
	contentContainer: null,

	inlineMessageQuery: "",
	inlineMessageDefaultQuery: "",
	inlineMessageInformationQuery: "",
	inlineMessageWarningQuery: "",

	contactInfoArrowQuery: "",
	contactInfoArrow: null,

	animationLength: 0,
	leftArrowPosition: "",
	rightArrowPosition: "",

	/**
	 * Configuration.
	 */
	config: {},

	/**
	 * Initialize the class and apply the config.
	 *
	 * @param form The account creation form (e.g., '#creation').
	 * @param config An optional config object.
	 */
	init: function(form, config) {
		config = typeof config !== 'undefined' ? config : {};
		form = $(form);

		if (form.length) {
			if (form[0].tagName.toLowerCase() !== 'form') {
				form = form.find('form');
			}

			this.form = (form.length) ? form : null;
		}

		if (this.form !== null) {
			// Merge configuration
			this.config = $.extend({
				showContactInfo: false,
				contactFields: [
					'#parentContactEmail',
					'#parentContactEmailConfirmation'
				],
				emailFields: [
					'#emailAddress',
					'#emailAddressConfirmation'
				],
				passwordFields: [
					'#password',
					'#rePassword'
				],
				secretFields: [
					'#question1',
					'#answer1'
				],
				domains: []
			}, config);
			// Setup the class
			this.setup();
		}

	},

	/**
	 * Find the elements, bind the event handlers, reticulate splines.
	 */
	setup: function() {

		var form = this.form;

		this.countrySelect = $('#country');
		if (this.countrySelect.length) {
			this.countryAvailable = true;
			this.countryDefault = this.countrySelect.find(':selected')[0].value;
			this.countryWarning = $('#country-warning');
			this.countryGlobal = $('#countryGlobal');
			this.countryCHINA = $('#countryCHINA');
			this.countrySubmit = this.countryWarning.find('a.ui-button');
			this.countryCancel = this.countryWarning.find('a.ui-cancel');
			this.countryBlockable = $('#country-change');
			this.countryBlock = $('#country-change-overlay');

			if (!this.countryDefault) {
				this.countryBlocked = true;
			}
		}

		this.emailInput1 = $(this.config.emailFields[0]);
		this.emailMessage1 = $(this.config.emailFields[0] + '-message');
		this.emailInput2 = $(this.config.emailFields[1]);
		this.emailMessage2 = $(this.config.emailFields[1] + '-message');
		this.emailRight = this.emailInput1.parents('span.input-right');
		this.emailLeft = this.emailRight.siblings('span.input-left');

		this.showContactInfo = this.config.showContactInfo;
		if (this.config.showContactInfo) {
			this.contactInput1 = $(this.config.contactFields[0]);
			this.contactMessage1 = $(this.config.contactFields[0] + '-message');
			this.contactInput2 = $(this.config.contactFields[1]);
			this.contactMessage2 = $(this.config.contactFields[1] + '-message');
			this.contactRight = this.contactInput1.parents('span.input-right');
			this.contactLeft = this.contactRight.siblings('span.input-left');
			this.contactInfo = $('#contact-info');
		}

		this.passwordInput1 = $(this.config.passwordFields[0]);
		this.passwordMessage1 = $(this.config.passwordFields[0] + '-message');
		this.passwordMessage1Default = this.passwordMessage1.text();
		this.passwordInput2 = $(this.config.passwordFields[1]);
		this.passwordMessage2 = $(this.config.passwordFields[1] + '-message');
		this.passwordMessage2Default = this.passwordMessage2.text();
		this.passwordRight = this.passwordInput1.parents('span.input-right');
		this.passwordLeft = this.passwordRight.siblings('span.input-left');
		this.passwordResult = $('#password-result');
		this.passwordRating = $('#password-rating');
		this.passwordGuidelines = $('#password-strength');

		for (var i = 0; i < 5; i++)
			this.passwordLevels[i] = $('#password-level-' + i);

		this.secretQuestion = $(this.config.secretFields[0]);
		this.secretAnswer = $(this.config.secretFields[1]);
		this.secretInfo = $('#question-info');

		this.focusElements = $('body, label, select, input, a.input-checkbox, button');
		this.warningLines = form.find('.inline-message');

		if (this.config.domains.length) {
			this.useAutocomplete = true;
			this.domains = this.config.domains;
			this.autocompleteOptions = {
				minChars: 0,
				matchSubset: false,
				matchContains: true,
				source: []
			}
			this.usernameTest = new RegExp("^[0-9a-zA-Z+_.-]+@+$");
		}

		this.showPasswordGuidelines = this.config.showPasswordGuidelines || true;

		this.requiredFieldsQuery = "#creation [required='required']";
		this.missingRequiredAgreementsQuery = "#creation input[required='required'][type='checkbox']";

		this.allFields = $("#creation select, #creation input");

		this.fieldParentsQuery = "span.input-text, span.input-right";
		this.fieldLabelsQuery = "span.input-left";
		this.inputErrorClass = "input-error";
		this.submitButton = $("#creation-submit");

		this.errorContainerQuery = "#content > .error";
		this.errorMessageWrapperQuery = ".alert-message";

		this.contentContainerQuery = this.config.contentContainerQuery || "#content";
		this.contentContainer = $(this.contentContainerQuery);

		this.inlineMessageQuery = ".tip-inline";
		this.inlineMessageDefaultQuery = ".tip-default";
		this.inlineMessageInformationQuery = ".tip-information";
		this.inlineMessageWarningQuery = ".tip-warning";

		this.contactInfoArrowQuery = "#contact-info .input-note-arrow";
		this.contactInfoArrow = $(this.contactInfoArrowQuery);

		this.animationLength = 250;
		this.leftArrowPosition = "146px";
		this.rightArrowPosition = "468px";

		this.registerEvents();
	},

	/**
	 * Setup event bindings
	 */
	registerEvents: function() {
		if (this.countryAvailable) {
			// Confirm country change
			this.countrySelect.on("change",
				$.proxy(this.changeCountry, this)
			);
	
			// Cancel country change
			this.countryCancel.on("click",
				$.proxy(this.resetCountry, this)
			);
		}

		// Email validation
		this.emailInput1
			.on("focus",
				$.proxy(this.toggleTip, this, this.emailMessage1, this.inlineMessageInformationQuery)
			)
			.on("focusout",
				$.proxy(this._validateEmail, this, this.emailInput1, this.emailInput2)
			);

		// Email confirmation validation
		this.emailInput2.on("keyup focusout",
			$.proxy(this._validateEmailConfirmation, this, this.emailInput1)
		);

		// Add auto-completion options (if any provided)
		if (this.useAutocomplete) {
			this.emailInput1.on("keyup",
				$.proxy(this._completeEmail, this)
			);
			this.emailInput2.on("keyup",
				$.proxy(this._completeEmail, this)
			);
		}

		if (this.showContactInfo) {
			// Parent contact email event handling
			this.contactInput1.on("focus focusout",
				$.proxy(this._routeParentContactActions, this)
			);

			// Parent contact email confirmation event handling
			this.contactInput2.on("focus focusout",
				$.proxy(this._routeParentContactActions, this)
			);
		}

		// Password validation/rating
		this.passwordInput1.on("focus input focusout",
			$.proxy(this._routePasswordActions, this)
		);

		// Password confirmation validation
		this.passwordInput2.on("focus input focusout",
			$.proxy(this._routePasswordActions, this)
		);

		// Toggle inline tip for secret question
		this.secretQuestion
			.on("focus",
				$.proxy(this.toggleTip, this, this.secretInfo, this.inlineMessageInformationQuery)
			)
			.on("focusout",
				$.proxy(this.toggleTip, this, this.secretInfo, this.inlineMessageDefaultQuery)
			);

		// Toggle inline tip for secret answer
		this.secretAnswer
			.on("focus",
				$.proxy(this.toggleTip, this, this.secretInfo, this.inlineMessageInformationQuery)
			)
			.on("focusout",
				$.proxy(this.toggleTip, this, this.secretInfo, this.inlineMessageDefaultQuery)
			);

		// Validate form contents before posting data
		this.form.on("submit",
			$.proxy(this.validateForm, this)
		);
	},

	/**
	 * Validates form entry
	 * 
	 * @param  {DOM event} evt	Triggering event (form submit)
	 * 
	 * @return {Boolean}		Indicates form should submit
	 */
	validateForm: function(evt) {
		var errors = [],
			badFields = [],
			missingRequiredFields = null;
			missingRequiredAgreements = null;

		// Clear previous errors and highlighting (if any)
		this.toggleErrorDisplay(false);
		this.toggleErrorHighlighting(this.allFields, false);

		// Check that a country is selected
		if (this.countryBlocked) {
			errors.push(FormMsg.selectCountry);
			badFields.push(document.getElementById("country"));
		} else {
			missingRequiredFields = $(this.requiredFieldsQuery).filter(function() { return !this.value; } );
			missingRequiredAgreements = $(this.missingRequiredAgreementsQuery).filter(function() { return !this.checked; });

			// Check that all required fields have a value
			if (missingRequiredFields.length) {
				errors.push(FormMsg.fieldsMissing);
				if (missingRequiredFields.length) {
					missingRequiredFields.each(function() { badFields.push(document.getElementById(this.id)); });
				}
			}
			
			// Check that users has agreed to required legal texts
			if (missingRequiredAgreements.length) {
				if (missingRequiredAgreements.filter("#agreedToChatPolicy").length) {
					errors.push(FormMsg.errorChat);
				}
				if (missingRequiredAgreements.filter("#agreedToAntiCheating").length) {
					errors.push(FormMsg.errorAntiCheating);
				}
				if (missingRequiredAgreements.filter("#agreedToToU").length) {
					errors.push(FormMsg.tosDisagree);
				}
				if (missingRequiredAgreements.not("#agreedToChatPolicy, #agreedToAntiCheating, #agreedToToU").length) {
					// Catch all unagreed legal message
					errors.push(FormMsg.errorTerms);
				}
				missingRequiredAgreements.each(function() { badFields.push(document.getElementById(this.id)); });
			}
			if (this.passwordInput1.val() && !this.checkPassword()) {
				errors.push(FormMsg.passwordInvalid);
			}
		}

		if (errors.length) {
			// Show errors
			this.toggleErrorDisplay(true, errors);
			this.toggleErrorHighlighting(badFields, true);
			return false;
		} else {
			// Post data
			return true;
		}
	},

	/**
	 * Toggles error highlighting of fields
	 * 
	 * @param {Collection} fields	Fields to change error highlighting
	 * @param {Boolean} error		Indicates if field has an error
	 */
	toggleErrorHighlighting: function(fields, error) {
		var parents = $(fields).parents(this.fieldParentsQuery),
			labels = parents.siblings(this.fieldLabelsQuery),
			action = error ? "addClass" : "removeClass";

		parents[action](this.inputErrorClass);
		labels[action](this.inputErrorClass);
	},

	/**
	 * Toggles client-side validation error display
	 * 
	 * @param {Boolean} show	Indicates to show error message
	 * @param {Array} errors	Errors to display
	 */
	toggleErrorDisplay: function(show, errors) {
		var previousError = $(this.errorContainerQuery),
			container = $(".templates .error").clone(),
			wrapper = container.find(this.errorMessageWrapperQuery),
			errorCount = 0,
			errorIterator = 0,
			errorListFragment = "";

		previousError.remove();

		if (show) {
			errorCount = errors.length;
			if (errorCount > 1) {
				errorListFragment = "<ul>";
				for (errorIterator = 0; errorIterator < errorCount; errorIterator++) {
					errorListFragment += "<li>" + errors[errorIterator] + "</li>";
				}
				errorListFragment += "</ul>";
				wrapper.append(errorListFragment);
			} else {
				wrapper.append("<p>" + errors[0] + "</p>");
			}

			this.contentContainer.prepend(container);
			window.scrollTo(0, 0);
		}
	},

	/**
	 * Toggles visible in-line field tip
	 * 
	 * @param {DOM object} element	In-line message element to manipulate
	 * @param {String} messageClass	Class of message to make visible
	 */
	toggleTip: function(element, messageClass) {
		element.find(this.inlineMessageQuery)
			.hide()
			.filter("." + messageClass).show();

		if (messageClass == this.inlineMessageWarningQuery) {
			this.toggleErrorHighlighting(element, true);
		} else {
			this.toggleErrorHighlighting(element, false);
		}
	},


	/**
	 * Block the form until the user confirms their country change (or cancels it).
	 */
	block: function() {
		this.countryBlock.height(this.countryBlockable.height()).show();
		this.countryBlockable.find('input').attr('disabled', 'disabled').removeClass('glow-shadow-2');
		this.countryBlockable.find('select').attr('disabled', 'disabled').removeClass('glow-shadow-2');
		this.countryBlockable.find('span.input-text').addClass('input-text-disabled');
		this.countryBlockable.find('span.input-select').addClass('input-select-disabled');
		this.countryBlockable.find('a.input-checkbox').addClass('input-checkbox-disabled');
		this.countryBlockable.find('a.input-checkbox-checked').addClass('input-checkbox-checked-disabled');
		this.countrySelect.addClass('input-select-disabled').removeClass('glow-shadow-2').attr('disabled', 'disabled');
	},

	/**
	 * Unblock the form.
	 */
	unblock: function() {
		this.countryBlock.hide();
		this.countryBlockable.find('input').removeAttr('disabled').addClass('glow-shadow-2');
		this.countryBlockable.find('select').removeAttr('disabled').addClass('glow-shadow-2');
		this.countryBlockable.find('span.input-text').removeClass('input-text-disabled');
		this.countryBlockable.find('span.input-select').removeClass('input-select-disabled');
		this.countryBlockable.find('a.input-checkbox').removeClass('input-checkbox-disabled');
		this.countryBlockable.find('a.input-checkbox-checked').removeClass('input-checkbox-checked-disabled');
		this.countrySelect.removeClass('input-select-disabled').addClass('glow-shadow-2').removeAttr('disabled');
	},

	/**
	 * Reset the current region to the default; cancel country change.
	 */
	resetCountry: function() {
		this.countrySelect.find('option[value="' + this.countryDefault + '"]')[0].selected = true;
		this.keepCountry();
	},

	/**
	 * Keep the current region; cancel country change.
	 */
	keepCountry: function() {
		this.unblock();
        // Disabling slide down animation in IE for performance.
        if( Core.browser === "ie6" || Core.browser === "ie7" ) {
		    this.countryWarning.hide();
        } else {
            this.countryWarning.slideUp(this.slideUpDuration);
        }
	},

	/**
	 * Create a link to reload the form with the newly selected country.
	 *
	 * @param {DOM event} evt	Triggering event (country change)
	 */
	changeCountry: function(evt) {
		var country = evt.currentTarget.value;
		this.countrySubmit[0].href = '?country=' + encodeURIComponent(country) + this.filterQueryString();
		if (this.countryBlocked) {
			window.location.href = this.countrySubmit[0].href;
		} else {
			this.block();
			if (country === "CHINA") {
				this.countryGlobal.hide();
				this.countryCHINA.show();
			}else{
				this.countryGlobal.show();
				this.countryCHINA.hide();
			}
	        // Disabling slide down animation in IE for performance.
	        if( Core.browser === "ie6" || Core.browser === "ie7" ) {
	            this.countryWarning.show();
	            this.countrySelect.hide().show();
	        } else {
	        	this.countryWarning.slideDown(this.slideDownDuration);
	            this.countrySelect.hide().show(10);
	        }
		}
	},

	/**
     * Filter and encode a query string.
	 *
	 * @param prefix Boolean indicating whether or not to prefix the string with '?'.
     */
    filterQueryString: function(prefix) {
    	prefix = prefix ? '?' : '&';
        var query = document.location.search,
            pairs = [],
            index = 0,
            key = '',
            val = '',
            result = '';
        query = query.substr(1);
        pairs = query.split('&');
        for (var i = 0, length = pairs.length; i < length; i++) {
            index = pairs[i].indexOf('=');
            key = encodeURIComponent(decodeURIComponent(pairs[i].substring(0, index)));
            val = encodeURIComponent(decodeURIComponent(pairs[i].substr(index + 1)));
            if (key !== 'style' && key !== 'ref' && key !== 'theme') {
                continue;
            }
            if (i === 0) {
                result = prefix + key + '=' + val;
            } else {
                result += '&' + key + '=' + val;
            }
        }
        return result;
    },

	/**
	 * Display in-line message tip appropriate to input validity
	 *
	 * @param {jQuery DOM object} emailField				Field containing email value
	 * @param {jQuery DOM object} emailConfirmationField	Field containing confirmed email value
	 */
	_validateEmail: function(emailField, emailConfirmationField) {
		var validity = this.emailValidator.check(emailField.val(), emailConfirmationField.val())[0],
			messageContainer = null,
			validationReference = "";

		if (this.showContactInfo && emailField == this.contactInput1) {
			messageContainer = this.contactMessage1;
			validationReference = "contactValidated";
		} else {
			messageContainer = this.emailMessage1;
			validationReference = "emailValidated;"
		}

		if (validity == -1) {
			this[validationReference] = false;
			this.toggleTip(messageContainer, this.inlineMessageWarningQuery);
		} else {
			this[validationReference] = validity;
			this.toggleTip(messageContainer, this.inlineMessageDefaultQuery);
		}
	},

	/**
	 * Display in-line message tip appropriate to input validity
	 *
	 * @param {jQuery DOM object} firstEmailField			Field containing email value to compare
	 * @param {DOM event} evt								Trigger event
	 */
	_validateEmailConfirmation: function(firstEmailField, evt) {
		var emailConfirmation = $(evt.currentTarget),
			emailConfirmationValue = emailConfirmation.val(),
			validity = 0,
			messageContainer = null,
			validationReference = "";

		if (this.showContactInfo && emailConfirmation[0] == this.contactInput2[0]) {
			messageContainer = this.contactMessage2;
			validationReference = "contactConfirmationValidated";
		} else {
			messageContainer = this.emailMessage2;
			validationReference = "emailConfirmationValidated";
		}

		// While in the field, only run validation if entry is of equal or greater length so user doesn't get warning before having a chance to type correctly
		if ((evt.type == "keyup" && emailConfirmationValue.length >= firstEmailField.val().length) || (evt.type == "focusout" && emailConfirmationValue.length > 0)) {
			validity = this.emailValidator.check(firstEmailField.val(), emailConfirmationValue)[1];
			if (validity == -1) {
				this[validationReference] = false;
				this.toggleTip(messageContainer, this.inlineMessageWarningQuery);
			} else {
				this[validationReference] = validity;
				this.toggleTip(messageContainer, this.inlineMessageDefaultQuery);
			}
		} else {
			this.toggleTip(messageContainer, this.inlineMessageDefaultQuery);
		}
	},

	/**
	 * Provides suggestions for auto-completion of email address
	 * 
	 * @param {DOM event} evt	Triggering event
	 */
	_completeEmail: function(evt) {
		var field = evt.currentTarget,
			username = field.value,
			suggestions = [];

		if (this.usernameTest.test(username)) {
			$.each(this.domains, function(index, value) {
				suggestions.push(username + this.domains[index]);
			});
			this.autocompleteOptions.source = suggestions;
			$(field).autocomplete(this.autocompleteOptions);
		} else {
			this.autocompleteOptions.source = [];
		}
	},

	/**
	 * Toggles large information container (e.g., password rating, parent contact
	 * information)
	 * 
	 * @param {DOM object} container	Container to toggle
	 * @param {Boolean} show			Indicates to show container
	 */
	_toggleInformationContainer: function(container, show) {
		if (show) {
			container.slideDown(this.slideDownDuration);
		} else {
			container.slideUp(this.slideUpDuration);
		}
	},

	/**
	 * Routes actions appropriately for events occurring on parent contact fields
	 * 
	 * @param {DOM event} evt	Triggering event
	 */
	_routeParentContactActions: function(evt) {
		var classInstance = this,
			firstField = $(evt.currentTarget)[0] == this.contactInput1[0],
			arrowPosition = firstField ? this.leftArrowPosition : this.rightArrowPosition;

		if (evt.type == "focus") {
			// Clear slide delay so there's no flickering on partner field focus transition
			clearTimeout(this.contactTimer);
			
			// Slide down information container
			this._toggleInformationContainer(this.contactInfo, true);

			// Hide in-line tips so they don't partially show behind information container
			this.toggleTip(this.contactMessage1, this.inlineMessageDefaultQuery);
			this.toggleTip(this.contactMessage2, this.inlineMessageDefaultQuery);
			
			// Move arrow to appropriate field
			this.contactInfoArrow.animate({
				left: arrowPosition
			}, this.animationLength);
		} else if (evt.type == "focusout") {
			// Delay slide up to avoid flickering on partner field focus transition
			this.contactTimer = setTimeout(function() {
				classInstance._toggleInformationContainer(classInstance.contactInfo, false);
			}, 100);
		}

		if (evt.type == "focusout" || evt.type == "keyup") {
			if (firstField && evt.type == "focusout") {
				// Validate first email field on focusout only so user doesn't get an invalid email warning while typing
				this._validateEmail(this.contactInput1, this.contactInput2);
			} else if (!firstField) {
				// Call to validate confirmation field during typing and focusout
				this._validateEmail(this.contactInput1, this.contactInput2);
				this._validateEmailConfirmation(this.contactInput1, evt);
			}
		}
	},

	/**
	 * Routes actions appropriately for events occurring on password fields
	 * 
	 * @param {DOM event} evt	Triggering event
	 */
	_routePasswordActions: function(evt) {
		if (evt.type == "focus" || evt.type == "input") {
			clearTimeout(this.passwordGuidelinesTimer);
			this._validatePassword(evt);
		} else {
			var classInstance = this;
			this.passwordGuidelinesTimer = setTimeout(function() {
				classInstance._toggleInformationContainer(classInstance.passwordGuidelines, false);
			}, 100);
		}
	},

	/**
	 * Internal call to checkPassword() that uses a timer as a limiter.
	 *
	 * @param e The event data.
	 */
	_validatePassword: function(e) {
		var type = e.type,
			target = e.target.id,
			password1 = this.passwordInput1[0].id,
			delay = (type === 'keyup' || type === 'input' || type === 'propertychange') ? 100 : 0,
			bind = this;
		this.activePasswordInput = target === password1 ? 0 : 1;
		if (this.passwordTimer === null) {
			this.passwordTimer = setTimeout(function() {
				bind.checkPassword();
			}, delay);
			return true;
		}
		return false;
	},

	/**
	 * Check password to ensure it meets minimum strength requirements.
	 */
	checkPassword: function() {
		var form = this.form,
			pass = this.passwordValidator,
			result = true,
			password1 = this.passwordInput1[0].type === 'password' ? this.passwordInput1[0].value : '',
			password2 = this.passwordInput2[0].type === 'password' ? this.passwordInput2[0].value : '',
			rowRight = this.passwordRight,
			rowLeft = this.passwordLeft,
			message1 = this.passwordMessage1,
			message2 = this.passwordMessage2,
			default1 = this.passwordMessage1Default,
			default2 = this.passwordMessage2Default,
			email = this.emailInput1[0].value,
			show = this.showPasswordGuidelines;


		if (password1.length > 0) {
			rowRight.removeClass('input-error');
			rowLeft.removeClass('input-error');

			for (var i = 0, level, pw; pw = pass.check(password1, password2, email)[i]; i++) {
				level = form.find('#password-level-' + i);
				level.removeClass();
				if (pw === 1) {
					level.addClass('pass');
				} else if (pw === -1) {
					rowRight.addClass('input-error');
					rowLeft.addClass('input-error');
					level.addClass('fail');
					result = false;
				}
				if (i === 4 && pw === -1) {
					if (show) {
						message2.html(' ');
					} else {
						message2.html(FormMsg.passwordError2);
					}
				}
			}

			if (result || show) {
				message1.html(' ');
			} else if (!result || message2.html() === default2 || message2.html() === ' ') {
				message1.html( password1 === password2 ? FormMsg.passwordError1 : FormMsg.passwordError2);
			}

		} else {
			message1.html(default1);
			message2.html(default2);
			this.passwordLevels[0].removeClass();
			this.passwordLevels[1].removeClass();
			this.passwordLevels[2].removeClass();
			this.passwordLevels[3].removeClass();
			this.passwordLevels[4].removeClass();
			result = false;
		}

		this.ratePassword();

		this.passwordValidated = result;

		return result;
	},

	/**
	 * Rate a password’s strength.
	 */
	ratePassword: function() {
		var pass = this.passwordValidator,
			score = 0,
			password1 = this.passwordInput1[0].type === 'password' ? this.passwordInput1[0].value : '',
			rating = this.passwordRating,
			result = this.passwordResult,
			message1 = this.passwordMessage1,
			message2 = this.passwordMessage2;

		rating.removeClass().addClass('rating rating-default');
		result.html('').removeClass();

		if (password1.length > 0) {
			score = pass.rate(password1);
			if (score === 4) {
				rating.removeClass().addClass('rating rating-strong');
				result.html(FormMsg.passwordStrength3);
			} else if (score === 3) {
				rating.removeClass().addClass('rating rating-fair');
				result.html(FormMsg.passwordStrength2);
			} else if (score === 2) {
				rating.removeClass().addClass('rating rating-weak');
				result.html(FormMsg.passwordStrength1);
			} else if (score === 1) {
				rating.removeClass().addClass('rating rating-short');
				result.html(FormMsg.passwordStrength0).addClass('fail');
			}
		}
		
		if (this.showPasswordGuidelines) {
		    message1.html(' ');
		    message2.html(' ');
			var arrow = this.passwordGuidelines.find('div.input-note-arrow');
			// Make sure we have focus or there is an error before we pop the tip
			if(this.passwordInput1[0] == document.activeElement || this.passwordInput2[0] == document.activeElement
				|| this.passwordInput1[0].parentNode.classList.contains('input-error')) {
				this.passwordGuidelines.slideDown(this.slideDownDuration);
			}
			if (this.activePasswordInput === 1) {
				arrow.animate({
					left: this.rightArrowPosition
				}, this.animationLength);
			} else {
				arrow.animate({
					left: this.leftArrowPosition
				}, this.animationLength);
			}
		} else {
			this.passwordGuidelines.slideUp(this.slideUpDuration);
		}

		if (this.passwordTimer !== null) {
			clearTimeout(this.passwordTimer);
			this.passwordTimer = null;
		}
	
	   this.goodPassword = score > 2;
	
	},

	/**
	 * Enable the submit button.
	 */
	enable: function() {
		this.form[0].onsubmit = new Function('return true');
	},

	/**
	 * Prevent the form from being submitted.
	 */
	disable: function(e) {
		this.form[0].onsubmit = new Function('return false;');
	}
});
