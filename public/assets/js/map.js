
function initialize() {


	var marker, i;
    var icon = $('.map-wrap').data('marker');
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
            width: "300px" },
        pixelOffset: new google.maps.Size(-150, -10),
        closeBoxURL: ""
    });

    console.log(toJs);


  	for (i = 0; i < toJs.per_page; i++) {

		marker = new google.maps.Marker({
			position: new google.maps.LatLng(toJs.data[i].lat, toJs.data[i].lng),
			map: map,
			icon: icon,
			title: toJs.data[i].title
		});

		google.maps.event.addListener(map, 'click', function(){
            infobox.close();
        });

        var content = toJs.data[i].content;
        content = content.substr(0, 300);

        var id = toJs.data[i].id;
        var link = $('.mainarticle[data-id=' + id + ']').data('link');

        var infoboxHtml = "<div class='h1-mini pb5'>" + 
            "<span class='infobox-count'>" + toJs.data[i].num_votes + "</span><a href=" + link + ">" +
        	toJs.data[i].title + "</a></div><div class='size16'>" + content + 
        	"</div><div class='infobox-link tright'><a href=" + link + ">Entrar</a></div>";

        google.maps.event.addListener(marker, 'click', (function(marker,infoboxHtml) {
            return function() {
                infobox.setContent(infoboxHtml);
                infobox.open(map, marker);
            };
        })(marker,infoboxHtml));

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

        map.setCenter(marker.getPosition());
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