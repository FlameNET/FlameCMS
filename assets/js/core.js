/**
 * All global and core class objects.
 *
 * @copyright	2010, Blizzard Entertainment, Inc
 * @class		Core
 */

$(function() {
	Page.initialize();
	Input.initialize();
	App.initialize();
	Tickets.initialize();
	Flash.initialize();
	Locale.initialize();
	CharSelect.initialize();
	Core.initialize();
});

var Core = {

	/**
	 * Base context URL for the project.
	 */
	baseUrl: '/',

	/**
	 * Battle.net support site URL.
	 */
	supportUrl: '/support/',

	/**
	 * The cached string for the browser.
	 */
	browser: null,

	/**
	 * Dynamic load queue.
	 */
	deferredLoadQueue: [],

	/**
	 * Current locale.
	 */
	locale: 'en-us',

	/**
	 * Short date format
	 */
	shortDateFormat: 'MM/dd/Y',

	/**
	 * Date/time format
	 */
	dateTimeFormat: 'dd/MM/yyyy HH:mm',

	/**
	 * The current project.
	 */
	project: '',

	/**
	 * Path to static content.
	 */
	staticUrl: '/',
	sharedStaticUrl: '/local-common/',

	/**
	 * The current host and protocol.
	 */
	host: '',

	/**
	 * Initialize the script.
	 *
	 * @constructor
	 */
	initialize: function() {
		Core.processLoadQueue();
		Core.ui();
		Core.host = location.protocol +'//'+ (location.host || location.hostname);
	},

	/**
	 * Return letter (alphabet) values only within a string.
	 *
	 * @param string
	 * @return string
	 */
	alpha: function(string) {
		return string.replace(/[^a-zA-Z]/gi, '');
	},

	/**
	 * Create a frame within the document.
	 *
	 * @param url
	 * @param width
	 * @param height
	 * @param parent
	 * @param id
	 */
	appendFrame: function(url, width, height, parent, id) {
		if (typeof url === 'undefined')
			return;

		if (typeof width === 'undefined')
			width = 1;

		if (typeof height === 'undefined')
			height = 1;

		if (typeof parent === 'undefined')
			parent = $('body');

		if (Core.isIE())
			parent.append('<iframe src="' + url + '" width="' + width + '" height="' + height + '" scrolling="no" frameborder="0" allowTransparency="true"'+ ((typeof id != 'undefined') ? ' id="'+ id +'"' : '') +'></iframe>');
		else
			parent.append('<object type="text/html" data="' + url + '" width="' + width + '" height="' + height + '"'+ ((typeof id != 'undefined') ? ' id="'+ id +'"' : '') +'></object>');
	},

	/**
	 * Fix column headers if multiple lines.
	 *
	 * @param query
	 * @param baseHeight
	 */
	fixTableHeaders: function(query, baseHeight) {
		$(query).each(function() {
			baseHeight = baseHeight || 18;

			var table = $(this);
			var height = baseHeight;

			table.find('.sort-link').each(function() {
				var linkHeight = $(this).height();

				if (linkHeight > height)
					height = linkHeight;
			});

			if (height > baseHeight)
				table.find('.sort-link, .sort-tab').css('height', height);
		});
	},

	/**
	 * Format a locale to a specific structure.
	 *
	 * @param format
	 * @param divider
	 * @return string
	 */
	formatLocale: function(format, divider) {
		divider = divider || '-';
		format = format || 1;

		switch (format) {
			case 1:
			default:
				return Core.locale.replace('-', divider);
			break;
			case 2:
				var parts = Core.locale.split('-');
				return parts[0] + divider + parts[1].toUpperCase();
			break;
			case 3:
				return Core.locale.toUpperCase().replace('-', divider);
			break;
		}
	},

	/**
	 * Convert a datetime string to a users local time zone and return as a string using the specified format.
	 *
	 * http://www.w3.org/TR/html5/common-microsyntaxes.html#valid-global-date-and-time-string
	 *
	 * @param format
	 * @param datetime (2010-07-22T07:41-07:00)
	 * @return string
	 */
	formatDatetime: function(format, datetime) {
		var localDate;

		if (!datetime) {
			localDate = new Date();
		} else {
			// gecko
			localDate = new Date(datetime);

			// webkit
			if (isNaN(localDate.getTime())) { // 2010-07-22 07:41 GMT-0700
				datetime = datetime.substring(0,10) + ' ' + datetime.substring(11,16) + ':00 GMT' + datetime.substring(16,19) + datetime.substring(20,22);
				localDate = new Date(datetime);
			}

			// safari still thinking different
			if (isNaN(localDate.getTime())) { // 2010/07/22 07:41 GMT-0700
				datetime = datetime.substring(0,4) + '/' + datetime.substring(5,7) + '/' + datetime.substring(8,29);
				localDate = new Date(datetime);
			}

			// trident
			if (isNaN(localDate.getTime())) { // 07-22 07:41 GMT-0700 2010
				datetime = datetime.substring(5,10) + ' ' + datetime.substring(11,16) + ' GMT' + datetime.substring(23,28) + ' ' + datetime.substring(0,4);
				localDate = new Date(datetime);
			}

			if (isNaN(localDate.getTime())) {
				return false;
			}
		}

		if (!format)
			format = 'yyyy-MM-ddThh:mmZ';

		var hr = localDate.getHours(),
			meridiem = 'AM';

		if (hr > 12) {
			hr -= 12;
			meridiem = 'PM'

		} else if (hr === 12) {
			meridiem = 'PM'

		} else if (hr === 0) {
			hr = 12;
		}

		var tz = parseInt(localDate.getTimezoneOffset() / 60 * -1, 10);

		if (tz < 0)
			tz = '-' + Core.zeroFill(Math.abs(tz), 2) + ':00';
		else
			tz = '+' + Core.zeroFill(Math.abs(tz), 2) + ':00';

		format = format.replace('yyyy', localDate.getFullYear());
		format = format.replace('MM', Core.zeroFill(localDate.getMonth() + 1,2));
		format = format.replace('dd', Core.zeroFill(localDate.getDate(),2));
		format = format.replace('HH', Core.zeroFill(localDate.getHours(),2));
		format = format.replace('hh', Core.zeroFill(hr,2));
		format = format.replace('mm', Core.zeroFill(localDate.getMinutes(),2));
		format = format.replace('a', meridiem);
		format = format.replace('Z', tz);

		return format;
	},

	/**
	 * Detect the browser type, based on feature detection and not user agent.
	 *
	 * @return string
	 */
	getBrowser: function() {
		if (Core.browser)
			return Core.browser;

		var s = $.support;

		if (!s.hrefNormalized && !s.tbody && !s.style && !s.opacity) {
			if ((typeof document.body.style.maxHeight != "undefined") || (window.XMLHttpRequest))
				Core.browser = 'ie7';
			else
				Core.browser = 'ie6';

		} else if (s.hrefNormalized && s.tbody && s.style && !s.opacity) {
			Core.browser = 'ie8';

		} else {
			Core.browser = UserAgent.browser + UserAgent.version;
		}

		return Core.browser;
	},

	/**
	 * Get the hash from the URL.
	 *
	 * @return string
	 */
	getHash: function() {
		var hash = location.hash || "";

		return hash.substr(1, hash.length);
	},

	/**
	 * Return the language based off locale.
	 *
	 * @return string
	 */
	getLanguage: function() {
		return Core.locale.split('-')[0];
	},

	/**
	 * Return the region based off locale.
	 *
	 * @return string
	 */
	getRegion: function() {
		return Core.locale.split('-')[1];
	},

	/**
	 * Conveniently jump to a page.
	 *
	 * @param url
	 * @param base
	 */
	goTo: function(url, base) {
		window.location.href = (base ? Core.baseUrl : '') + url;

		if (window.event)
			window.event.returnValue = false;
	},

	/**
	 * Include a JavaScript file via XHR.
	 *
	 * @param url
	 * @param success
	 * @param cache - defaults to true
	 */
	include: function(url, success, cache) {
		$.ajax({
			url: url,
			dataType: 'script',
			success: success,
			cache: cache !== false
		});
	},

	/**
	 * Checks to see if the argument is a function/callback.
	 *
	 * @param callback
	 * @return boolean
	 */
	isCallback: function(callback) {
		return (callback && typeof callback === 'function');
	},

	/**
	 * Is the browser using IE?
	 *
	 * @param version
	 * @return boolean
	 */
	isIE: function(version) {
		var browser = Core.getBrowser();

		if (version)
			return ('ie'+ version == browser);
		else
			return (browser == 'ie6' || browser == 'ie7' || browser == 'ie8' || browser == 'ie9');
	},

	/**
	 * Loads either a JavaScript or CSS file, by default deferring the load until after other
	 * content has loaded. The file type is determined by using the file extension.
	 *
	 * @param path
	 * @param deferred - true by default
	 * @param callback
	 */
	load: function(path, deferred, callback) {
		deferred = deferred !== false;

		if (Page.loaded || !deferred)
			Core.loadDeferred(path, callback);
		else
			Core.deferredLoadQueue.push(path);
	},

	/**
	 * Determine which type to load.
	 *
	 * @param path
	 * @param callback
	 */
	loadDeferred: function(path, callback) {
		var queryIndex = path.indexOf("?");
		var extIndex = path.lastIndexOf(".") + 1;
		var ext = path.substring(extIndex, queryIndex == -1 ? path.length : queryIndex);

		switch (ext) {
			case 'js':
				Core.loadDeferredScript(path, callback);
			break;
			case "css":
				Core.loadDeferredStyle(path);
			break;
		}
	},

	/**
	 * Include JS file.
	 *
	 * @param path
	 * @param callback
	 */
	loadDeferredScript: function(path, callback) {
		$.ajax({
			url: path,
			cache: true,
			global: false,
			dataType: 'script',
			success: callback
		});
	},

	/**
	 * Include CSS file; must be done this way because of IE (of course).
	 *
	 * @param path
	 * @param media
	 */
	loadDeferredStyle: function(path, media) {
		$('head').append('<link rel="stylesheet" href="'+ path +'" type="text/css" media="'+ (media || "all") +'" />');
	},

	/**
	 * Replace {0}, {1}, etc. with the passed arguments.
	 *
	 * @param str
	 * @return string
	 */
	msg: function(str) {
		for (var i = 1, len = arguments.length; i < len; ++i) {
			str = str.replace("{" + (i - 1) + "}", arguments[i]);
		}

		return str;
	},

	/**
	 * This version can handle multiple occurences of the same token, but is slower due to the use of a RegExp. Only use if needed.
	 *
	 * @param str
	 * @return string
	 */
	msgAll: function(str) {
		for (var i = 1, len = arguments.length; i < len; ++i) {
			str = str.replace(new RegExp("\\{" + (i - 1) + "\\}", "g"), arguments[i]);
		}

		return str;
	},

	/**
	 * Return numeric values only within a string.
	 *
	 * @param string
	 * @return int
	 */
	numeric: function(string) {
		string = string.replace(/[^0-9]/gi, '');

		if (!string || isNaN(string)) string = 0;

		return string;
	},

	/**
	 * Open the link in a new window.
	 *
	 * @param node
	 * @return false
	 */
	open: function(node) {
		if (node.href)
			window.open(node.href);

		return false;
	},

	/**
     * Helper function for event preventDefault.
     *
     * @param e
     */
    preventDefault: function(e) {
        e.preventDefault();
    },

	/**
	 * Run on page load!
	 */
	processLoadQueue: function() {
		if (Core.deferredLoadQueue.length > 0) {
			for (var i = 0, path; path = Core.deferredLoadQueue[i]; i++) {
				Core.load(path);
			}
		}
	},

	/**
	 * Generate a random number between 0 and up to the argument.
	 *
	 * @param no
	 * @return int
	 */
	randomNumber: function(no) {
		return Math.floor(Math.random() * no);
	},

	/**
	 * Scroll to a specific part of the page.
	 *
	 * @param target
	 * @param duration
	 * @param callback
	 */
	scrollTo: function(target, duration, callback) {
		target = $(target);

		if (target.length != 1)
			return;

		var win = $(window),
			winTop = win.scrollTop(),
			winBottom = winTop + win.height(),
			top = target.offset().top;

		top -= 15;

		if (top >= winTop && top <= winBottom)
			return;

		$($.browser.webkit ? 'body' : 'html').animate({
			scrollTop: top
		},
		duration || 350,
		callback || null);
	},

	/**
	 * Scroll to a specific part of the page (enough to make sure it's fully visible).
	 *
	 * @param target
	 * @param duration
	 * @param callback
	 */
	scrollToVisible: function(target, duration, callback) {
		target = $(target);

		if (target.length != 1)
			return;

		var win = $(window),
			winTop = win.scrollTop(),
			winBottom = winTop + win.height(),
			top = target.offset().top,
			bottom = top + target.height();

		top -= 15;
		bottom += 15;

		if (top >= winTop && bottom <= winBottom)
			return;

		$($.browser.webkit ? 'body' : 'html').animate({
			scrollTop: (top < winTop ? top : bottom - win.height())
		},
		duration || 350,
		callback || null);
	},

	/**
     * Helper function for event stopPropagation.
     *
     * @param e
     */
    stopPropagation: function(e) {
        e.stopPropagation();
    },

	/**
	 * Trims specific characters off the end of a string.
	 *
	 * @param string
	 * @param c
	 * @return string
	 */
	trimChar: function(string, c) {
		if (string.substr(0, 1) === c)
			string = string.substr(1, (string.length - 1));

		if (string.substr((string.length - 1), string.length) === c)
			string = string.substr(0, (string.length - 1));

		return string;
	},

	/**
	 * Trims specific characters off the right end of a string.
	 *
	 * @param string
	 * @param charlist
	 * @return string
	 */
	trimRight: function(string, charlist) {
		charlist = !charlist ? ' \\s\u00A0' : (charlist + '').replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '\\$1');

		return (string + '').replace( new RegExp('[' + charlist + ']+$', 'g') , '');
	},

	/**
	 * Apply global functionality to certain UI elements.
	 *
	 * @param context
	 */
	ui: function(context) {
		context = context || document;

		if (Core.isIE(6)) {
			$(context).find('button.ui-button').hover(
				function() {
					if (!this.hasAttribute('disabled') || this.className.indexOf('disabled') == -1)
						$(this).addClass('hover');
				},
				function() {
					$(this).removeClass('hover');
				}
			);
		}

		if (Core.project != 'bam') {
			$(context).find('button.ui-button').click(function(e) {
				var self = $(this);
				var alt = self.attr('data-text');

				if (typeof alt == 'undefined')
					alt = "";

				if (this.tagName.toLowerCase() == 'button' && alt != "") {
					if (self.attr('type') == 'submit') {
						e.preventDefault();
						e.stopPropagation();

						self.find('span span').html(alt);
						self.removeClass('hover')
							.addClass('processing')
							.attr('disabled', 'disabled');

						// Manually submit
						self.parents('form').submit();
					}
				}

				return true;
			});
		}
	},

	/**
	 * Zero-fills a number to the specified length (works on floats and negatives, too).
	 *
	 * @param number
	 * @param width
	 * @param includeDecimal
	 * @return string
	 */
	zeroFill: function(number, width, includeDecimal) {
		if (typeof includeDecimal == 'undefined')
			includeDecimal = false;

		var result = parseFloat(number),
			negative = false,
			length = width - result.toString().length,
			i = length - 1;

		if (result < 0) {
			result = Math.abs(result);
			negative = true;
			length++;
			i = length - 1;
		}

		if (width > 0) {
			if (result.toString().indexOf('.') > 0) {
				if (!includeDecimal)
					length += result.toString().split('.')[1].length;

				length++;
				i = length - 1;
			}

			if (i >= 0) {
				do {
					result = '0' + result;
				} while (i--);
			}
		}

		if (negative)
			return '-' + result;

		return result;
	},

	/**
	 * Utility for boxes that can be closed permanently.
	 * e.g: New Feature Box, BlizzCon Bar
	 *
	 * @param nodeQuery
	 * @param cookieId
	 * @param options - startDate, endDate, cookieParams, fadeIn, trackingCategory, trackingAction, onShow, onHide
	 */
	showUntilClosed: function(nodeQuery, cookieId, options) {
		options = options || {};

		var node = $(nodeQuery),
			COOKIE_NAME = 'bnet.closed.' + cookieId;

		if (!node.length || !Cookie.isSupported() || Cookie.read(COOKIE_NAME)) {
			return false;
	}

		// Date validation
		var now = new Date();

		if (options.startDate) {
			var startDate = new Date(options.startDate);

			if ((startDate - now) > 0) {
				return false;
			}
		}

		if (options.endDate) {
			var endDate = new Date(options.endDate);

			if ((endDate - now) < 0) {
				return false;
			}
		}

		// Show the node
		if (options.fadeIn) {
			node.fadeIn(options.fadeIn, options.onShow);
		} else {
			node.show();

			if (options.onShow) {
				options.onShow();
			}
		}

		// Click events
		var cookieParams = $.extend({
			path: Core.baseUrl,
			expires: 8760
		}, options.cookieParams || {});

		node.delegate('a', 'click', function() {
			var self = $(this),
				trackingLabel = self.data('label'),
				closeButton = (this.rel == 'close');

			if (closeButton) {
				node.hide();

				if (options.onHide) {
					options.onHide();
				}
			}

			if(closeButton || !options.closeButtonOnly) {
				Cookie.create(COOKIE_NAME, 1, cookieParams);
			}

			if (trackingLabel) {
				BnetAds.trackImpression(options.trackingCategory || 'Tracking', options.trackingAction || 'Click', trackingLabel);
			}
		});

		return true;
	}

};

