/* ==========================================================
 * FLAT KIT v1.2.0
 * contact.js
 * 
 * http://www.mosaicpro.biz
 * Copyright MosaicPro
 *
 * Built exclusively for sale @Envato Marketplaces
 * ========================================================== */ 

/* Google Maps API */

var map_options,
	map_latlng,
	markerIconDefault_image,
	markerIconDefault_shadow,
	markerIconDefault_shape;

$(function(){
	if (typeof google.maps.Map != 'undefined')
	{
		initializeMaps();
	}
});

function initializeMaps()
{
	map_latlng = new google.maps.LatLng(47.06285,21.943721);
	map_options = {
			zoom: 1,
			center: map_latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			panControl: false,
			zoomControl: false,
			scaleControl: false,
			mapTypeControl: false,
			disableDefaultUI: true,
			scrollwheel: false,
			styles: [{
				stylers: [{ 
					saturation: -20
				}, { 
					hue: themerPrimaryColor 
				}]
			}, {
				elementType: "labels.text.fill",
				stylers: [{ color: "#444444" }]
			    //stylers: [{ color: primaryColor }]
			}]
	};

	markerIconDefault_image = new google.maps.MarkerImage(commonPath + "theme/images/marker.png",
			// This marker is 44 pixels wide by 56 pixels tall.
			new google.maps.Size(44, 56),
			// The origin for this image is 0,0.
			new google.maps.Point(0, 0),
			// The anchor for this image is the base of the flagpole at 0,32.
			new google.maps.Point(22, 56));

	markerIconDefault_shadow = new google.maps.MarkerImage(commonPath + "theme/images/marker_shadow.png",
			// This marker is 44 pixels wide by 56 pixels tall.
			new google.maps.Size(37, 21),
			// The origin for this image is 0,0.
			new google.maps.Point(0,0),
			// The anchor for this image is the base of the flagpole at 0,32.
			new google.maps.Point(20, 10));

	markerIconDefault_shape = {
			coord: [1, 1, 1, 52, 42, 52, 42 , 1],
			type: 'poly'
	};
	
	// Contact Page Google Maps
    if ($('#contact_gmap').size() > 0 && typeof google.maps.Map != 'undefined')
    {
    	map_options.zoom = 13;
    	initializeMap('contact_gmap', map_options);
    }
}

function initializeMap(el, options)
{
	if (typeof google == 'undefined') 
		return false;

	var map = new google.maps.Map(document.getElementById(el), options);
	var marker = new google.maps.Marker({
		position: map_latlng,
		title: 'My Location',
		shadow: markerIconDefault_shadow,
		icon: markerIconDefault_image,
		map: map
	});
}