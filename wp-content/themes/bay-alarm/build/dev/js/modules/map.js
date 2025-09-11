(function($) {
var gmarkers = [],
   $ = jQuery;

// array for markers to be added
// title, latitude, longitude, category, custom icon path
var markers = [
 // marker
 // ['<p>36 Railway Avenue Campbell, CA 95008</p>', 37.2864949,-121.9418854, window.location.origin + '/wp-content/themes/float-station/build/img/logo.png'],
];

function mapsInit() {
 // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
 var mapOptions = {
   // How zoomed in you want the map to start at (always required)
   zoom: 17,

   // coordinates for centering map
   center: new google.maps.LatLng(37.2864949,-121.9418854),

   // hiding overlay elements
   mapTypeControl: false,
   scaleControl: false,
   streetViewControl: false,
   rotateControl: false,
   fullscreenControl: false,

   // showing zoom controls
   zoomControl: true,

   // prevent maps container from scrolljacking
   scrollwheel: false,

   // Custom map styles
   styles: [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e7e7e7"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
]
 };

 // element to contain the map
 var mapElement = document.getElementById('g-map');

 // Create the Google Map using our element and options defined above
 map = new google.maps.Map(mapElement, mapOptions);

 infoWindow = new google.maps.InfoWindow({
   content: '',
 });

 // hide infoWindow close x
 google.maps.event.addListener(infoWindow, 'domready', function() {
   $('.gm-style-iw').next('div').hide();
 });

 // add markers
 for (i = 0; i < markers.length; i++) {
   addMarker(markers[i]);
 }
}

// function addMarker(marker) {
//   var content = marker[0],
//     pos = new google.maps.LatLng(marker[1], marker[2]),
//     imgpath = marker[3];

//   mapMarker = new google.maps.Marker({
//     position: pos,
//     icon: '/wp-content/themes/float-station/build/img/location/placard-ns.png',
//     map: map
//   });

//   // add new markers into array inheriting Marker obj methods
//   gmarkers.push(mapMarker);


//   // var boxContent = '<div class="gmap-box" style="margin-bottom: 5px; width: 160px; height: 115px;"><img style="width:50px; height:50px;" src="' +imgpath+ '"></div><div class="gmap-box-copy">' +content + '</div>';

//   infoWindow.setContent(boxContent);
//   infoWindow.open(map, mapMarker);
// }

// When the window has finished loading create our google map below
function callGMaps() {
  var mapWrap = $('#g-map');
  if (mapWrap.length) {
   google.maps.event.addDomListener(window, 'load', mapsInit);
  }
}

}(jQuery));