/**
 * Application related functionality.
 */
var App = {

	/**
	 * Enable the explore links.
	 *
	 * @constructor
	 */
	initialize: function() {
		var links = $('a[rel="javascript"]');

		if (links.length) {
			links
				.removeAttr('onclick')
				.removeAttr('onmouseover')
				.removeAttr('title')
				.css('cursor', 'pointer');
		}

		var supportLink = $('#support-link');
		var exploreLink = $('#explore-link');
		var newsLink = $('#breaking-link');

		if (supportLink.length > 0) {
			supportLink.unbind().click(function() {
				Tickets.loadStatus();
				Toggle.open(this, 'active', '#support-menu');
				return false;
			});
		}

		if (exploreLink.length > 0) {
			exploreLink.unbind().click(function() {
				Toggle.open(this, 'active', '#explore-menu');
				return false;
			});

			$('#explore-menu').delegate('a', 'click', function() { // TODO: Centralize with other click tracking (e.g. new feature tip)
				var $this = $(this);
				var label = $this.data('label');
				if(!label) {
					label = 'Other';
		}
				BnetAds.trackImpression('Battle.net Explore Menu', 'Link Click', label);
			});
		}

		if (newsLink.length > 0) {
			newsLink.unbind().click(function() {
				App.breakingNews();
				return false;
			});
		}
	},

	/**
	 * Hide the service bar warnings.
	 *
	 * @param target
	 * @param cookie
	 */
	closeWarning: function(target, cookie) {
        $(target).hide();

		if (cookie)
			App.saveCookie(cookie);
	},

	/**
	 * Open and close the breaking news.
	 *
	 * @param lastId
	 */
	breakingNews: function(lastId) {
		var node = $("#breaking-news");
		var news = $("#announcement-warning");

		if (news.is(':visible')) {
			news.hide();
			node.removeClass('opened');
		} else {
			news.show();
			node.addClass('opened');
		}

		if (lastId)
			Cookie.create('serviceBar.breakingNews', lastId);
	},

	/**
	 * Save a cookie.
	 *
	 * @param name
	 */
	saveCookie: function(name) {
		Cookie.create('serviceBar.'+ name, 1, {
			expires: 8760, // 1 year of hours
			path: '/'
		});
	},

	/**
	 * Reset a cookie.
	 *
	 * @param name
	 */
	resetCookie: function(name) {
		Cookie.create('serviceBar.'+ name, 0, {
			expires: 8760, // 1 year of hours
			path: '/'
		});
	},

	/**
	 * Hide service bar elements depending on cookies.
	 */
	serviceBar: function() {
		var browser = Cookie.read('serviceBar.browserWarning');
		var locale = Cookie.read('serviceBar.localeWarning');

		if (browser == 1)
			$('#browser-warning').hide();

		if (locale == 1)
			$('#i18n-warning').hide();
	},

	/**
	 * Values for sidebar module loading.
	 */
	totalModules: 0,
	totalLoaded: 0,
	modules: [],
	forceLoad: true,

	/**
	 * Dynamically load more than one sidebar module at a time.
	 *
	 * @param modules
	 */
	sidebar: function(modules) {
		App.totalModules = modules.length;

		if (modules.length) {
			for (var i = 0; i <= (modules.length - 1); ++i) {
				App.loadModule(modules[i], i);
			}
		}

		// Show the modules after 5 seconds incase some are hanging
		window.setTimeout(function() {
			if (App.forceLoad) {
				App.showSidebar();
			}
		}, 5000);
	},

	/**
	 * Show the sidebar modules.
	 */
	showSidebar: function() {
		App.forceLoad = false;

		var sidebar = $('#sidebar').find('.sidebar-bot');

		for (var i = 0; i < App.totalModules; i++) {
			if (App.modules[i]) {
				App.modules[i].appendTo(sidebar);
			}
		}

		$('#sidebar-loading').fadeOut('normal', function() {
			sidebar.find('.sidebar-module').fadeIn();
			$(this).remove();
		});
	},

	/**
	 * Load the content of a sidebar module through AJAX.
	 *
	 * @param module
	 * @param index
	 */
	loadModule: function(module, index) {
		var sidebar = $('#sidebar').find('.sidebar-bot');

		$.ajax({
			url: Core.baseUrl +'/sidebar/'+ module.type + (module.query || ""),
			type: 'GET',
			dataType: 'html',
			cache: true,
			global: false,
			success: function(data) {
				App.totalLoaded++;

				if ($.trim(data) != "") {
					var node = $(data);

					if (App.forceLoad) {
						node.hide();
						App.modules[index] = node;
					} else {
						node.appendTo(sidebar);
					}
				}
			},
			error: function() {
				App.totalLoaded++;
			},
			complete: function() {
				if (App.totalLoaded >= App.totalModules) {
					window.setTimeout(App.showSidebar, 100);
				}
			}
		});
	}

};

