function initMap() {
	var uluru = {lat: Number(metaVars.gMapLat), lng: Number(metaVars.gMapLng)};
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: Number(metaVars.gMapZoom),
		center: new google.maps.LatLng(Number(metaVars.gMapLat), Number(metaVars.gMapLng)),
		draggable: false,
		zoomControl: false,
		scaleControl: false,
		scrollwheel: false,
		disableDoubleClickZoom: true,
		disableDefaultUI: true,
		mapTypeControl: true,
		styles: [
		{
			"featureType": "all",
			"elementType": "labels.text.fill",
			"stylers": [
			{
				"saturation": 36
			},
			{
				"color": "#000000"
			},
			{
				"lightness": 40
			}
			]
		},
		{
			"featureType": "all",
			"elementType": "labels.text.stroke",
			"stylers": [
			{
				"visibility": "on"
			},
			{
				"color": "#000000"
			},
			{
				"lightness": 16
			}
			]
		},
		{
			"featureType": "all",
			"elementType": "labels.icon",
			"stylers": [
			{
				"visibility": "off"
			}
			]
		},
		{
			"featureType": "administrative",
			"elementType": "geometry.fill",
			"stylers": [
			{
				"color": "#000000"
			},
			{
				"lightness": 20
			}
			]
		},
		{
			"featureType": "administrative",
			"elementType": "geometry.stroke",
			"stylers": [
			{
				"color": "#000000"
			},
			{
				"lightness": 17
			},
			{
				"weight": 1.2
			}
			]
		},
		{
			"featureType": "landscape",
			"elementType": "geometry",
			"stylers": [
			{
				"color": "#000000"
			},
			{
				"lightness": 20
			}
			]
		},
		{
			"featureType": "poi",
			"elementType": "geometry",
			"stylers": [
			{
				"color": "#000000"
			},
			{
				"lightness": 21
			}
			]
		},
		{
			"featureType": "road.highway",
			"elementType": "geometry.fill",
			"stylers": [
			{
				"color": "#000000"
			},
			{
				"lightness": 17
			}
			]
		},
		{
			"featureType": "road.highway",
			"elementType": "geometry.stroke",
			"stylers": [
			{
				"color": "#000000"
			},
			{
				"lightness": 29
			},
			{
				"weight": 0.2
			}
			]
		},
		{
			"featureType": "road.arterial",
			"elementType": "geometry",
			"stylers": [
			{
				"color": "#000000"
			},
			{
				"lightness": 18
			}
			]
		},
		{
			"featureType": "road.local",
			"elementType": "geometry",
			"stylers": [
			{
				"color": "#000000"
			},
			{
				"lightness": 16
			}
			]
		},
		{
			"featureType": "transit",
			"elementType": "geometry",
			"stylers": [
			{
				"color": "#000000"
			},
			{
				"lightness": 19
			}
			]
		},
		{
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [
			{
				"color": "#000000"
			},
			{
				"lightness": 17
			}
			]
		}
		]
	});

	var marker = new google.maps.Marker({
		position: uluru,
		map: map,
        icon: {
            url: metaVars.gMapMarkerIcon,
            size: new google.maps.Size(30, 40),
		}
	});

	google.maps.event.addDomListener(window, 'resize', function() {
		var center = map.getCenter();
		google.maps.event.trigger(map, "resize");
		map.setCenter(center);
	})

}
