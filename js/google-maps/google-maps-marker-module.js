(function() {
    var MarkerList = (function() {
        // Creates an empty items array
        function MarkerList(params) {
            this.items = [];
        }
        MarkerList.prototype = {
            // Adds marker to items array
            add: function(marker){
                // Pushes the marker to the items array
                this.items.push(marker);
            },
            // Removes marker from items array
            remove: function(marker){
                // Find index of marker
                var indexOf = this.items.indexOf(marker);
                // If marker not equal to -1 splice array
                if(indexOf !== -1) {
                    this.items.splice(indexOf, 1);
                }
            },
            // Finds a marker in the array "findBy" property
            find: function(callback, action) {
                // Gets index of each item and adds to empty array for looping
                var callbackReturn,
                    items = this.items,
                    length = items.length,
                    matches = [],
                    i = 0;

                // callback(items[i] = first index of items in array
                // i = that items index
                for(; i < length; i++) {
                    callbackReturn = callback(items[i], i);
                    if(callbackReturn) {
                        matches.push(items[i]);
                    }
                }
                // Looks for action to remove marker "removeBy" property
                if(action)
                    action.call(this, matches);
                // Returns the matches array
                return matches;
            }
        };
        return MarkerList;
    })();

    // Creates a new Marker List
    MarkerList.create = function(params) {
        return new MarkerList(params);
    };
    window.MarkerList = MarkerList;

}()); // end