/**
 * Methods for creating, reading, and deleting cookies.
 */
var Cookie = {

	/**
	 * Cached cookies.
	 */
	cache: {},

	/**
	 * Create a cookie. Can accept a third parameter as a literal object of options.
	 *
	 * @param key
	 * @param value
	 * @param options
	 */
	create: function(key, value, options) {
		options = $.extend({}, options);
		options.expires = options.expires || 1; // Default expiration: 1 hour

		if (typeof options.expires == 'number') {
			var hours = options.expires;
			options.expires = new Date();
			options.expires.setTime(options.expires.getTime() + (hours * 3600000));
		}

		var cookie = [
			encodeURIComponent(key) +'=',
			options.escape ? encodeURIComponent(value) : value,
			options.expires ? '; expires=' + options.expires.toUTCString() : '',
			options.path ? '; path=' + options.path : '',
			options.domain ? '; domain=' + options.domain : '',
			options.secure ? '; secure' : ''
		];

		document.cookie = cookie.join('');

		if (Cookie.cache) {
			if (options.expires.getTime() < (new Date()).getTime())
				delete Cookie.cache[key];
			else
				Cookie.cache[key] = value;
		}
	},

	/**
	 * Read a cookie.
	 *
	 * @param key
	 * @return string
	 */
	read: function(key) {
		// Use cache when available
		if (Cookie.cache[key])
			return Cookie.cache[key];

		var cache = {};
		var cookies = document.cookie.split(';');

		if (cookies.length > 0) {
			for (var i = 0; i < cookies.length; i++) {
				var parts = cookies[i].split('=');

				if (parts.length >= 2)
					cache[$.trim(parts[0])] = parts[1];
			}
		}

		Cookie.cache = cache;
		return cache[key] || null;
	},

	/**
	 * Delete a cookie.
	 *
	 * @param key
	 */
	erase: function(key, options) {
		if (!options) {
			options = { expires: -1 };

		} else if (!options.expires) {
		options.expires = -1;
		}

		Cookie.create(key, 0, options);
	},

	/**
	 * Returns whether cookies are supported/enabled by the browser
	 *
	 * @return boolean
	 */
	isSupported: function() {
		return (document.cookie.indexOf('=') != -1);
	}
};

/**
 * Input field helper. Shows default text on blur and hides on focus.
 */
var Input = {

	/**
	 * Initialize binds for search form.
	 */
	initialize: function() {
		Input.bind('#search-field');
	},

	/**
	 * Bind the events to a target.
	 *
	 * @param target
	 */
	bind: function(target) {
		Input.reset(target);

		var field = $(target);

		field.focus(Input.activate).blur(Input.reset);
		field.parentsUntil('form').parent().submit(function() {
			return Input.submit(field);
		});
	},

	/**
	 * Save the current placeholder to the cache and remove.
	 *
	 * @param e
	 */
	activate: function(e) {
		var node = (typeof e == 'string') ? $(e) : $(this);

		if (!node.length)
			return;

		if (node.val() == node.attr('alt'))
			node.val("");

		node.addClass("active");
	},

	/**
	 * Display placeholder if value is empty.
	 *
	 * @param e
	 */
	reset: function(e) {
		var node = (typeof e == 'string') ? $(e) : $(this);

		if (!node.length)
			return;

		if (node.val() == "")
			node.removeClass("active").val(node.attr('alt'));

		else if (node.val() != node.attr('alt'))
			node.addClass("active")
	},

	/**
	 * Clear field when submitting.
	 *
	 * @param node
	 */
	submit: function(node) {
		node = $(node || this);

		if (node.val() == node.attr('alt'))
			node.val("");

		return true;
	}

};

/**
 * Utility to record window scroll / dimensions.
 */
var Page = {

	/**
	 * Window object.
	 */
	object: null,

	/**
	 * Initialized?
	 */
	loaded: false,

	/**
	 * Window dimensions.
	 */
	dimensions: {
		width: 0,
		height: 0
	},

	/**
	 * Window scroll.
	 */
	scroll: {
		top: 0,
		width: 0
	},

	/**
	 * Initialized and grab window properties.
	 *
	 * @constructor
	 */
	initialize: function() {
		if (Page.loaded)
			return;

		if (!Page.object)
			Page.object = $(window);

		Page.object
			.resize(Page.getDimensions)
			.scroll(Page.getScrollValues);

		Page.getScrollValues();
		Page.getDimensions();
		Page.loaded = true;
	},

	/**
	 * Get window scroll values.
	 */
	getScrollValues: function() {
		Page.scroll.top  = Page.object.scrollTop();
		Page.scroll.left = Page.object.scrollLeft();
	},

	/**
	 * Get window dimensions.
	 */
	getDimensions: function() {
		Page.dimensions.width  = Page.object.width();
		Page.dimensions.height = Page.object.height();
	}
};

/**
 * Gets and displays unread support tickets.
 */
