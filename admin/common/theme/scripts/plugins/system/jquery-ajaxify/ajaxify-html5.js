// Ajaxify
// v1.0.1 - 30 September, 2012
// https://github.com/browserstate/ajaxify
(function(window,undefined){
	
	// Prepare our Variables
	var
		History = window.History,
		$ = window.jQuery,
		document = window.document,
		$scripts_reload = [
       		"calendar.js",
       		"charts.js",
       		"choose.js",
       		"common.js",
       		"contact.js",
       		"file_managers.js",
       		"finances.js",
            "form_elements.js",
            "form_validator.js",
            "form_wizards.js",
            "front_index_revolutionslider.js",
            "google_analytics.js",
            "image_crop.js",
            "index.js",
            "infinite_scroll.js",
            "maps_google.js",
            "maps_vector.js",
            "modals.js",
            "notifications.js",
            "sliders.js",
            "tables_responsive.js",
            "tables.js",
            "themer.js",
            "tour_demo.js",
            "twitter.js",
            "ui.js",
            "widgets.js",
            'megamenu.js',
            "jsapi", // google API loader
            "js" // google API loader
        ];

	// Check to see if History.js is enabled for our Browser
	if ( !History.enabled ) {
		return false;
	}

	// Wait for Document
	$(function(){
		// Prepare Variables
		var
			/* Application Specific Variables */
			contentSelector = '#content',
			$content = $(contentSelector).filter(':first'),
			contentNode = $content.get(0),
			$menu = $('#menu, .navbar.main'),
			activeClass = 'active',
			activeSelector = '.active',
			menuChildrenSelector = 'li',
			completedEventName = 'statechangecomplete',
			
			/* Application Generic Variables */
			$window = $(window),
			$body = $(document.body),
			rootUrl = History.getRootUrl(),
			scrollOptions = {
				duration: 800,
				easing:'swing'
			};
		
		// Ensure Content
		if ( $content.length === 0 ) {
			$content = $body;
		}
		
		// Internal Helper
		$.expr[':'].internal = function(obj, index, meta, stack){
			// Prepare
			var
				$this = $(obj),
				url = $this.attr('href')||'',
				isInternalLink;
			
			// Check link
			isInternalLink = url.substring(0,rootUrl.length) === rootUrl || url.indexOf(':') === -1;
			
			// Ignore or Keep
			return isInternalLink;
		};
		
		// HTML Helper
		var documentHtml = function(html){
			// Prepare
			var result = String(html)
				.replace(/<\!DOCTYPE[^>]*>/i, '')
				.replace(/<(html|head|body|title|meta|script)([\s\>])/gi,'<div class="document-$1"$2')
				.replace(/<\/(html|head|body|title|meta|script)\>/gi,'</div>')
			;
			
			// Return
			return $.trim(result);
		};
		
		// Ajaxify Helper
		$.fn.ajaxify = function(){
			// Prepare
			var $this = $(this);
			
			// Ajaxify
			$this.find('a:not(.no-ajaxify,[data-toggle],[data-slide])').click(function(event){
				// Prepare
				var
					$this = $(this),
					url = $this.attr('href'),
					title = $this.attr('title')||null;
				
				// Continue as normal for cmd clicks etc
				if ( event.which == 2 || event.metaKey ) { return true; }
				
				// Ajaxify this link
				History.pushState(null,title,url);
				event.preventDefault();
				return false;
			});
			
			// Chain
			return $this;
		};
		
		// Ajaxify our Internal Links
		$body.ajaxify();
		
		// Hook into State Changes
		$window.bind('statechange',function(){
			// Prepare Variables
			var
				State = History.getState(),
				url = State.url,
				relativeUrl = url.replace(rootUrl,'');

			// Set Loading
			$body.addClass('loading');

			// Start Fade Out
			// Animating to opacity to 0 still keeps the element's height intact
			// Which prevents that annoying pop bang issue when loading in new content
			$content.animate({opacity:0},800);
			
			// Ajax Request the Traditional Page
			$.ajax({
				url: url,
				success: function(data, textStatus, jqXHR){
					// Prepare
					var
						$data = $(documentHtml(data)),
						$dataBody = $data.find('.document-body:first'),
						$dataHead = $data.find('.document-head:first'),
						$dataContent = $dataBody.find(contentSelector).filter(':first'),
						$menuChildren, contentHtml, $scripts, $styles;
					
					// Fetch the scripts
					$scripts = $dataBody.find('.document-script');
					if ($scripts.length)
						$scripts.detach();
					
					// Fetch the styles
					$styles = $dataBody.find('.document-style, style');
					if ($styles.length)
						$styles.detach();
					
					// Fetch the stylesheets
					$links = $dataHead.find('link[rel="stylesheet"]');
					if ($links.length)
						$links.detach();
					
					// Fetch the content
					contentHtml = $dataContent.html()||$data.html();
					if ( !contentHtml ) {
						document.location.href = url;
						return false;
					}
					
					var pu_path = parse_url(relativeUrl).path;
					var pu_path_split = pu_path.split("/");
					var pu_url = pu_path_split[pu_path_split.length - 1];
					
					// Update the menu
					$menu.each(function(){
						$menuChildren = $(this).find(menuChildrenSelector);
						$menuChildren.filter(activeSelector).removeClass(activeClass);
						$menuChildren = $menuChildren.find('a[href^="'+pu_url+'"]');
						$menuChildren.parents('li').addClass(activeClass);
					});

					// Update the content
					$content.stop(true,true);
					$content.html(contentHtml).ajaxify().css('opacity',100).fadeIn(); /* you could fade in here if you'd like */

					// Update the title
					document.title = $data.find('.document-title:first').text();
					try {
						document.getElementsByTagName('title')[0].innerHTML = document.title.replace('<','&lt;').replace('>','&gt;').replace(' & ',' &amp; ');
					}
					catch ( Exception ) { }
					
					// remove inline scripts
					$('script').filter(':not([src])').remove();
					
					// remove inline styles
					$('style').remove();
					
					// Add the scripts
					$scripts.each(function()
					{
						var src_path = parse_url($(this).attr('src')).path;
						var src_path_parts = src_path.split("/");
						var src_file = src_path_parts[src_path_parts.length - 1];
						var reload = $.inArray(src_file, $scripts_reload) != -1;
						
						if ($(this).attr('src') && ($('[src="' + $(this).attr('src') + '"]').length || $('[src*="' + src_file + '"]').length) && !reload)
							return true;
						
						var $script = $(this), scriptText = $script.text(), scriptNode = document.createElement('script');
						if ( $script.attr('src') ) {
							if ( !$script[0].async ) { scriptNode.async = false; }
							scriptNode.src = $script.attr('src');
						}
						scriptNode.appendChild(document.createTextNode(scriptText));
						$('head').get(0).appendChild(scriptNode);
					});
					
					// Add the styles
					$styles.each(function()
					{
						var $style = $(this), styleText = $style.text(), styleNode = document.createElement('style');
						styleNode.appendChild(document.createTextNode(styleText));
						$('head').get(0).appendChild(styleNode);
					});
					
					// Add the stylesheets
					$links.each(function()
					{
						if ($(this).attr('href') && $('[href="' + $(this).attr('href') + '"]').length)
							return true;
						
						var $link = $(this), linkText = $link.text(), linkNode = document.createElement('link');
						if ( $link.attr('href') ) {
							linkNode.href = $link.attr('href');
						}
						if ( $link.attr('rel') ) {
							linkNode.rel = $link.attr('rel');
						}
						if ( $link.attr('href') ) {
							linkNode.href = $link.attr('href');
						}
						linkNode.appendChild(document.createTextNode(linkText));
						$('head').get(0).appendChild(linkNode);
					});

					// Complete the change
					if ( $body.ScrollTo||false ) { $body.ScrollTo(scrollOptions); } /* http://balupton.com/projects/jquery-scrollto */
					$body.removeClass('loading');
					$window.trigger(completedEventName);
	
					// Inform Google Analytics of the change
					if ( typeof window._gaq !== 'undefined' ) {
						window._gaq.push(['_trackPageview', relativeUrl]);
					}

					// Inform ReInvigorate of a state change
					if ( typeof window.reinvigorate !== 'undefined' && typeof window.reinvigorate.ajax_track !== 'undefined' ) {
						reinvigorate.ajax_track(url);
						// ^ we use the full url here as that is what reinvigorate supports
					}
				},
				error: function(jqXHR, textStatus, errorThrown){
					document.location.href = url;
					return false;
				}
			}); // end ajax

		}); // end onStateChange

	}); // end onDomLoad

})(window); // end closure
