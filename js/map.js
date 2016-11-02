function initMap() {
    var myLatLng = {lat: 38.938147, lng: -77.024916};

    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: myLatLng,
        zoom: 15
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        animation: google.maps.Animation.DROP,
        title: 'The Swift at Petworth'
    });

    var contentString = '3828 Georgia Avenue, NW<br/>Washington, DC 20011';

    var infowindow = new google.maps.InfoWindow({
              content: contentString
            });

    marker.addListener('click', function() {
             infowindow.open(map, marker);
           });

    map.addListener('center_changed', function() {
        window.setTimeout(function() {
            map.panTo(marker.getPosition());
        });
    });
}


// window.addEventListener('resize', function () {
// map.setCenter(center);
// });

// var marker1 = map.addMarker({
//     id: 1,
//     lat: 38.938147,
//     lng: -77.024916,
//     draggable: true,
//     animation: google.maps.Animation.DROP,
//     content: 'The Swift at Petworth<br/>3828 Georgia Avenue, NW<br/>Washington, DC 20011'
// });

