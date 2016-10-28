// SOME VARIABLES WE WILL NEED
// SOME VARIABLES WE WILL NEED
var directionDisplay;
var directionsService = new google.maps.DirectionsService();

function initialize() {
	
	var locations = [
		["Highland House Apartments", 38.963716, -77.087405,"5480 Wisconsin Avenue","Chevy Chase, MD 20815"]
	]
	
	var center = new google.maps.LatLng(38.963716, -77.087405);
	// WE'LL NEED THIS IN A BIT
	var markers = [];
	
	directionsDisplay = new google.maps.DirectionsRenderer();
	
	// SET OUR MAP OPTIONS
	var myOptions = {
		
		/********** ADD AND REMOVE SOME DEFAULT MAP CONTROLS **********/
		//zoomControl: false,
		//mapTypeControl: false,
		//panControl:false,
		//rotateControl:false,
		streetViewControl:false,
		zoom:14,
		center:center,
		
	// ADD ALL OF THE MAP TYPES THAT WE WANT TO USE IN OUR MAP
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.HYBRID, google.maps.MapTypeId.TERRAIN, google.maps.MapTypeId.SATELLITE]
		}, mapTypeId: google.maps.MapTypeId.ROADMAP	
	};
	
	// LOAD THE MAP
	var map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);
	directionsDisplay.setPanel(document.getElementById('directions-panel'));
	
	//var bounds = new google.maps.LatLngBounds();
	
	// LOOP THROUGH OUR LOCATIONS ARRAY AND ADD EACH MARKER TO THE "MARKERS" ARRAY CREATED ABOVE
	var marker, i;
	var image = 'images/icon.jpg';

	// ADD ALL THE MARKERS IN OUR LOCATIONS ARRAY
	for (i=0; i<locations.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map: map,
			icon: marker,
			title: locations[i][0],
			html: '<div class="scroll-fix">Get Directions &raquo;</div>'
		});
		markers.push(marker);
		
		// YOU WILL NEED THIS IF YOU DON'T WANT TO USE THE SPIDER MARKERS
		//google.maps.event.addListener(marker, 'click', function() {
		//	window.location = 'directions.html';
		//});
		
		//bounds.extend(marker.getPosition());
    }

    //map.fitBounds(bounds);
	
}

// FUNCTION TO CALCULATE DIRECTIONS
function calcRoute() {
	var start = document.getElementById("start").value;
	var end = document.getElementById("end").value;
	var request = {
		origin:start,
		destination:end,
		travelMode: google.maps.DirectionsTravelMode.DRIVING
	};	
		directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
        		directionsDisplay.setDirections(response);
				setTimeout(function(){
					var map = new google.maps.Map(document.getElementById('map-canvas'));
					directionsDisplay.setMap(map);
				}, 250);
		} else {
			alert('Starting address not found. Please check that you have entered it correctly.');
		}
    });
	
	return false;
}

google.maps.event.addDomListener(window, 'load', initialize);
google.maps.event.trigger(map, 'resize');
/*$(window).resize(function() {
    initialize();
});*/