var Tickets = {

	/**
	 * HTML elements.
	 */
	tag: null,
	summary: null,
	fragment: null,
	ul: null,
	doc: null,

	/**
	 * Total number of ticket statuses to show.
	 */
	 total: 3,

	/**
	 * Enable the enahanced support menu.
	 *
	 * @constructor
	 */
	initialize: function() {
	    Tickets.doc = document;
	    var doc = Tickets.doc;
		Tickets.tag = doc.getElementById('support-ticket-count');
		Tickets.summary = doc.getElementById('ticket-summary');
		Tickets.fragment = doc.createDocumentFragment();
		Tickets.ul = doc.createElement('ul');
		Tickets.loadStatus();
	},

	/**
	 * Update the service menu.
	 *
	 * @param json
	 */
	updateSummary: function(json) {

		var doc = Tickets.doc;

		Tickets.fragment = doc.createDocumentFragment();
		Tickets.ul = doc.createElement('ul');
		Tickets.summary.innerHTML = '';
		Tickets.fragment.appendChild(Tickets.ul);

		if (json.length < 1) {
			return;
        }

		for (var i = 0, ticket; ticket = json[i]; i++) {
		    Tickets.createListItem(ticket, i);
		}

		Tickets.summary.appendChild(Tickets.fragment);

	},

	/**
	 * Creates a status summary for a ticket.
	 *
	 * @param ticket A ticket object.
	 * @param index
	 */
	createListItem: function(ticket, index) {

        if (typeof ticket !== 'object') {
            return;
        }

		var doc = Tickets.doc,
		    css = Core.isIE(6) || Core.isIE(7) ? 'className' : 'class',
		    msgSupport = Msg.support,
		    msg = {
				created: msgSupport.ticketNew,
				status: msgSupport.ticketStatus,
				viewAll: msgSupport.ticketAll,
				OPEN: msgSupport.ticketOpen,
				ANSWERED: msgSupport.ticketAnswered,
				RESOLVED: msgSupport.ticketResolved,
				CANCELED: msgSupport.ticketCanceled,
				ARCHIVED: msgSupport.ticketArchived,
				INFO: msgSupport.ticketInfo
			},
			string = '',
			prefix = '',
			suffix = '',
			icon = null,
			li = null,
			a = null,
			span = null,
			br = null,
			datetime = null,
			test = -1;

        if (ticket.status === 'OPEN') {
            string = msg.created.replace('{0}', Core.buildRegion.toUpperCase() + ticket.caseId);
        } else {
            string = msg.status.replace('{0}', Core.buildRegion.toUpperCase() + ticket.caseId);
        }
        datetime = doc.createElement('span');
        datetime.setAttribute(css, 'ticket-datetime');
        datetime.appendChild(doc.createTextNode(Tickets.localizeDatetime(ticket.lastUpdate)));
        a = doc.createElement('a');
        a.href = Core.secureSupportUrl + 'ticket/thread/' + ticket.caseId;
        icon = doc.createElement('span'),
        icon.setAttribute(css, 'icon-ticket-status');
        a.appendChild(icon);
        test = string.indexOf('{1}');
        if (test > 0) {
            prefix = string.substring(0, test);
            suffix = string.substr(test + 3, string.length);
            span = doc.createElement('span');
            span.setAttribute(css, 'ticket-' + ticket.status.toLowerCase());
            span.appendChild(doc.createTextNode(msg[ticket.status]));
            a.appendChild(doc.createTextNode(prefix));
            a.appendChild(span);
            a.appendChild(doc.createTextNode(suffix));
        } else {
            a.appendChild(doc.createTextNode(string));
        }
        br = doc.createElement('br');
        a.appendChild(br);
        a.appendChild(datetime);
        li = doc.createElement('li');
        if (index === 0) {
            li.setAttribute(css, 'first-ticket');
        }
        li.appendChild(a);
        Tickets.ul.appendChild(li);

		if (index === this.total) {
		    li = doc.createElement('li');
		    li.setAttribute(css, 'view-all-tickets');
		    a = doc.createElement('a');
		    a.href = Core.secureSupportUrl + 'ticket/status';
            a.appendChild(doc.createTextNode(msg['viewAll']));
		    li.appendChild(a);
			Tickets.ul.appendChild(li);
		}

    },

	/**
	 * Update the service menu tag with the total number of tickets.
	 *
	 * @param count
	 */
	updateTotal: function(count) {
		count = (typeof count === 'number') ? count : 0;

		var css = (Core.isIE(6) || Core.isIE(7)) ? 'className' : 'class';

		if (count > 0) {
			Tickets.tag.setAttribute(css, 'open-support-tickets');
			Tickets.tag.innerHTML = count;
		} else {
			Tickets.tag.setAttribute(css, 'no-support-tickets');
			Tickets.tag.innerHTML = '';
		}

	},

	/**
	 * Localize the date and time per the user's time zone and locale.
	 *
	 * @param timestamp
	 */
	localizeDatetime: function(timestamp) {
		var format = Core.dateTimeFormat,
			locale = Core.locale,
			datetime = null;

		datetime = Core.formatDatetime(format, timestamp);

		if (!datetime)
			return '';

		if (locale === 'en-us' || locale === 'es-mx' || locale === 'zh-cn' || locale === 'zh-tw') {
			datetime = datetime.replace('/0', '/');

			if (datetime.substr(0, 1) === '0')
				datetime = datetime.substr(1);
		}

		if (locale === 'en-us' || locale === 'es-mx')
			datetime = datetime.replace(' 0', ' ');

		return datetime;

	},

	/**
	 * Load the ticket information through AJAX.
	 */
	loadStatus: function() {
		if (Tickets.summary !== null) {
			$.ajax({
				timeout: 3000,
				url: Core.secureSupportUrl +'update/json',
				ifModified: true,
				global: false,
				dataType: 'jsonp',
				jsonpCallback: 'getStatus',
				success: function(json) {
					Tickets.updateTotal(json.total);
					Tickets.updateSummary(json.details, json.total);
				}
			});
		}
	}

};

/**
 * Simple open/hide toggle system.
 */
var Toggle = {

	/**
	 * Node cache.
	 */
	cache: {},

	/**
	 * Custom defined callback function.
	 */
	callback: null,

	/**
	 * Timeout to close the menu automatically.
	 */
	timeout: 800,

	/**
	 * Determines whether or not to persist menu open.
	 */
	keepOpen: false,

	/**
	 * Opens a menu / dropdown element.
	 *
	 * @param triggerNode
	 * @param activeClass
	 * @param targetPath
	 * @param delay
	 */
	open: function(triggerNode, activeClass, targetPath, delay) {
		if (delay)
			Toggle.timeout = delay;

		//keep menu open
		Toggle.keepOpen = true;

		var key = Toggle.key(targetPath);

		for (var k in Toggle.cache) {
			if (k !== key)
				Toggle.close(Toggle.cache[k].trigger, Toggle.cache[k].activeClass, Toggle.cache[k].target, 0, true);
		}

		//bind events and cache
		if (!Toggle.cache[key]) {
			//bind events and toggle the class
			$(triggerNode)
				.mouseleave(function() {
					Toggle.keepOpen = false;
					Toggle.close(triggerNode, activeClass, targetPath, Toggle.timeout);
				})
				.mouseenter(function() {
					Toggle.keepOpen = true;
					window.clearTimeout(Toggle.cache[key].timer);
				});

			//bind events and toggle display of the target
			$(targetPath)
				.mouseleave(function() {
					Toggle.keepOpen = false;
					Toggle.close(triggerNode, activeClass, targetPath, Toggle.timeout);
				})
				.mouseenter(function() {
					Toggle.keepOpen = true;
					window.clearTimeout(Toggle.cache[key].timer);
				});

			//cache properties
			Toggle.cache[key] = {
				trigger: triggerNode,
				target: targetPath,
				activeClass: activeClass,
				key: key,
				timer: null
			};
		}

		//toggle class/display
		$(triggerNode).toggleClass(activeClass);
		$(targetPath).toggle();

		window.clearTimeout(Toggle.cache[key].timer);
	},

	/**
	 * Close the menu and clear any cached timers.
	 *
	 * @param triggerNode
	 * @param activeClass
	 * @param targetPath
	 * @param delay
	 * @param force
	 */
	close: function(triggerNode, activeClass, targetPath, delay, force) {
		force = typeof force === 'boolean' ? force : false;

		var key = Toggle.key(targetPath);

		window.clearTimeout(Toggle.cache[key].timer);

		Toggle.cache[key].timer = setTimeout(function() {
			if (Toggle.keepOpen && !force)
				return;

			$(targetPath).hide();
			$(triggerNode).removeClass(activeClass);
			Toggle.triggerCallback();
		}, delay);
	},

	/**
	 * Generate the key.
	 *
	 * @param targetPath
	 * @return string
	 */
	key: function(targetPath) {
		return (typeof targetPath == 'string') ? targetPath : '#'+ $(targetPath).attr('id');
	},

	/*
	 * Trigger a callback if defined
	 */
	triggerCallback: function() {
		if (Core.isCallback(Toggle.callback))
			Toggle.callback();
	}
};

/**
 * Creates a full page blackout.
 */
