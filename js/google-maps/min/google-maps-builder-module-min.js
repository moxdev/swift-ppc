!function(){var e=function(){function e(e,t){this.gMap=new google.maps.Map(e,t),this.markers=MarkerList.create(),t.cluster&&(this.markerClusterer=new MarkerClusterer(this.gMap,[],t.cluster.options))}return e.prototype={zoom:function(e){return e?void this.gMap.setZoom(e):this.gMap.getZoom()},_on:function(e){var t=this;google.maps.event.addListener(e.obj,e.events,function(r){e.callback.call(t,r)})},addMarker:function(e){var t,r=this;return e.position={lat:e.lat,lng:e.lng},t=this._createMarker(e),this.markerClusterer&&this.markerClusterer.addMarker(t),this._addMarker(t),e.events&&this._attachEvents(t,e.events),e.content&&this._on({obj:t,events:"click",callback:function(){var r=new google.maps.InfoWindow({content:e.content});r.open(this.gMap,t)}}),t},_attachEvents:function(e,t){var r=this;t.forEach(function(t){r._on({obj:e,events:t.name,callback:t.callback})})},findBy:function(e){return this.markers.find(e)},removeBy:function(e){var t=this;t.markers.find(e,function(e){e.forEach(function(e){t.markerClusterer?t.markerClusterer.removeMarker(e):e.setMap(null)})})},_addMarker:function(e){this.markers.add(e)},_createMarker:function(e){return e.map=this.gMap,new google.maps.Marker(e)}},e}();e.create=function(t,r){return new e(t,r)},window.Map=e}();