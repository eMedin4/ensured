
function initialize() {


	var marker, i;
	var icon = 'http://localhost/ensured/public/assets/images/def2.png';
    var center = {lat: 41.38506, lng: 2.17340};

	var map = new google.maps.Map(document.getElementById('map'), {
		center: center,
		zoom: 12,
		styles: style
	});

    /*
        PAGINA MAIN
    */

    if($('body').is('.mainpage')) {

	var infobox = new InfoBox({
        alignBottom: true,
        boxStyle: {
            width: "160px" },
        pixelOffset: new google.maps.Size(-80, -10),
        closeBoxURL: ""
    });

  	for (i = 0; i < testObj.per_page; i++) {

		console.log(testObj.data[i].lat);

		marker = new google.maps.Marker({
			position: new google.maps.LatLng(testObj.data[i].lat, testObj.data[i].lng),
			map: map,
			icon: icon,
			title: testObj.data[i].title
		});

		google.maps.event.addListener(map, 'click', function(){
            infobox.close();
        });

        var infoboxHtml = "<div class='infobox-content'>" + 
        	testObj.data[i].title + 
        	"</div><div class='infobox-link tright'><a href='#'>Leer mas</a></div>";

        google.maps.event.addListener(marker, 'click', (function(marker,infobox) {
            return function() {
                infobox.setContent(infoboxHtml);
                infobox.open(map, marker);
            };
        })(marker,infobox));

	}

    }

    /*
        PAGINA SINGLE
    */

    if($('body').is('.singlepage')) {

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(testObj.lat, testObj.lng),
            map: map,
            icon: icon,
            title: testObj.title
        });

    }

    /*
        PAGINA CREATE
    */

    if($('body').is('.createpage')) {

        if($('#latitude').val() && $('#longitude').val()) {
            var lat = parseFloat($('#latitude').val());
            var lng = parseFloat($('#longitude').val());
            var center = {lat: lat, lng: lng};
        }
        

        var marker = new google.maps.Marker({
            position: center,
            draggable: true,
            map: map,
            icon: icon
        });

        google.maps.event.addListener(marker, 'dragend', function (event) {
            document.getElementById("latitude").value = this.getPosition().lat();
            document.getElementById("longitude").value = this.getPosition().lng();
        });

        map.setCenter(marker.getPosition());

    }

}

var style = [
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "lightness": "100"
            },
            {
                "saturation": "-6"
            },
            {
                "gamma": "10.00"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#e6d2b3"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#53a0e6"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    }
];

google.maps.event.addDomListener(window, "load", initialize);