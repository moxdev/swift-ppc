(function() {
     // Initializes the Google Map Canvas
    var MapCanvas = (function() {
        var element = document.getElementById('map-canvas'),
            options = MapOptionsModule.settings,
            map = Map.create(element, options);

        map.zoom(15);

        var marker1 = map.addMarker({
            id: 1,
            lat: 38.938147,
            lng: -77.024916,
            draggable: true,
            animation: google.maps.Animation.DROP,
            content: 'The Swift at Petworth<br/>3828 Georgia Avenue, NW<br/>Washington, DC 20011'
        });
        window.addEventListener('resize', function () {
        map.setCenter(center);
        });

    }()); // End MapCanvas
}());


/*
========================================
* Easily find any marker by id using this function

var found = map.findBy(function(marker) {
    return marker.id === whatevermarkerid;
    console.log(found);
});

* Easily remove and marker by id using this function
map.removeBy(function(marker) {
    return marker.id === whatevermarkerid;
});
Example:
    map.removeBy(function(marker) {
        if (marker.id === 2) {
            console.log(marker);
        }
        return marker.id === 2;
    });
    // Will remove marker with id:2 and console log it
===========================================
*/
