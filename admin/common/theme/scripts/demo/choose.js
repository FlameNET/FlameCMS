/* ==========================================================
 * FLAT KIT v1.2.0
 * choose.js
 * 
 * http://www.mosaicpro.biz
 * Copyright MosaicPro
 *
 * Built exclusively for sale @Envato Marketplaces
 * ========================================================== */ 

$(function()
{
	var url_default = [];
		url_default['admin'] = $('#choose-preview .options[data-for="admin"] .actions a').attr('href');
		url_default['front'] = $('#choose-preview .options[data-for="front"] .actions a').attr('href');
	
	$('#choose-preview')
		.find('.options select')
		.on('change', function()
		{
			var box = $(this).parents('.box:first');
			var $for = $(this).attr('data-for');
			var select_layout = box.find('select[data-type="layout"]');
			var select_sidebar = box.find('select[data-type="sidebar"]');
			var select_sidebar_position = box.find('select[data-type="menu"]');
			var select_sidebar_sticky = box.find('select[data-type="sidebar-sticky"]');
			var select_top_sticky = box.find('select[data-type="top-sticky"]');
			var select_rtl = box.find('select[data-type="rtl"]');
			var select_style = box.find('select[data-type="style"]');
			var select_top_style = box.find('select[data-type="top-style"]');
			var select_sidebar_style = box.find('select[data-type="sidebar-style"]');
			var select_sidebar_type = box.find('select[data-type="sidebar-type"]');
			var select_skin = box.find('select[data-type="skin"]');
			var select_ajax = box.find('select[data-type="ajax"]');
			var select_animations = box.find('select[data-type="animations"]');
			var select_menuh_position = box.find('select[data-type="menuh-position"]');
			var select_sidebar_width = box.find('select[data-type="sidebar-width"]');
			var select_sidebar_hat = box.find('select[data-type="sidebar-hat"]');
			
			var url = url_default[$for];
			
			if (select_layout.length)
				url += '&layout_type=' + select_layout.val();
			if (select_sidebar.length)
				url += '&sidebar=' + select_sidebar.val();
			if (select_sidebar_position.length)
				url += '&menu_position=' + select_sidebar_position.val();
			if (select_sidebar_sticky.length) 
				url += '&sidebar-sticky=' + select_sidebar_sticky.val();
			if (select_top_sticky.length) 
				url += '&top-sticky=' + select_top_sticky.val();
			if (select_rtl.length) 
				url += '&rtl=' + select_rtl.val();
			if (select_style.length) 
				url += '&style=' + select_style.val();
			if (select_top_style.length) 
				url += '&top_style=' + select_top_style.val();
			if (select_sidebar_style.length) 
				url += '&sidebar_style=' + select_sidebar_style.val();
			if (select_sidebar_type.length) 
				url += '&sidebar_type=' + select_sidebar_type.val();
			if (select_skin.length) 
				url += '&skin_custom=' + select_skin.val();
			if (select_ajax.length) 
				url += '&ajaxify=' + select_ajax.val();
			if (select_animations.length) 
				url += '&animations=' + select_animations.val();
			if (select_menuh_position.length) 
				url += '&menuh_position=' + select_menuh_position.val();
			if (select_sidebar_width.length) 
				url += '&sidebar_width=' + select_sidebar_width.val();
			if (select_sidebar_hat.length) 
				url += '&sidebar_hat=' + select_sidebar_hat.val();
			
			$('#choose-preview .options[data-for="'+$for+'"] .actions a').attr('href', url);
		});
});