var Blackout = {

	/**
	 * Has the blackout been opened before?
	 */
    initialized: false,

	/**
	 * The DOM element.
	 */
    element: null,

	/**
	 * Create the div to be used.
	 *
	 * @constructor
	 */
    initialize: function() {
        Blackout.element = $('<div/>', { id: 'blackout' });
		Blackout.element.click(Core.stopPropagation);

        $("body").append(Blackout.element);

        Blackout.initialized = true;
    },

    /*
     * Shows the blackout
     *
     * @param callback (optional) - function that gets called after blackout shows
     * @param onClick  (optional) - function binds onclick functionality to blackout
     */
    show: function(callback, onClick) {
        if (!Blackout.initialized)
            Blackout.initialize();

        // Ie fix
        if (Core.isIE()) {
            Blackout.element
                .css("width", Page.dimensions.width)
                .css("height", $(document).height());
        }

        // Show blackout
        Blackout.element.show();

        // Call optional functions
        if (Core.isCallback(callback))
            callback();

        if (Core.isCallback(onClick))
            Blackout.element.click(onClick);
    },

    /*
     * Hides blackout
     *
     * @param callback (optional) - function that gets called after blackout hides
     */
    hide: function(callback) {
		Blackout.element.hide();

        if (Core.isCallback(callback))
            callback();

        Blackout.element.unbind("click");
    }
};

/**
 * Manage the context / character selection menu.
 */
var CharSelect = {

	/**
	 * Initialize the class.
	 *
	 * @constructor
	 */
	initialize: function() {
		$(document).undelegate('a.context-link', 'click', CharSelect.toggle);
		$(document).delegate('a.context-link', 'click', CharSelect.toggle);

		$('div.scrollbar-wrapper').css('overflow', 'hidden');
		$('input.character-filter')
			.blur(function() { Toggle.keepOpen = false; })
			.keyup(CharSelect.filter);

		Input.bind('.character-filter');
	},

	/**
	 * Pin a character to the top.
	 *
	 * @param index
	 * @param link
	 */
	pin: function(index, link) {
		Tooltip.hide();
		$('div.character-list').html("").addClass('loading-chars');

		var switchUrl = Core.baseUrl +'/pref/character';

		$.ajax({
			type: 'POST',
			url: switchUrl,
			data: {
				index: index,
				xstoken: Cookie.read('xstoken')
			},
			global: false,
			success: function(content) {
				var refreshUrl = switchUrl;

				if (Core.isIE(9)) {
					location.reload(true);
				}

				// Take the user directly to the newly-selected character, don't wait for card update
				if (location.pathname.indexOf('/character/') != -1) {
					if (location.pathname.indexOf('/vault/') != -1)
						location.reload(true);
					else
						CharSelect.redirectTo(link.href);

					return;
				}

				// If homepage or account status, use those pages since they are unique
				if (location.pathname.indexOf('/account-status') >= 0)
					refreshUrl = Core.baseUrl +'/account-status';

				else if (location.pathname == Core.baseUrl +'/')
					refreshUrl = Core.baseUrl +'/';

				// Request new content or replace
				if (refreshUrl != switchUrl)
					CharSelect.pageUpdate(refreshUrl);
				else
					CharSelect.replace(content);
			}
		})
	},

	/**
	 * Replace elements in the current page with fetched elements.
	 *
	 * @param content
	 */
	replace: function(content) {
		var pageData = $((typeof content == 'string') ? content : content.documentElement);

		$('.ajax-update').each(function() {
			var self = $(this),
				target;

			if (self.attr('id')) {
				target = '#'+ self.attr('id');
			} else {
				target = self.attr('class').replace('ajax-update', '').trim();
				target = '.'+ target.split(' ')[0];
			}

			self.replaceWith( pageData.find(target +'.ajax-update').clone() );
		});

		CharSelect.initialize();
		CharSelect.afterPageUpdate();
	},

	/**
	 * Update all the elements on the page after char selection.
	 *
	 * @param refreshUrl
	 * @param fallbackUrl
	 */
	pageUpdate: function(refreshUrl, fallbackUrl) {
		refreshUrl = refreshUrl || location.href;
		var ck = Date.parse(new Date());

		if (Core.isIE() && refreshUrl == Core.baseUrl +'/') {
			location.href = location.pathname +'?reload='+ ck;
			return;
		}

		refreshUrl = refreshUrl + ((refreshUrl.indexOf('?') > -1) ? '&' : '?') +"cachekill="+ ck;

		$.ajax({
			url: refreshUrl,
			global: false,
			error: function(xhr) {
				if (fallbackUrl) {
					location.href = fallbackUrl;
				} else if (xhr.status == 404 && refreshUrl == null) {
					CharSelect.pageUpdate(Core.baseUrl + "/", fallbackUrl); // Attempt to get data from homepage
				} else {
					location.reload(true);
				}
			},
			success: function(data) {
				CharSelect.replace(data);
			}
		});
	},

	/**
	 * Trigger code after page update.
	 */
	afterPageUpdate: function() {

		// Redirect to the newly-selected character or guild
		var redirectTo;

		if (location.href.indexOf('/character/') != -1) {
			redirectTo = $('#user-plate a.character-name').attr('href');

		} else if (location.href.indexOf('/guild/') != -1) {
			redirectTo = $('#user-plate a.guild-name').attr('href');

			// Deal with guildless characters
			if (!redirectTo) {
				location.href = $('#user-plate a.character-name').attr('href');
				return;
			}
		}

		if (redirectTo)
			CharSelect.redirectTo(redirectTo);
	},

	/**
	 * Redirect to a URL.
	 *
	 * @param url
	 */
	redirectTo: function(url) {
		// Vault-secured pages only need to be refreshed
		if (url.indexOf('/vault/') != -1) {
			location.reload();
			return;
		}

		// Preserve current page
		var page = '';

		if (location.href.match(/\/(character|guild)\/.+?\/.+?\/(.+)$/)) {
			page = RegExp.$2;

			// Ignore pages that aren't always available
			$.each(['pet', 'profession'], function() {
				if (page.indexOf(this) != -1) {
					page = '';
					return;
				}
			});
		}

		location.href = url + page;
	},

	/**
	 * Open and close the context menu.
	 *
	 * @param e
	 */
	toggle: function(e) {
		e.preventDefault();
		e.stopImmediatePropagation();

		Toggle.open(e.currentTarget, "context-open", $(e.currentTarget).siblings('.ui-context'));
		return false;
	},

	/**
	 * Close the context menu.
	 *
	 * @param node
	 * @return boolean
	 */
	close: function(node) {
		$(node)
			.parents('.ui-context').hide()
			.siblings('.context-link').removeClass('context-open');

		return false;
	},

	/**
	 * Swipe between the char select panes.
	 *
	 * @param direction
	 * @param target
	 */
	swipe: function(direction, target) {
		var parent = $(target).parents('.chars-pane'),
			inDirection = (direction == 'in') ? 'left' : 'right',
			outDirection = (direction == 'in') ? 'right' : 'left';

		parent.hide('slide', { direction: inDirection }, 150, function() {
			parent.siblings('.chars-pane').show('slide', { direction: outDirection }, 150, function() {
				var scroll = $(this).find('.scrollbar-wrapper');

				if (scroll.length > 0)
					scroll.tinyscrollbar();
			});
		});
	},

	/**
	 * Filter down the character list.
	 *
	 * @param e
	 */
	filter: function(e) {
		e.preventDefault();
		e.stopPropagation();

		Toggle.keepOpen = true;

		if (e.keyCode == KeyCode.enter)
			return;

		var target = $(e.srcElement || e.currentTarget),
			filterVal = target.val().toLowerCase(),
			filterTable = target.parents('.chars-pane').find('.overview');

		if (e.keyCode == KeyCode.esc)
			target.val('');

		if (target.val().length < 1) {
			filterTable.children('a').removeClass('filtered');
		} else {
			filterTable.children('a').each(
				function() {
				 	$(this)[($(this).text().toLowerCase().indexOf(filterVal) > -1) ? "removeClass" : "addClass"]('filtered');
				}
			);

			var allHidden = filterTable.children('a.filtered').length >= filterTable.children('a').length;
			filterTable.children('.no-results')[(allHidden) ? "show" : "hide"]();
		}

		var scroll = target.parents('.chars-pane:first').find('.scrollbar-wrapper');

		if (scroll.length > 0)
			scroll.tinyscrollbar();
	}
};

/**
 * Variables and functions for flash
 */
var Flash = {

    /**
     * Video player for this project
     */
    videoPlayer: '',

    /**
     * The flash base of the videos for this project
     */
    videoBase:   '',

    /**
     * Rating image based on locale
     */
    ratingImage: '',

    /**
     * Express install location
     */
    expressInstall: 'expressInstall.swf',

    /**
     * Required version for Flash player
     */
    requiredVersion: '10.2.154',

    /**
     * Store values populated after load
     */
    initialize: function() {
         //set flash base and rating image
         Flash.defaultVideoParams.base          = Flash.videoBase;
         Flash.defaultVideoFlashVars.ratingPath = Flash.ratingImage;
         Flash.defaultVideoFlashVars.locale     = Core.locale;
         Flash.defaultVideoFlashVars.dateFormat = Core.shortDateFormat;
    },

    /**
     * Default video params for the video player
     */
    defaultVideoParams: {
         allowFullScreen:   "true",
         bgcolor:           "#000000",
         allowScriptAccess: "always",
         wmode:             "opaque",
         menu:              "false"
    },

    /**
     * Default flash vars for videos
     */
    defaultVideoFlashVars: {
        ratingFadeTime: "2",
        ratingShowTime: "1",
        autoPlay:       true
    }
};

