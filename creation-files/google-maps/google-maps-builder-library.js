//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Map Module for building Google Maps Canvas
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * This Module creates prototype functions to be used to create a Google Map canvas using pure Javascript
 *     - To use this module you will need to set the (element, options) in a separate js file where you initialize your Google Map
 *     - This module requires the Google Maps API and the Marker Clusterer js library
 *
 * Documentation:
 *     Google Maps Docs (Map Options):  https://developers.google.com/maps/documentation/javascript/reference#MapOptions
 *     Google Maps Docs (Markers): https://developers.google.com/maps/documentation/javascript/reference#Marker
 *     Marker Clusterer Docs:  https://github.com/googlemaps/js-marker-clusterer
 *
 * Credit: Envato Tuts+
 *     https://www.youtube.com/watch?v=zWD6us77DhY&index=14&list=PLgGbWId6zgaXFR4SW_3qJ55cxmEqRNIzx
 *
 **/

(function() {

    // Uses GMaps API to set the canvas options
    var Map = (function() {
        function Map(element, options) {
            // Creates the gmaps canvas (with elements, options from 'google-maps-options.js' file)
            this.gMap = new google.maps.Map(element, options);
            // Creates a new list for map markers
            this.markers = MarkerList.create();
            // Checks to see if map cluster being used
                // If cluster is being used creates a new cluster and gets options from options module
            if(options.cluster) {
                this.markerClusterer = new MarkerClusterer(this.gMap, [], options.cluster.options);
            }
        }
        // Allows properties to be used on map canvas initializer ( example "map.zoom(10)" )
        Map.prototype = {
            // Sets zoom level
            zoom: function(level) {
                if(level) {
                    this.gMap.setZoom(level);
                }else {
                    return this.gMap.getZoom();
                }
            },
            // Private function sets events on map markers (such as on click)
            _on: function(options) {
                var self = this;
                google.maps.event.addListener(options.obj, options.events, function(e) {
                    options.callback.call(self, e);
                });
            },
            // Function for adding marker to maps canvas initializer
            addMarker: function(options) {
                // Sets the position for marker
                var marker,
                    self = this;
                options.position = {
                    lat: options.lat,
                    lng: options.lng
                }
                // Private function creates a new marker
                marker = this._createMarker(options);
                // If using MarkerClusterer create new markerClusterer and add marker to it
                if(this.markerClusterer) {
                    this.markerClusterer.addMarker(marker);
                }
                // Private function adds marker to marker array
                this._addMarker(marker);
                    // If marker in MPI has events property, attach event to marker
                    if(options.events) {
                        this._attachEvents(marker, options.events);
                    }
                    // Automatically adds content property to marker for on click event
                    if(options.content) {
                        this._on({
                            obj: marker,
                            events: 'click',
                            callback: function() {
                                var infoWindow = new google.maps.InfoWindow({
                                    content: options.content
                                });
                                infoWindow.open(this.gMap, marker);
                            }
                        })
                    }
                // Returns the marker
                return marker;
            },
            // Private function for attaching events to markers
            _attachEvents: function(obj, events) {
                var self = this;
                events.forEach(function(event) {
                    self._on({
                        obj: obj,
                        events: event.name,
                        callback: event.callback
                    });
                });
            },
            // Find a marker by parameter (see below examples)
            findBy: function(callback) {
                return this.markers.find(callback);
            },
            // Remove marker loops through and sets the corresponding marker to null (see example below)
            removeBy: function(callback) {
                var self = this;
                self.markers.find(callback, function(markers) {
                    markers.forEach(function(marker) {
                        // If using MarkerClusterer must be removed from the MC before it can be set to null
                        if(self.markerClusterer) {
                            self.markerClusterer.removeMarker(marker);
                        }else {
                            marker.setMap(null);
                        }
                    });
                });
            },
            // Private function adds marker to the "markers" array
            _addMarker: function(marker) {
                this.markers.add(marker);
            },
            // Private function creates a new gmaps marker
            _createMarker: function(options) {
                options.map = this.gMap;
                return new google.maps.Marker(options);
            }
        };
        // Prototype end and returns Map
        return Map;
    // var Map ends
    }());

    // Ability to create map by using "Map.create(element, options)"
    Map.create = function(element, options) {
        return new Map(element, options);
    };

    // Binds the Map to the window so it loads when the window loads
    window.Map = Map;
}());


/////////////////////////////////////////////////////////
// Examples of how to use findBy and removeBy functions //
/////////////////////////////////////////////////////////
/**
======================================================================
 Easily find any marker by id using this function
======================================================================

var found = map.findBy(function(marker) {
    return marker.id === whatevermarkerid;
    console.log(found);
});

// Example:
    var found = map.findBy(function(marker) {
        return marker.id === 2;
        console.log(found);
    });
// Will console.log marker with id:2
======================================================================
 Easily remove and marker by id using this function
======================================================================

map.removeBy(function(marker) {
    return marker.id === whatevermarkerid;
});

// Example:
    map.removeBy(function(marker) {
        if (marker.id === 2) {
            console.log(marker);
        }
        return marker.id === 2;
    });
// Will remove marker with id:2 and console log it
===========================================
**/





