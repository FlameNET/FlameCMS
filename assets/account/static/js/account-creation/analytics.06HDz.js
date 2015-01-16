/**
 * Class for tracking input errors during account creation
 *
 * @requires {Object}   _gaq
 * @requires {Function} jQuery
 * 
 * @type     {Object}
 */
var Analytics = {
	/**
	 * Configuration properties
	 * 
	 * @type {Object}
	 */
	config: {},

	/**
	 * Tracking category
	 * 
	 * @type {String}
	 */
	category: "",

	/**
	 * Milliseconds to wait before firing events
	 * 
	 * @type {Number}
	 */
	delay: 0,

	/**
	 * Number of times each event should be tracked
	 * 
	 * @type {Number}
	 */
	eventLimit: 0,

	/**
	 * Account creation form handler class reference
	 * 
	 * @type {Object}
	 */
	creation: null,

	/**
	 * Selectors
	 * 
	 * @type {String}
	 */
	emailAddressId: "",
	emailAddressConfirmationId: "",
	passwordId: "",
	rePasswordId: "",
	captchaId: "",

	/**
	 * DOM objects (jQuery style)
	 * 
	 * @type {Collection}
	 */
	$emailAddress: null,
	$emailAddressConfirmation: null,
	$password: null,
	$rePassword: null,
	$captcha: null,

	/**
	 * Tracking labels to apply to field types
	 * 
	 * @type {Array}
	 */
	trackingLabelsEmail: [
		"Input Complete",
		"Field Mismatch",
		"Mismatch Fixed",
		"first",
		"second"
	],
	trackingLabelsPassword: [
		"Input Complete",
		"Field Mismatch",
		"Mismatch Fixed",
		"Other Error",
		"first",
		"second"
	],

	/**
	 * Timeout references for clearTimeout use
	 * 
	 * @type {Object}
	 */
	timers: {
		emailAddress: {
			"Input Complete": false,
			"Field Mismatch": false,
			"Mismatch Fixed": false,
			"first": false,
			"second": false
		},
		emailAddressConfirmation: {
			"Input Complete": false,
			"Field Mismatch": false,
			"Mismatch Fixed": false,
			"first": false,
			"second": false
		},
		password: {
			"Input Complete": false,
			"Field Mismatch": false,
			"Mismatch Fixed": false,
			"Other Error": false,
			"first": false,
			"second": false
		},
		rePassword: {
			"Input Complete": false,
			"Field Mismatch": false,
			"Mismatch Fixed": false,
			"first": false,
			"second": false
		},
		captcha: {
			"Input Complete": false
		}
	},

	/**
	 * Number of times each event time has been tracked
	 * 
	 * @type {Object}
	 */
	eventCounts: {
		emailAddress: {
			"Input Complete": 0,
			"Field Mismatch": 0,
			"Mismatch Fixed": 0,
			"first": 0,
			"second": 0
		},
		emailAddressConfirmation: {
			"Input Complete": 0,
			"Field Mismatch": 0,
			"Mismatch Fixed": 0,
			"first": 0,
			"second": 0
		},
		password: {
			"Input Complete": 0,
			"Field Mismatch": 0,
			"Mismatch Fixed": 0,
			"Other Error": 0,
			"first": 0,
			"second": 0
		},
		rePassword: {
			"Input Complete": 0,
			"Field Mismatch": 0,
			"Mismatch Fixed": 0,
			"first": 0,
			"second": 0
		},
		captcha: {
			"Input Complete": 0
		}
	},

	/**
	 * Creates an instance of this class. Arguments passed to this function will be
	 * processed by the instance's _construct() function.
	 * 
	 * @return {Object}    Creation class instance
	 */
	create: function() {
		var instance = Object.create(this);
		instance._construct.apply(instance, arguments);
		return instance;
	},

	/**
	 * Apply provided or default configuration properties to class instance
	 * 
	 * @param {Object} [config]    Configuration properties
	 */
	_construct: function(config) {
		config = typeof(config) === "undefined" ? {} : config;

		this.config = $.extend({
			category: config.category || "Field Confirmation",
			
			delay: config.delay || 1000,
			
			eventLimit: config.eventLimit || 1,
			
			creation: config.creation || null,

			emailAddressId: config.emailAddressId || "emailAddress",
			emailAddressConfirmationId: config.emailAddressConfirmationId || "emailAddressConfirmation",
			passwordId: config.passwordId || "password",
			rePasswordId: config.rePasswordId || "rePassword",
			captchaId: config.captchaId || "captchaInput"
		}, config);

		this.setup();
	},

	/**
	 * Applies configuration properties to class instance
	 */
	setup: function() {
		this.category = this.config.category;

		this.delay = this.config.delay;

		this.eventLimit = this.config.eventLimit;

		this.creation = this.config.creation;

		this.emailAddressId = this.config.emailAddressId;
		this.emailAddressConfirmationId = this.config.emailAddressConfirmationId;
		this.passwordId = this.config.passwordId;
		this.rePasswordId = this.config.rePasswordId;
		this.captchaId = this.config.captchaId;

		this.$emailAddress = $("#" + this.config.emailAddressId);
		this.$emailAddressConfirmation = $("#" + this.config.emailAddressConfirmationId);
		this.$password = $("#" + this.config.passwordId);
		this.$rePassword = $("#" + this.config.rePasswordId);
		this.$captcha = $("#" + this.config.captchaId);

		this.registerEvents();
	},
	
	/**
	 * Bind events
	 */
	registerEvents: function() {
		// Only track email fields if email confirmation field is present
		if (this.$emailAddressConfirmation.length) {
			// Bind event logging for email field
			this.$emailAddress
				.on("focusout",
					$.proxy(this.setTimers, this, this.trackingLabelsEmail)
				)
				.on("focus",
					$.proxy(this.clearTimer, this, this.emailAddressId)
				);

			// Bind event logging for email confirmation field
			this.$emailAddressConfirmation
				.on("focusout",
					$.proxy(this.setTimers, this, this.trackingLabelsEmail)
				)
				.on("focus",
					$.proxy(this.clearTimer, this, this.emailAddressConfirmationId)
				);
		}

		// Bind event logging for password field
		this.$password
			.on("focusout",
				$.proxy(this.setTimers, this, this.trackingLabelsPassword)
			)
			.on("focus",
				$.proxy(this.clearTimer, this, this.passwordId)
			);

		// Bind event logging for password confirmation field
		this.$rePassword
			.on("focusout",
				$.proxy(this.setTimers, this, this.trackingLabelsPassword)
			)
			.on("focus",
				$.proxy(this.clearTimer, this, this.rePasswordId)
			);

		// Bind event logging for CAPTCHA field
		this.$captcha
			.on("focusout",
				$.proxy(this.setTimers, this, this.captchaId, "Input Complete")
			)
			.on("focus",
				$.proxy(this.clearTimer, this, this.captchaId)
			);
	},

	/**
	 * Start timeout to track events
	 * 
	 * @param {Array} labels    Tracking event label
	 * @param {Object} evt      Event
	 */
	setTimers: function(labels, evt) {
		var action = evt.currentTarget.id,
			track = false,
			instance = this;

		$.each(labels, function(index, label) {
			track = instance.validate($(evt.currentTarget), label);

			if (track) {
				instance["timers"][action][label] = setTimeout(
					$.proxy(instance.track, instance, action, label)
				, instance.delay);
			}
		});
	},

	/**
	 * Clears timeout to avoid redundant tracking
	 * 
	 * @param  {String} action    Tracking event action type (e.g., "emailAddress", "password")
	 * @param  {String} label     Tracking event label (e.g., "Field Mismatch", "Mismatch Fixed")
	 */
	clearTimer: function(action, label) {
		clearTimeout(this["timers"][action][label]);
	},

	/**
	 * Loads analytics event tracking, bumps the appropriate event count
	 * 
	 * @param  {String} action    Tracking event action type (e.g., "emailAddress", "password")
	 * @param  {String} label     Tracking event label (e.g., "Field Mismatch", "Mismatch Fixed")
	 */
	track: function(action, label) {
		_gaq.push(["_trackEvent", this.category, action, label]);
		this["eventCounts"][action][label]++;
	},

	/**
	 * Checks if analytics event should load
	 * 
	 * @param  {String} $field    Field triggering potential analytics tracking
	 * @param  {String} label     Tracking event label (e.g., "Field Mismatch", "Mismatch Fixed")
	 * 
	 * @return {Boolean}          Indicates analytics tracking should load
	 */
	validate: function($field, label) {
		var action = $field.attr("id"),
			$partnerField = this._partnerField(action);

		// Validate tracking only if field has value and event limit not reached
		if ($field.val() && this._validateCount(action, label)) {
			switch (label) {
				case "Field Mismatch":
					return this._validateMismatch($field, $partnerField);
					break;
				case "Mismatch Fixed":
					return this._validateFixedMismatch($field, $partnerField);
					break;
				case "Other Error":
					return this._validateOtherError($field);
					break;
				case "first":
				case "second":
					return this._validateOrder(label, $field, $partnerField);
					break;
				default:
					// EQUIVALENT: case "Input Complete":
					return $field.val();
					break;
			}
		} else {
			// If the event limit is reached for this action, check if other actions have also reached their limits...
			if (this._validateUnbinding(action)) {
				/*
					If all events have reached their limit, unbind the analytics class checks from
					the field to save memory. No need to run these functions following input changes
					if all possible events have already occurred as many times as they're allowed.
				*/
				this.unbindEvent($field);
			}
			return false;
		}
	},

	/**
	 * Finds corresponding partner field 
	 * 
	 * @param  {Object} fieldId    Field ID (e.g., "emailAddress", "password")
	 * 
	 * @return {Object}            Paired field (empty if partner field missing, null if no partner field listed)
	 */
	_partnerField: function(fieldId) {
		switch (fieldId) {
			case this.emailAddressId:
				return this.$emailAddressConfirmation;
				break;
			case this.emailAddressConfirmationId:
				return this.$emailAddress;
				break;
			case this.passwordId:
				return this.$rePassword;
				break;
			case this.rePasswordId:
				return this.$password;
				break;
		}
		return null;
	},

	/**
	 * Check that the tracking event hasn't already reached its loading limit
	 * 
	 * @param  {String} action    Tracking event action type (e.g., "emailAddress", "password")
	 * @param  {String} label     Tracking event label (e.g., "Field Mismatch", "Mismatch Fixed")
	 * 
	 * @return {Boolean}          Indicates tracking event hasn't reached load limit (can fire if other requirements are met)
	 */
	_validateCount: function(action, label) {
		return !(this["eventCounts"][action][label]);
	},

	/**
	 * Checks if there's a mismatch between provided fields' values if both values have content
	 * 
	 * @param  {String} $field           Field to check value for mismatch
	 * @param  {String} $partnerField    Parnter to field to check value for mismatch
	 * 
	 * @return {Boolean}                 Indicates mismatch between extant field values which should match
	 */
	_validateMismatch: function($field, $partnerField) {
		var fieldValue = $field.val(),
			partnerFieldValue = $partnerField.val(),
			load = (partnerFieldValue && (fieldValue != partnerFieldValue));

		if (load) {
			// Bump paired field's mismatch count so the single mismatch between the two fields covers the action for both
			this["eventCounts"][$partnerField.attr("id")]["Field Mismatch"] = this.eventLimit;
		}

		return load;
	},

	/**
	 * Checks if a mismatch fixed event should load
	 * 
	 * @param  {String} fieldId    Field ID (e.g., "emailAddress", "password")
	 * 
	 * @return {Boolean}           Indicates a mismatch was fixed
	 */
	_validateFixedMismatch: function($field, $partnerField) {
		// Requirements for true: Previous mismatch occurred and field values now match
		return (this._mismatchLogged($field.attr("id"), $partnerField.attr("id")) && ($field.val() == $partnerField.val()));
	},

	/**
	 * Checks if a mismatch event has already loaded related to the provided field ID.
	 * This function checks for the event having fired on either of the paired fields,
	 * since one having a mismatch means the other has as well (and the mismatch count
	 * increases relative only to the triggering field)
	 * 
	 * @param  {String} fieldId           Field ID (e.g., "emailAddress", "password")
	 * @param  {String} partnerFieldId    Partnered field ID (e.g., "emailAddressConfirmation" if fieldId is "emailAddress" or vice versa)
	 * 
	 * @return {Boolean}           Indicates a mismatch event related to provided field's ID has been loaded
	 */
	_mismatchLogged: function(fieldId, partnerFieldId) {
		return (this["eventCounts"][fieldId]["Field Mismatch"] || this["eventCounts"][partnerFieldId]["Field Mismatch"]);
	},

	/**
	 * Checks if there are other errors for which to load analytics events (currently
	 * this only checks if password input's value doesn't meet guidelines)
	 * 
	 * @param  {String} $field    Field to check value for mismatch
	 * 
	 * @return {Boolean}          Indicates "Other Error" tracking should load
	 */
	_validateOtherError: function($field) {
		var fieldId = $field.attr("id"),
			fieldValue = $field.val();

		return ((fieldId == this.passwordId) && this.creation && !this.creation.goodPassword);
	},

	/**
	 * Validates if "first" or "second" tracking should load and updates event counts
	 * to ensure inaccurate tracking doesn't occur
	 * 
	 * @param  {String} label            Tracking event label (e.g., "first", "second")
	 * @param  {Object} $field           Field that received a value
	 * @param  {Object} $partnerField    Partner field to updated field
	 * 
	 * @return {Boolean}                 Indicates if event label tracker should be loaded
	 */
	_validateOrder: function(label, $field, $partnerField) {
		var fieldId = $field.attr("id"),
			partnerFieldId = $partnerField.attr("id"),
			load = !(this["eventCounts"][fieldId][label]),
			partnerLabel = ((label == "first") ? "second" : "first");

		if (load) {
			// Bump corresponding partner count to event limit to prevent inaccurate/repeat "first" and "second" loads
			this["eventCounts"][fieldId][partnerLabel] = this.eventLimit;
			this["eventCounts"][partnerFieldId][label] = this.eventLimit;
		}
		return load;
	},

	/**
	 * Checks if all event limits have been reached for a given action type
	 * 
	 * @param  {String} action    Tracking event action type (e.g., "emailAddress", "password")
	 * 
	 * @return {Boolean}          Indicates event limits have been reached
	 */
	_validateUnbinding: function(action) {
		var keyCount = 0,
			limitsReached = 0;

		$.each(this["eventCounts"][action], function(label, count) {
			keyCount++;
			if (count == this.eventLimit) {
				limitsReached++;
			}
		});

		return (keyCount == limitsReached);
	},

	/**
	 * Unbinds analytics tracking calls bound to given field
	 * 
	 * @param {[type]} $field [description]
	 */
	unbindEvent: function($field) {
		$field
			.off("focusout", this.setTimer)
			.off("focus", this.clearTimer);
	}
};