/**
 * Helper functions for switching language / region.
 */
var Locale = {

    /**
     * Path to the data source.
     */
    dataPath: 'data/i18n.frag',

	/**
	 * Initialize and bind "open menu" links.
	 *
	 * @constructor
	 */
	initialize: function() {
		var path = location.pathname.replace(Core.baseUrl, "");
			path = path + (location.search || '?');

		$('#change-language, #service .service-language a').click(function() {
			return Locale.openMenu('#change-language', encodeURIComponent(path));
		});
	},

    /**

     * Open up the language selection menu at the target location.
     *
     * @param toggler
     * @param path
     */
    openMenu: function(toggler, path) {
        var node = $('#international');
        toggler = $(toggler);
        path = path || '';

        if (node.is(':visible')) {
            node.slideUp();
            toggler.toggleClass('open');

        } else {
            if (node.html() != "") {
                Locale.display();
                toggler.toggleClass('open');
            } else {
                $.ajax({
                    url: Core.baseUrl +'/'+ Locale.dataPath +'?path='+ path,
                    dataType: 'html',
                    success: function(data) {
                        if (data) {
                            node.replaceWith(data);
                            toggler.toggleClass('open');
                            Locale.display();
                        }
                    }
                });
            }
        }

        return false;
    },

    /**
     * Track language events.
	 *
	 * @param eventAction
	 * @param eventLabel
     */
	trackEvent: function(eventAction, eventLabel) {
		try {
			_gaq.push(['_trackEvent', 'Battle.net Language Change Event', eventAction, eventLabel]);
		} catch(e) { }
	},

	/**
	 * Display the international menu.
	 */
	display: function() {
		var node = $('#international');

		node.slideDown('fast', function() {
			$(this).css('display', 'block');
		});

		// Opera doesn't animate on scroll down
		if (!$.browser.opera) {
			$('html, body').animate({
				scrollTop: node.offset().top
			}, 1000);
		}
	}
};

/**
 * Pop up toasts at the bottom left of the browser, or at a certain location.
 */
var Toast = {

	/**
	 * DOM object.
	 */
	container: null,

	/**
	 * Has the class been initialized?
	 */
	initialized: false,

	/**
	 * Max toasts to display.
	 */
	max: 5,

	/**
	 * Default options.
	 */
	options: {
		timer: 15000,
		autoClose: true,
		onClick: null
	},

	/**
	 * Build the container.
	 *
	 * @constructor
	 */
	initialize: function() {
		Toast.container = $('<div/>')
			.attr('id', 'toast-container')
			.show()
			.appendTo('body');

		Toast.initialized = true;
	},

	/**
	 * Create the toast element.
	 *
	 * @param content
	 * @return object
	 */
	create: function(content) {
		var toast = $('<div/>')
			.addClass('ui-toast')
			.hide()
			.appendTo(Toast.container);

		$('<div/>').addClass('toast-arrow').appendTo(toast);
		$('<div/>').addClass('toast-top').appendTo(toast);
		$('<div/>').addClass('toast-content').appendTo(toast).html(content);
		$('<div/>').addClass('toast-bot').appendTo(toast);

		$('<a/>')
			.addClass('toast-close')
			.attr('href', 'javascript:;')
			.appendTo(toast)
			.click(function(e) {
				e.preventDefault();
				e.stopPropagation();

				$(this).parent('.ui-toast').fadeOut('normal', function() {
					$(this).remove();
				});
			});

		return toast;
	},

	/**
	 * Pop up a toast.
	 *
	 * @param content
	 * @param options	timer, autoClose, onClick
	 */
	show: function(content, options) {
		if (!Toast.initialized)
			Toast.initialize();

		Toast.truncate();

		var toast = Toast.create(content);

		options = $.extend({}, Toast.options, options);

		if (options.autoClose) {
			window.setTimeout(function() {
				toast.fadeOut('normal', function() {
				   toast.remove();
			   });
			}, options.timer);

		} else {
			toast.click(function() {
			   toast.fadeOut('normal', function() {
				   toast.remove();
			   });
			}).css('cursor', 'pointer');
		}

		if (Core.isCallback(options.onClick))
			toast.click(options.onClick).css('cursor', 'pointer');

		toast.fadeIn();
	},

	/**
	 * Truncate toasts if it exceeds the max limit.
	 */
	truncate: function() {
		var total = Toast.container.find('.ui-toast');

		if (total.length > Toast.max)
			Toast.container.find('.ui-toast:lt('+ Math.round(total.length - Toast.max) +')').fadeOut();
	}
};

/**
 * Mappings of keyboard key codes for all supported regions.
 *
 * @link http://unixpapa.com/js/key.html
 */
var KeyCode = {

	/**
	 * Convenience codes.
	 */
	backspace: 8,
	enter: 13,
	esc: 27,
	space: 32,
	tab: 9,
	arrowLeft: 37,
	arrowUp: 38,
	arrowRight: 39,
	arrowDown: 40,

	/**
	 * A map of all key codes.
	 *
	 * Supported: en, es, de, ru, ko (no changes), fr
	 */
	map: {
		global: {
			// 0-9 numbers (48-57) and numpad numbers (96-105)
			numbers: [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105],

			// A-Z letters
			letters: [65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90],

			// Backspace, tab, enter, shift, ctrl, alt, caps, esc, num, space pup, pdown, end, home, ins, del
			controls: [8, 9, 13, 16, 17, 18, 20, 27, 33, 32, 34, 35, 36, 45, 46, 144],

			// Function (F keys)
			functions: [112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123],

			// Left, right, up, down, arrows
			arrows: [37, 38, 39, 40],

			// Windows, Mac specific buttons
			os: [17, 91, 92, 93, 219, 224]
		},
		de: {
			letters: [59, 192, 219, 222]
		},
		es: {
			letters: [59, 192]
		},
		ru: {
			letters: [59, 188, 190, 192, 219, 221, 222]
		},
		fr: {
			letters: [191]
		}
	},

	/**
	 * Get all the arrows codes.
	 *
	 * @param lang
	 * @return array
	 */
	arrows: function(lang) {
		return KeyCode.get('arrows', lang);
	},

	/**
	 * Get all the control codes.
	 *
	 * @param lang
	 * @return array
	 */
	controls: function(lang) {
		return KeyCode.get('controls', lang);
	},

	/**
	 * Get all the functions codes.
	 *
	 * @param lang
	 * @return array
	 */
	functions: function(lang) {
		return KeyCode.get('functions', lang);
	},

	/**
	 * Return a key code map.
	 *
	 * @param type
	 * @param lang
	 * @return mixed
	 */
	get: function(type, lang) {
	    lang = lang || Core.getLanguage();
		var map = [],
			types = [];

		if (typeof type == 'string')
			types = [type];
		else
			types = type;

		for (var i = 0, l = types.length; i < l; ++i) {
			var t = types[i];

			if (!KeyCode.map.global[t])
				continue;

			map = map.concat(KeyCode.map.global[t]);

			if (KeyCode.map[lang] && KeyCode.map[lang][t])
				map = map.concat(KeyCode.map[lang][t]);
		}

		return map;
	},

	/**
	 * Validates an input to only accept letters and controls.
	 *
	 * @param e
	 * @param lang
	 * @return bool
	 */
	isAlpha: function(e, lang) {
		return ($.inArray(e.which, KeyCode.get(['letters', 'controls'], lang)) >= 0);
	},

	/**
	 * Validates an input to only accept letters, numbers and controls.
	 *
	 * @param e
	 * @param lang
	 * @return bool
	 */
	isAlnum: function(e, lang) {
		return (KeyCode.isAlpha(e, lang) || KeyCode.isNumeric(e, lang));
	},

	/**
	 * Validates an input to only accept numbers and controls.
	 *
	 * @param e
	 * @param lang
	 * @return bool
	 */
	isNumeric: function(e, lang) {
		return ($.inArray(e.which, KeyCode.get(['numbers', 'controls'], lang)) >= 0) && !e.shiftKey;
	},

	/**
	 * Get all the letter codes.
	 *
	 * @param lang
	 * @return array
	 */
	letters: function(lang) {
		return KeyCode.get('letters', lang);
	},

	/**
	 * Get all the number codes.
	 *
	 * @param lang
	 * @return array
	 */
	numbers: function(lang) {
		return KeyCode.get('numbers', lang);
	}

};

