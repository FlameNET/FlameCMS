/* ==========================================================
 * FLAT KIT v1.2.0
 * common.js
 * 
 * http://www.mosaicpro.biz
 * Copyright MosaicPro
 *
 * Built exclusively for sale @Envato Marketplaces
 * ========================================================== */ 

/* Utility functions */

// generate a random number
function randNum()
{
	return (Math.floor( Math.random()* (1+40-20) ) ) + 20;
}

function parse_url (str, component) {
	  // http://kevin.vanzonneveld.net
	  // +      original by: Steven Levithan (http://blog.stevenlevithan.com)
	  // + reimplemented by: Brett Zamir (http://brett-zamir.me)
	  // + input by: Lorenzo Pisani
	  // + input by: Tony
	  // + improved by: Brett Zamir (http://brett-zamir.me)
	  // %          note: Based on http://stevenlevithan.com/demo/parseuri/js/assets/parseuri.js
	  // %          note: blog post at http://blog.stevenlevithan.com/archives/parseuri
	  // %          note: demo at http://stevenlevithan.com/demo/parseuri/js/assets/parseuri.js
	  // %          note: Does not replace invalid characters with '_' as in PHP, nor does it return false with
	  // %          note: a seriously malformed URL.
	  // %          note: Besides function name, is essentially the same as parseUri as well as our allowing
	  // %          note: an extra slash after the scheme/protocol (to allow file:/// as in PHP)
	  // *     example 1: parse_url('http://username:password@hostname/path?arg=value#anchor');
	  // *     returns 1: {scheme: 'http', host: 'hostname', user: 'username', pass: 'password', path: '/path', query: 'arg=value', fragment: 'anchor'}
	  var query, key = ['source', 'scheme', 'authority', 'userInfo', 'user', 'pass', 'host', 'port',
	            'relative', 'path', 'directory', 'file', 'query', 'fragment'],
	    ini = (this.php_js && this.php_js.ini) || {},
	    mode = (ini['phpjs.parse_url.mode'] &&
	      ini['phpjs.parse_url.mode'].local_value) || 'php',
	    parser = {
	      php: /^(?:([^:\/?#]+):)?(?:\/\/()(?:(?:()(?:([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?()(?:(()(?:(?:[^?#\/]*\/)*)()(?:[^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
	      strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
	      loose: /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/\/?)?((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/ // Added one optional slash to post-scheme to catch file:/// (should restrict this)
	    };

	  var m = parser[mode].exec(str),
	    uri = {},
	    i = 14;
	  while (i--) {
	    if (m[i]) {
	      uri[key[i]] = m[i];
	    }
	  }

	  if (component) {
	    return uri[component.replace('PHP_URL_', '').toLowerCase()];
	  }
	  if (mode !== 'php') {
	    var name = (ini['phpjs.parse_url.queryKey'] &&
	        ini['phpjs.parse_url.queryKey'].local_value) || 'queryKey';
	    parser = /(?:^|&)([^&=]*)=?([^&]*)/g;
	    uri[name] = {};
	    query = uri[key[12]] || '';
	    query.replace(parser, function ($0, $1, $2) {
	      if ($1) {uri[name][$1] = $2;}
	    });
	  }
	  delete uri.source;
	  return uri;
	}

function equalHeight(boxes)
{
	boxes.height('auto');
	var maxHeight = Math.max.apply( Math, boxes.map(function(){ return $(this).height(); }).get());
	boxes.height(maxHeight);
}

function PDFTarget(target)
{
	var doc = $('html').clone();
	var target = $(target).clone();
	var form = $('#PDFTargetForm');
	if (!form.length) {
		//$('body').append('<form id="PDFTargetForm"></form>');
		$('<form id="PDFTargetForm"></form>').appendTo('body');
		form = $('#PDFTargetForm');
	}
	
	form.attr('action', basePath + 'ajax.php?section=pdf');
	form.attr('method', 'POST');
	$('<input type="hidden" name="target" value="" />').appendTo(form);
	
	target.find('.hidden-print').remove();
	doc.find('body').html(target);
	var html = doc.html();
	
	form.find('input').val(html);
	form.submit();
}

function beautify(source)
{
	var output,
		opts = {};

    /*
    opts.indent_size = $('#tabsize').val();
    opts.indent_char = opts.indent_size == 1 ? '\t' : ' ';
    opts.max_preserve_newlines = $('#max-preserve-newlines').val();
    opts.preserve_newlines = opts.max_preserve_newlines !== -1;
    opts.keep_array_indentation = $('#keep-array-indentation').prop('checked');
    opts.break_chained_methods = $('#break-chained-methods').prop('checked');
    opts.indent_scripts = $('#indent-scripts').val();
    opts.brace_style = $('#brace-style').val();
    opts.space_before_conditional = $('#space-before-conditional').prop('checked');
    opts.unescape_strings = $('#unescape-strings').prop('checked');
    opts.wrap_line_length = $('#wrap-line-length').val();
    opts.space_after_anon_function = true;
    */
	
	opts.preserve_newlines = false;

	output = html_beautify(source, opts);
    return output;
}

// generate a random number within a range (PHP's mt_rand JavaScript implementation)
function mt_rand (min, max) 
{
	// http://kevin.vanzonneveld.net
	// +   original by: Onno Marsman
	// +   improved by: Brett Zamir (http://brett-zamir.me)
	// +   input by: Kongo
	// *     example 1: mt_rand(1, 1);
	// *     returns 1: 1
	var argc = arguments.length;
	if (argc === 0) {
		min = 0;
		max = 2147483647;
	}
	else if (argc === 1) {
		throw new Error('Warning: mt_rand() expects exactly 2 parameters, 1 given');
	}
	else {
		min = parseInt(min, 10);
		max = parseInt(max, 10);
	}
	return Math.floor(Math.random() * (max - min + 1)) + min;
}

// scroll to element animation
function scrollTo(id)
{
	if ($(id).length)
		$('html,body').animate({scrollTop: $(id).offset().top},'slow');
}

// handle menu toggle button action
function toggleMenuHidden()
{
	//console.log('toggleMenuHidden');
	if (!$('html.content-transitions').length)
		$('html').addClass('content-transitions');
	
	$('.container-fluid:first').toggleClass('menu-hidden sidebar-hidden-phone');
	
	if (typeof $.cookie != 'undefined')
		$.cookie('menuHidden', $('.container-fluid:first').is('.menu-hidden'));
	
	if (typeof masonryGallery != 'undefined') 
		masonryGallery();
	
	if ($('html.sidebar').length && !$('.container-fluid:first.menu-hidden').length)
		menuSlimScroll();
}

// handle generate sparkline charts
function genSparklines()
{
	if ($('.sparkline').length)
	{
		$.each($('#content .sparkline'), function(k,v)
		{
			var size = { w: 150, h: 28 };
			if ($(this).parent().is('.widget-stats'))
				size = { w: 150, h: 35 }
			
			var color = primaryColor;
			if ($(this).is('.danger')) color = dangerColor;
			if ($(this).is('.success')) color = successColor;
			if ($(this).is('.warning')) color = warningColor;
			if ($(this).is('.inverse')) color = inverseColor;
			
			var data = [[1, 3+randNum()], [2, 5+randNum()], [3, 8+randNum()], [4, 11+randNum()],[5, 14+randNum()],[6, 17+randNum()],[7, 20+randNum()], [8, 15+randNum()], [9, 18+randNum()], [10, 22+randNum()]];
		 	$(v).sparkline(data, 
			{ 
				type: 'bar',
				width: size.w,
				height: size.h,
				stackedBarColor: ["#444", color],
				lineWidth: 2
			});
		});
		$.each($('#menu .sparkline'), function(k,v)
		{
			var size = { w: 150, h: 20 };
			if ($(this).parent().is('.widget-stats-3'))
				size = { w: 150, h: 35 }
			
			var color = primaryColor;
			if ($(this).is('.danger')) color = dangerColor;
			if ($(this).is('.success')) color = successColor;
			if ($(this).is('.warning')) color = warningColor;
			if ($(this).is('.inverse')) color = inverseColor;
			
			var data = [[1, 3+randNum()], [2, 5+randNum()], [3, 8+randNum()], [4, 11+randNum()],[5, 14+randNum()],[6, 17+randNum()],[7, 20+randNum()], [8, 15+randNum()], [9, 18+randNum()], [10, 22+randNum()]];
		 	$(v).sparkline(data, 
			{ 
				type: 'bar',
				width: size.w,
				height: size.h,
				stackedBarColor: ["#dadada", color],
				lineWidth: 2
			});
		});
	}
}

//handle generate easy-pie-charts
function genEasyPie()
{
	if ($('.easy-pie').length && $.fn.easyPieChart)
	{
		$.each($('.easy-pie'), function(k,v)
		{	
			var color = primaryColor;
			if ($(this).is('.danger')) color = dangerColor;
			if ($(this).is('.success')) color = successColor;
			if ($(this).is('.warning')) color = warningColor;
			if ($(this).is('.inverse')) color = inverseColor;
			
			$(v).easyPieChart({
				barColor: color,
				animate: ($('html').is('.ie') ? false : 3000),
                lineWidth: 4,
                size: 50
			});
		});
	}
}

/*
 * Helper function for JQueryUI Sliders Create event
 */
function JQSliderCreate()
{
	$(this)
		.removeClass('ui-corner-all ui-widget-content')
		.wrap('<span class="ui-slider-wrap"></span>')
		.find('.ui-slider-handle')
		.removeClass('ui-corner-all ui-state-default');
}

function menuSlimScroll()
{
	var menu_max_height = parseInt($('#menu .slim-scroll').attr('data-scroll-height'));
	var menu_real_max_height = parseInt($('#wrapper').height());
	var height = menu_real_max_height;
		height -= $('#menu .slim-scroll').offset().top;
	
	if ($('html').is('.sidebar.sticky-sidebar'))
		height -= $('#footer').height();
	else
		height = menu_max_height < menu_real_max_height ? menu_real_max_height : menu_max_height;
	
	//alert(height);
	$('#menu .slim-scroll').slimScroll({
		height: (height) + "px",
		allowPageScroll : true
    });
	
	setTimeout(function(){
		$('#menu .slim-scroll').trigger('mouseenter');
	}, 200);
}

$(function()
{
	
	if (typeof Holder != 'undefined')
	{
		Holder.add_theme("dark", {background:"#424242", foreground:"#aaa", size:9}).run();
		Holder.add_theme("white", {background:"#fff", foreground:"#c9c9c9", size:9}).run();
	}
	
	$('html.sidebar .container-fluid:first').on('swipeleft swiperight', function(e){
		if ($(this).is('.sidebar-hidden-phone') && e.type == 'swiperight')
			return toggleMenuHidden();
		if (!$(this).is('.sidebar-hidden-phone') && e.type == 'swipeleft')
			return toggleMenuHidden();
		
		e.preventDefault();
	});
	$('html.sidebar .container-fluid').on('movestart', function(e) {
		// If the movestart is heading off in an upwards or downwards
		// direction, prevent it so that the browser scrolls normally.
		if ((e.distX > e.distY && e.distX < -e.distY) ||
			(e.distX < e.distY && e.distX > -e.distY)) {
			e.preventDefault();
		}
	});
	
	if (!Modernizr.touch)
	{
		$('html.sidebar.sidebar-hat #menu').on('mouseenter', function(){
			if ($(this).parents('.menu-hidden').length)
				toggleMenuHidden();
		}).on('mouseleave', function(){
			if (!$(this).parents('.menu-hidden').length)
			{
				$(this).find('li.dropdown.open > [data-toggle="dropdown"]').click();
				toggleMenuHidden();
			}
		});
		
		// dropdown menus
		$('html.sidebar.sidebar-dropdown').find('.slim-scroll > ul, > ul').on('mouseenter', '> li.dropdown:not(.open)', function(){
			$(this).find('> [data-toggle="dropdown"]').click();
		});
		
		// collapsible menus
		/*
		$('html.sidebar.sidebar-collapsible').find('.slim-scroll > ul, > ul').on('mouseenter', '> li.hasSubmenu:not(.active)', function(){
			$(this).find('> [data-toggle="collapse"]').click();
		}).on('mouseleave', '> li.hasSubmenu.active', function(){
			$(this).find('> [data-toggle="collapse"]').click();
		});
		*/
		
		// Dropdowns
		$('.navbar.main ul.topnav').on('mouseenter', '> li.dropdown:not(.open)', function(){
			$(this).find('> [data-toggle="dropdown"]').click();
		});
		$('.navbar.main').on('mouseleave', 'li.dropdown.open', function(){
			$(this).find('> [data-toggle="dropdown"]').click();
		});
		
		// Mega menus
		$('.navbar.main ul.topnav').on('mouseenter', '> li.mega-menu:not(.mega-menu-open)', function(){
			$(this).find('> a').click();
		});
		$('.navbar.main').on('mouseleave', 'li.mega-menu.mega-menu-open', function(){
			$('body').click();
		});
	}
	
	// Sidebar menu collapsibles
	if ($('html.sidebar-collapsible').length)
	{
		$('#menu .collapse').on('show', function(e)
		{
			e.stopPropagation();
			$(this).parents('.hasSubmenu:first').addClass('active');
			
			if ($('html.sidebar-collapsible .container-fluid:first').is('.menu-hidden'))
				toggleMenuHidden();
		})
		.on('hidden', function(e)
		{
			e.stopPropagation();
			$(this).parents('.hasSubmenu:first').removeClass('active');
		});
	}
	
	// main menu visibility toggle
	$('.navbar.main .btn-navbar, #menu .btn-navbar').click(function()
	{
		var disabled = typeof toggleMenuButtonWhileTourOpen != 'undefined' ? toggleMenuButtonWhileTourOpen(true) : false;
		if (!disabled)
			toggleMenuHidden();
	});
	
	// multi-level top menu
	$('.submenu').hover(function()
	{
        $(this).children('ul').removeClass('submenu-hide').addClass('submenu-show');
    }, function()
    {
    	$(this).children('ul').removeClass('.submenu-show').addClass('submenu-hide');
    });
    //.find("a:first").append(" &raquo; ");
	
	// not on touch devices
	if (!Modernizr.touch)
	{
		// tooltips
		$('body').tooltip({ selector: '[data-toggle="tooltip"]' });
		
		// popovers
		$('[data-toggle="popover"]').popover();
	}
	
	// save to PDF
	$('[data-toggle*="pdf"]').on('click', function(e){
		e.preventDefault();
		PDFTarget($(this).attr('data-target'));
	});
	
	// prettyphoto
	if ($('[data-toggle="prettyPhoto"]').length) 
		$('[data-toggle="prettyPhoto"]').prettyPhoto();
	
	// loading state for buttons
	$('[data-toggle*="btn-loading"]').click(function () {
        var btn = $(this);
        btn.button('loading');
        setTimeout(function () {
        	btn.button('reset')
        }, 3000);
    });
	$('[data-toggle*="button-loading"]').click(function () {
        var btn = $(this);
        btn.button('loading');
    });
	
	// typeahead
	if ($('[data-toggle="typeahead"]').length)
		$('[data-toggle="typeahead"]').typeahead({
			source: ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"],
			items: 4
		});
	
	// print
	$('[data-toggle="print"]').click(function(e)
	{
		e.preventDefault();
		window.print();
	});
	
	// carousels
	$('.carousel').carousel();
	
	// employees widget
	$('.widget-employees').each(function(){
		if (typeof $.fn.select2 != 'undefined') 
			$(this).find('select').select2();
		
		equalHeight($(this).find('.row-merge > [class*="span"]'));
		$(this).on('click', '.listWrapper li:not(.active)', function()
		{
			var p = $(this).parents('.widget-employees:first');
			p.find('.listWrapper li').removeClass('active');
			$(this).addClass('active');
			p.find('.ajax-loading').stop().fadeIn(1000, function(){
				setTimeout(function(){ p.find('.ajax-loading').fadeOut(); }, 1000);
			});
		});
	});
	
	// gridalicious
	$('[data-toggle*="gridalicious"]').each(function(){
		var $that = $(this);
		$(this).gridalicious({
			gutter: $that.attr('data-gridalicious-gutter') || 13, 
			width: $that.attr('data-gridalicious-width') ? parseInt($that.attr('data-gridalicious-width')) : 200,
			animate: true,
			selector: '.widget'
		}).removeClass('hide');
	});
	
	// collapsible widgets
	$('.widget[data-toggle="collapse-widget"] .widget-body')
		.on('show', function(){
			$(this).parents('.widget:first').attr('data-collapse-closed', "false");
		})
		.on('shown', function(){
			setTimeout(function(){ $(window).resize(); }, 500);
		})
		.on('hidden', function(){
			$(this).parents('.widget:first').attr('data-collapse-closed', "true");
		});
	
	$('.widget[data-toggle="collapse-widget"]').each(function()
	{
		// append toggle button
		//$(this).find('.widget-head').append('<span class="collapse-toggle"></span>');
		$('<span class="collapse-toggle"></span>').appendTo($(this).find('.widget-head'));
		
		// make the widget body collapsible
		$(this).find('.widget-body').addClass('collapse');
		
		// verify if the widget should be opened
		if ($(this).attr('data-collapse-closed') !== "true")
			$(this).find('.widget-body').addClass('in');
		
		// bind the toggle button
		$(this).find('.collapse-toggle').on('click', function(){
			$(this).parents('.widget:first').find('.widget-body').collapse('toggle');
		});
	});
	
	// generate sparkline charts
	genSparklines();
	
	// generate easy-pie-charts
	genEasyPie();
	
	// Google Code Prettify
	if ($('.prettyprint').length)
		prettyPrint();
	
	// bind window resize event
	$(window).resize(function()
	{
		if ($('.widget-employees').length)
			equalHeight($('.widget-employees').find('.row-merge > [class*="span"]'));
	});
	
	// trigger window resize event
	$(window).on('load', function(){
		$(this).resize();
	});
	
	// view source toggle buttons
	$('.btn-source-toggle').click(function(e){
		e.preventDefault();
		$('.code:not(.show)').toggleClass('hide');
	});
	
	// source-code widgets
	$('[data-toggle="source-code"]').each(function(){
		var button = $('<span data-toggle="source-code-toggle" class="hidden-phone btn btn-toggle-code btn-mini btn-primary btn-icon glyphicons embed_close"><i></i> Source</span>');
		if ($(this).attr('data-placement') == 'outside') button.addClass('outside');
		//$(this).append(button);
		button.appendTo($(this));
		$(this).css('overflow', 'visible');
	}).on('click', '[data-toggle="source-code-toggle"]', function(){
		var html = $(this).parent().clone();
			html.find('[data-toggle="source-code-toggle"]').remove();
			html = beautify(html.html());
			html = $('<pre class="prettyprint"></pre>').text(html);
		
		bootbox.alert(html);
		
		if ($('.prettyprint').length)
			prettyPrint();
	});
	
	// reset themer
	$('[data-toggle="reset-themer"]').click(function(e){
		e.preventDefault();
		if (typeof updateTheme != 'undefined') {
			updateTheme(0);
		}
		location = $(this).attr('href');
	});
	
	// show/hide toggle buttons
	$('[data-toggle="hide"]').click(function()
	{
		if ($(this).is('.bootboxTarget'))
			bootbox.alert($($(this).attr('data-target')).html());
		else {
			$($(this).attr('data-target')).toggleClass('hide');
			if ($(this).is('.scrollTarget') && !$($(this).attr('data-target')).is('.hide'))
				scrollTo($(this).attr('data-target'));
		}
	});
	
	// handle persistent menu position on page load
	if (typeof $.cookie != 'undefined' && $.cookie('rightMenu') && $('#toggle-menu-position').length)
	{
		$('#toggle-menu-position').prop('checked', true);
		$('.container-fluid:first').not('.menu-right').removeClass('menu-left').addClass('menu-right');
	}
	
	// handle persistent layout type on page load
	if (typeof $.cookie != 'undefined' && $.cookie('layoutFixed') && $('#toggle-layout').length)
	{
		$('#toggle-layout').prop('checked', true);
		$('.container-fluid:first').addClass('fixed');
	}
	else if (!$('.container-fluid:first').is('.fixed') || (typeof $.cookie != 'undefined' && $.cookie('layoutFluid')))
	{
		$('#toggle-layout').prop('checked', false);
		$('.container-fluid:first').removeClass('fixed');
	}
	
	/* Slim Scroll Widgets */
	$('.widget-scroll').each(function(){
		$(this).find('.widget-body > div').slimScroll({
			height: $(this).attr('data-scroll-height')
	    });
	});
	
	/* Other non-widget Slim Scroll areas */
	$('#content .slim-scroll').each(function(){
		var scrollSize = $(this).attr('data-scroll-size') ? $(this).attr('data-scroll-size') : "7px";
		$(this).slimScroll({
			height: $(this).attr('data-scroll-height'),
			allowPageScroll : false,
			railVisible: false,
			size: '0',
			railDraggable: ($.fn.draggable ? true : false)
	    });
	});

	/* wysihtml5 */
	if ($('textarea.wysihtml5').size() > 0)
		$('textarea.wysihtml5').wysihtml5();
	
	/*
	 * Boostrap Extended
	 */
	// custom select for Boostrap using dropdowns
	if ($('.selectpicker').length) $('.selectpicker').selectpicker();
	
	// bootstrap-toggle-buttons
	if ($('.toggle-button').length) $('.toggle-button').toggleButtons();
	
	/*
	 * UniformJS: Sexy form elements
	 */
	if ($('.uniformjs').length) $('.uniformjs').find("select, input, button, textarea").uniform();
	
	// colorpicker
	if ($('#colorpicker').length) $('#colorpicker').farbtastic('#colorpickerColor');
	
	// datepicker
	if ($('#datepicker').length) $("#datepicker").datepicker({ showOtherMonths:true });
	if ($('#datepicker-inline').length) $('#datepicker-inline').datepicker({ inline: true, showOtherMonths:true });
	
	// daterange
	if ($('#dateRangeFrom').length && $('#dateRangeTo').length)
	{
		$( "#dateRangeFrom" ).datepicker({
			defaultDate: "+1w",
			changeMonth: false,
			numberOfMonths: 2,
			onClose: function( selectedDate ) {
				$( "#dateRangeTo" ).datepicker( "option", "minDate", selectedDate );
			}
		}).datepicker( "option", "maxDate", $('#dateRangeTo').val() );

		$( "#dateRangeTo" ).datepicker({
			defaultDate: "+1w",
			changeMonth: false,
			numberOfMonths: 2,
			onClose: function( selectedDate ) {
				$( "#dateRangeFrom" ).datepicker( "option", "maxDate", selectedDate );
			}
		}).datepicker( "option", "minDate", $('#dateRangeFrom').val() );
	}
	
	/* Table select / checkboxes utility */
	$('.checkboxs thead :checkbox').change(function(){
		if ($(this).is(':checked'))
		{
			$('.checkboxs tbody :checkbox').prop('checked', true).parent().addClass('checked');
			$('.checkboxs tbody tr.selectable').addClass('selected');
			$('.checkboxs_actions').show();
		}
		else
		{
			$('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
			$('.checkboxs tbody tr.selectable').removeClass('selected');
			$('.checkboxs_actions').hide();
		}
	});
	
	$('.checkboxs tbody').on('click', 'tr.selectable', function(e){
		var c = $(this).find(':checkbox');
		var s = $(e.srcElement);
		
		if (e.srcElement.nodeName == 'INPUT')
		{
			if (c.is(':checked'))
				$(this).addClass('selected');
			else
				$(this).removeClass('selected');
		}
		else if (e.srcElement.nodeName != 'TD' && e.srcElement.nodeName != 'TR' && e.srcElement.nodeName != 'DIV')
		{
			return true;
		}
		else
		{
			if (c.is(':checked'))
			{
				c.prop('checked', false).parent().removeClass('checked');
				$(this).removeClass('selected');
			}
			else
			{
				c.prop('checked', true).parent().addClass('checked');
				$(this).addClass('selected');
			}
		}
		if ($('.checkboxs tr.selectable :checked').size() == $('.checkboxs tr.selectable :checkbox').size())
			$('.checkboxs thead :checkbox').prop('checked', true).parent().addClass('checked');
		else
			$('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');

		if ($('.checkboxs tr.selectable :checked').size() >= 1)
			$('.checkboxs_actions').show();
		else
			$('.checkboxs_actions').hide();
	});
	
	if ($('.checkboxs tbody :checked').size() == $('.checkboxs tbody :checkbox').size() && $('.checkboxs tbody :checked').length)
		$('.checkboxs thead :checkbox').prop('checked', true).parent().addClass('checked');
	
	if ($('.checkboxs tbody :checked').length)
		$('.checkboxs_actions').show();
	
	$('.radioboxs tbody tr.selectable').click(function(e){
		var c = $(this).find(':radio');
		if (e.srcElement.nodeName == 'INPUT')
		{
			if (c.is(':checked'))
				$(this).addClass('selected');
			else
				$(this).removeClass('selected');
		}
		else if (e.srcElement.nodeName != 'TD' && e.srcElement.nodeName != 'TR')
		{
			return true;
		}
		else
		{
			if (c.is(':checked'))
			{
				c.attr('checked', false);
				$(this).removeClass('selected');				
			}
			else
			{
				c.attr('checked', true);
				$('.radioboxs tbody tr.selectable').removeClass('selected');
				$(this).addClass('selected');
			}
		}
	});
	
	// sortable tables
	if ($( ".js-table-sortable" ).length)
	{	
		$( ".js-table-sortable" ).sortable(
		{
			placeholder: "ui-state-highlight",
			items: "tbody tr",
			handle: ".js-sortable-handle",
			forcePlaceholderSize: true,
			helper: function(e, ui) 
			{
				ui.children().each(function() {
					$(this).width($(this).width());
				});
				return ui;
			},
			start: function(event, ui) 
			{
				if (typeof mainYScroller != 'undefined') mainYScroller.disable();
				ui.placeholder.html('<td colspan="' + $(this).find('tbody tr:first td').size() + '">&nbsp;</td>');
			},
		    stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); }
		});
	}
});