var BnetAds = {

	/**
	 * Load an ad from the marketing API.
	 *
	 * @param target
	 * @param size
	 */
	init: function(target, size){
		$.ajax({
			url: '/marketing/',
			data: {
				showText: true,
				locale: Core.formatLocale(2, '_'),
				size: size
			},
			dataType: 'html',
			success: function(data) {
				if (data !== "") {
					var dataBody = data.substring(data.indexOf('<body>'), data.indexOf('</body>')+7);

					$(target).find('.sidebar-content').html($(dataBody).html()).removeClass('loading');
				}
			},
			error: function() {
				$(target).remove();
			},
			cache: false,
			global: false
		});
	},

	/**
	 * Bind ad tracking.
	 *
	 * @param query
	 * @param category
	 * @param action
	 */
	bindTracking: function(query, category, action) {
		$(query).click(function() {
			try {
				_gaq.push([
					'_trackEvent',
					category,
					action,
					$(this).data('ad') +' ['+ Core.locale +']'
				]);
			} catch (e) {}
		})
	},

	/**
	 * Track a page impression / view.
	 *
	 * @param category
	 * @param action
	 * @param label
	 */
	trackImpression: function(category, action, label) {
		try {
			_gaq.push([
				'_trackEvent',
				category,
				action,
				label +' ['+ Core.locale +']'
			]);
		} catch (e) {}
	},

	/**
	 * Track a loaded battle.net ad.
	 *
	 * @param id
	 * @param title
	 * @param ref
	 * @param clickEvent
	 */
	trackEvent: function(id, title, ref, clickEvent) {
		try {
			ref = (ref) ? ref +' - ' : '';

			_gaq.push([
				'_trackEvent',
				'Battle.net Ad Service',
				(clickEvent) ? 'Ad Click-Throughs' : 'Ad Impressions',
				'Ad '+ encodeURIComponent(title.replace(' ', '_')) +' - '+ ref + Core.locale +' - '+ id
			]);
		} catch (e) {}
	}
};

/**
 * Determines the browser and version based off the user agent.
 */
var UserAgent = {

	/**
	 * User agent header.
	 */
	header: navigator.userAgent.toLowerCase(),

	/**
	 * The current browser.
	 */
	browser: 'other',

	/**
	 * The current version, single number.
	 */
	version: null,

	/**
	 * Extracte the browser and version.
	 *
	 * @constructor
	 */
	initialize: function() {
		var userAgent = UserAgent.header,
			version,
			browser;

		// Browser
		if (userAgent.indexOf('firefox') != -1)
			browser = 'ff';

		else if (userAgent.indexOf('msie') != -1)
			browser = 'ie';

		else if (userAgent.indexOf('chrome') != -1)
			browser = 'chrome';

		else if (userAgent.indexOf('opera') != -1)
			browser = 'opera';

		else if (userAgent.indexOf('safari') != -1)
			browser = 'safari';

		// Version
		if (browser == 'ff')
			version = /firefox\/([-.0-9]+)/.exec(userAgent);

		else if (browser == 'ie')
			version = /msie ([-.0-9]+)/.exec(userAgent);

		else if (browser == 'chrome')
			version = /chrome\/([-.0-9]+)/.exec(userAgent);

		else if (browser == 'opera')
			version = /opera\/([-.0-9]+)/.exec(userAgent);

		else if (browser == 'safari')
			version = /safari\/([-.0-9]+)/.exec(userAgent);

		UserAgent.browser = browser;
		UserAgent.version = version[1].substring(0, 1);

		var className = browser;

		if (UserAgent.version)
			className += ' '+ browser + UserAgent.version;

		if (browser == 'ie' && (UserAgent.version == 6 || UserAgent.version == 7))
			className += ' ie67';

		$('html').addClass(className);
	}
};

/**
 * Simple API for interacting with the browsers local storage.
 */
var Storage = {

	/**
	 * Does browser support local storage?
	 */
	initialized: (window.localStorage),

	/**
	 * Get item from storage.
	 *
	 * @param key
	 * @return mixed
	 */
	get: function(key) {
		if (Storage.initialized && key)
			return localStorage.getItem(key);

		return null;
	},

	/**
	 * Get all items from storage.
	 *
	 * @param prefix
	 * @return mixed
	 */
	getAll: function(prefix) {
		var items = [];

		if (!Storage.initialized)
			return items;

		for (var i = 0, l = localStorage.length, k = null; i < l; i++) {
			k = localStorage.key(i);

			if (prefix && k.indexOf(prefix) !== 0)
				continue;

			items.push({
				key: k,
				value: localStorage[k]
			});
		}

		return items;
	},

	/**
	 * Check if a key exists and has a value.
	 *
	 * @param key
	 */
	has: function(key) {
		return (Storage.get(key) !== null);
	},

	/**
	 * Add/set an item into storage.
	 *
	 * @param key
	 * @param value
	 * @return mixed
	 */
	set: function(key, value) {
		if (Storage.initialized && key) {
			try {
				localStorage.setItem(key, value || '');
			} catch (e) {
				if (e == QUOTA_EXCEEDED_ERR) {
					alert('Local storage quota exceeded, please clear your saved data.');
				}
			}

			return true;
		}

		return false;
	},

	/**
	 * Clear all stored data.
	 */
	clear: function() {
		if (Storage.initialized)
			localStorage.clear();
	},

	/**
	 * Remove a single item from storage.
	 *
	 * @param key
	 */
	remove: function(key) {
		if (Storage.initialized && key)
			localStorage.removeItem(key);
	},

	/**
	 * Get the total items stored.
	 *
	 * @param prefix
	 * @return int
	 */
	size: function(prefix) {
		if (prefix) {
			return Storage.getAll(prefix).length;
		}

		return localStorage.length || 0;
	}

};

/**
 * Creates an overlay box (modal) and blacks out the page for focus.
 * Can fetch content from a DOM element or through AJAX.
 *
 * @copyright   2010, Blizzard Entertainment, Inc
 * @class       Overlay
 * @requires    Page
 * @example
 *
 *      onclick="Overlay.open('/ajax/url/', { ajax: true });"
 *
 */

var Overlay = {

	/**
     * Cached results from the AJAX responses.
     */
    cache: {},

	/**
	 * Default configuration.
	 */
	config: {
		ajax: false,
		bindClose: true,
		className: "",
		fadeSpeed: 250,
		blackout: true
	},

	/**
	 * Has the class been initialized?
	 */
	loaded: null,

	/**
	 * DOM object for the overlay.
	 */
	wrapper: null,

	/**
	 * Initialize the class and create the markup.
     *
     * @constructor
	 */
	initialize: function() {
		if (Overlay.loaded && Overlay.wrapper)
			return;

		Overlay.wrapper = $('<div/>', {
			id: 'overlay',
			'class': 'ui-overlay'
		}).appendTo('body').hide();

		$('<a/>')
			.addClass('overlay-close')
			.attr('href', 'javascript:;')
			.click(Overlay.close)
			.appendTo(Overlay.wrapper);

		var top = $('<div/>').addClass('overlay-top').appendTo(Overlay.wrapper);
		var bot = $('<div/>').addClass('overlay-bottom').appendTo(top);
		var mid = $('<div/>').addClass('overlay-middle').appendTo(bot);

		Overlay.loaded = true;
	},

	/**
	 * Close the overlay.
	 */
	close: function(speed) {
		speed = !speed ? 10 : (speed || 250);

		$("#blackout").fadeOut(speed);

		Overlay.wrapper.fadeOut(speed, function() {
			Overlay.setContent("");
			Overlay.wrapper.attr('class', 'ui-overlay');

			if (Overlay.wrapper.attr('id') !== 'overlay')
				Overlay.wrapper.hide();
		});
	},

	/**
	 * Open up an overlay. Fill the content with text, DOM or AJAX.
	 *
	 * @param content
	 * @param config
	 */
	open: function(content, config) {
		Overlay.initialize();
		config = $.extend({}, Overlay.config, config);

		if (config.className)
			Overlay.wrapper.addClass(config.className);

		if (config.blackout) {
			if (config.bindClose) {
				Blackout.show(null, function() {
					Overlay.close(config.fadeSpeed);
				});
			} else {
				Blackout.show();
			}
		}

		// Content: AJAXs
		if (config.ajax) {

			// Look in cache
            if (Overlay.cache[content]) {
				Overlay.show(Overlay.cache[content]);
            } else {
				$.ajax({
					type: "GET",
					url: content,
					dataType: "html",
					beforeSend: function() {
						Overlay.reset();
						Overlay.show();
					},
					success: function(data, status) {
						Overlay.cache[content] = data;
						Overlay.setContent(data);
					}
				});
			}

		// Content: DOM
        } else if (content.substr(0, 1) === '#') {
            Overlay.show($(content).html());

        // Content: Text
        } else {
            Overlay.show(content);
        }
	},

	/**
	 * Open up a custom overlay.
	 *
	 * @param element
	 * @param config
	 */
	openCustom: function(element, config) {
		Overlay.wrapper = $(element);

		if (Overlay.wrapper) {
			config = $.extend({}, Overlay.config, config);

			if (config.blackout) {
				if (config.bindClose) {
					Blackout.show(null, function() {
						Overlay.close(config.fadeSpeed);
					});
				} else {
					Blackout.show();
				}
			}

			Overlay.position();
		}
	},

	/**
     * Position the overlay at specific coodinates.
     *
     * @param node
     */
    position: function(node) {
        node = node || Overlay.wrapper;

        var width = node.outerWidth(),
			height = node.outerHeight(),
			x = (Page.dimensions.width / 2) - (width / 2),
			y = (Page.dimensions.height / 2) - (height / 2);

		if (Core.isIE(6))
			y = Page.scroll.top + y;

        node.show().css({
			left: x +'px',
			top: y +'px',
			position: Core.isIE(6) ? 'absolute': 'fixed'
		});
    },

	/**
	 * Wipe the overlay and display a loading animation.
	 */
	reset: function() {
		Overlay.wrapper.find('.overlay-middle')
			.html("")
			.addClass('overlay-loading');
	},

	/**
	 * Now display the overlay.
	 *
	 * @param content
	 */
	show: function(content) {
		Overlay.setContent(content);
		Overlay.position();
	},

	/**
	 * Set the content of the overlay.
	 *
	 * @param content
	 */
	setContent: function(content) {
		if (content != null)
			Overlay.wrapper.find('.overlay-middle').html(content);
	}

};

/**
 * Used to encode/decode basic numbers into a hash string.
 */
var Hash = {

	/**
	 * Base 64
	 */
	base: 'aZbYcXdWeVfUgThSiRjQkPlOmNnMoLpKqJrIsHtGuFvEwDxCyBzA0123456789+/',

	/**
	 * Delimiter used when grouping multiple batches.
	 */
	delimiter: '!',

	/**
	 * Used to denote an empty character.
	 */
	empty: '.',

	/**
	 * Batch multiple hashes with encode.
	 *
	 * @param data
	 * @return string
	 */
	batch: function(data) {
		var hashes = [];

		for (var i = 0, l = data.length; i < l; i++) {
			hashes.push( Hash.encode(data[i]) );
		}

		return Core.trimRight(hashes.join(Hash.delimiter), Hash.delimiter);
	},

	/**
	 * Encode an array into a hash using the base.
	 *
	 * @param data
	 * @return string
	 */
	encode: function(data, useEmpty) {
		var hash = '',
			base = Hash.base,
			empty = Hash.empty;

		for (var i = 0, l = data.length; i < l; i++) {
			if (data[i] !== null)
				hash += base.charAt(data[i]);

			else if (useEmpty)
				hash += empty;
		}

		return Core.trimRight(hash, empty);
	},

	/**
	 * Decode a hash into an array using the base.
	 *
	 * @param data
	 * @return array
	 */
	decode: function(data) {
		var array = [],
			base = Hash.base,
			empty = Hash.empty;

		for (var i = 0, l = data.length, v; i < l; i++) {
			v = data.charAt(i);
			v = (v == empty) ? null : base.indexOf(v);

			array.push(v);
		}

		return array;
	}

};

/**
 * Opens up a quick prompt that accepts an input.
 */
var Prompt = {

	/**
	 * DOM objects.
	 */
	node: null,
	input:  null,
	title: null,
	errors: null,

	/**
	 * Is markup created?
	 */
	initialized: false,

	/**
	 * Default rules.
	 */
	defaults: {
		minLength: { value: 1 },
		maxLength: { value: 25 },
		numeric: { value: false }
	},

	/**
	 * Set of rules to validate against.
	 */
	rules: {},

	/**
	 * Validation callback.
	 */
	callback: null,

	/**
	 * Create the DOM elements.
	 */
	initialize: function() {
		Prompt.node = $('<div/>')
			.addClass('ui-prompt')
			.click(Core.stopPropagation)
			.appendTo('body');

		var inner = $('<form/>')
			.attr('method', 'post')
			.attr('action', '')
			.addClass('prompt-inner')
			.appendTo(Prompt.node)
			.submit(Core.preventDefault)
			.keyup(function(e) {
				if (e.which == KeyCode.enter) {
					Prompt.validate();
				}
			});

		Prompt.title = $('<h3/>')
			.addClass('subheader')
			.text('')
			.appendTo(inner);

		Prompt.input = $('<input/>')
			.addClass('input')
			.appendTo(inner)
			.focus(Input.activate)
			.blur(Input.reset);

		Prompt.errors = $('<ul/>')
			.addClass('prompt-errors')
			.hide()
			.appendTo(inner);

		var buttons = $('<div/>')
			.addClass('prompt-buttons')
			.appendTo(inner);

		// IE blows up if you set type via attr()
		$('<button type="button"/>')
			.addClass('ui-button button1')
			.html('<span><span>' + Msg.ui.submit + '</span></span>')
			.click(Prompt.validate)
			.appendTo(buttons);

		$('<button type="button"/>')
			.addClass('ui-button button1')
			.html('<span><span>' + Msg.ui.cancel + '</span></span>')
			.click(Prompt.close)
			.appendTo(buttons);

		$(document).bind('keyup.prompt', function(e) {
			if (e.which == KeyCode.esc)
				Prompt.close();
		});

		Prompt.initialized = true;
	},

	/**
	 * Open the prompt at the target location and set the rules and callback.
	 *
	 * @param title
	 * @param callback
	 * @param rules
	 */
	open: function(title, callback, rules) {
		if (!Prompt.initialized)
			Prompt.initialize();

		var width = Prompt.node.outerWidth(),
			height = Prompt.node.outerHeight(),
			x = (Page.dimensions.width / 2) - (width / 2),
			y = (Page.dimensions.height / 2) - (height / 2) + Page.scroll.top;

		Prompt.rules = $.extend({}, Prompt.defaults, rules || {});
		Prompt.callback = callback;

		Prompt.title.text(title);
		Prompt.input.attr('maxlength', Prompt.rules.maxLength.value);

		Prompt.node.css({
			top: y,
			left: x
		}).show();

		Blackout.show(function() {
			Prompt.input.focus();
		}, Prompt.close);
	},

	/**
	 * Close the prompt and reset.
	 */
	close: function() {
		Prompt.input.val('').trigger('blur');
		Prompt.errors.empty().hide();

		Prompt.node.hide();
		Blackout.hide();
	},

	/**
	 * Validate the rules. If successful, trigger callback.
	 *
	 * @param e
	 */
	validate: function() {

		var input = Prompt.input,
			value = input.val().trim(),
			valid = true,
			errors = [],
			rule,
			i = 0,
			l = 0;

		for (var key in Prompt.rules) {
			rule = Prompt.rules[key];
			valid = true;

			if (!rule) {
				continue;
			}

			if (typeof rule.value === 'function') {
				valid = rule.value(value);
			} else {
				switch (key) {
					case 'minLength':
						if (rule.value && value.length < rule.value)
							valid = false;
					break;
					case 'maxLength':
						if (rule.value && value.length > rule.value)
							valid = false;
					break;
					case 'numeric':
						if (rule.value && isNaN(value))
							valid = false;
					break;
				}
			}

			if (!valid)
				errors.push(rule.message || key);
		}

		if (errors.length) {
			Prompt.errors.empty().show();

			for (i = 0, l = errors.length; i < l; i++) {
				$('<li/>').text(errors[i]).appendTo(Prompt.errors);
			}

		} else {
			if (Core.isCallback(Prompt.callback))
				Prompt.callback(value);

			Prompt.close();
		}
	}

};

/**
 * Load asynchronously.
 */
UserAgent.initialize();

/**
 * Prototype overwrites.
 */
String.prototype.trim = function() {
	return $.trim(this);
};

/**
 * Simple JavaScript Inheritance
 * By John Resig http://ejohn.org/
 * MIT Licensed.
 */
(function() {
	var initializing = false,
		fnTest = /xyz/.test(function(){xyz;}) ? /\b_super\b/ : /.*/;

	// The base Class implementation (does nothing)
	window.Class = function() {};

	// Create a new Class that inherits from this class
	Class.extend = function(prop) {
		var _super = this.prototype;

		// Instantiate a base class (but only create the instance, don't run the init constructor)
		initializing = true;
		var prototype = new this();
		initializing = false;

		// Copy the properties over onto the new prototype
		for (var name in prop) {

			// Check if we're overwriting an existing function
			if (typeof prop[name] == "function" && typeof _super[name] == "function" && fnTest.test(prop[name])) {
				prototype[name] = (function(name, fn) {
					return function() {
						var tmp = this._super;

						// Add a new ._super() method that is the same method
						// but on the super-class
						this._super = _super[name];

						// The method only need to be bound temporarily, so we
						// remove it when we're done executing
						var ret = fn.apply(this, arguments);
						this._super = tmp;

						return ret;
					};
				})(name, prop[name]);

			} else {
				prototype[name] = prop[name];
			}
		}

		// The dummy class constructor
		function Class() {
			// All construction is actually done in the init method
			if (!initializing && this.init)
				this.init.apply(this, arguments);
		}

		// Populate our constructed prototype object
		Class.prototype = prototype;

		// Enforce the constructor to be what we expect
		Class.constructor = Class;

		// And make this class extendable
		Class.extend = this.callee || arguments.callee;

		return Class;
	};
})();

/**
 * Setup ajax calls.
 */
$.ajaxSetup({
	error: function(xhr, status) {
		if (xhr.readyState != 4)
			return false;

		if (xhr.getResponseHeader("X-App") == "login") {
			Login.openOrRedirect();
			return false;
		}

		if (xhr.status) {
			switch (xhr.status) {
				case 301:
				case 302:
				case 307:
				case 403:
				case 404:
				case 500:
				case 503:
					//location.reload(true);
					return false;
				break;
			}
		}

		// Attempt to detect a redirect. Redirect throws no headers, others do.
		if (status == 'error' && !xhr.getAllResponseHeaders()) {
			// Not working correctly
			//Login.openOrRedirect();
			return false;
		}

		return true;
	}
});