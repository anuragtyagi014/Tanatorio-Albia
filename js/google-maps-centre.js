/**
 * Google maps for single lsl_centre page
 */

/**
 * Get the expected varibale comming from the server side 'lsl_centre_data' or build an object
 * with empty values if cannot get the one comming from the server
 * @return     object     The object 'lsl_centre_data'
 */
function lsl_get_centre_map_data(){
    var no_data = typeof lsl_centre_map_data === 'null' || typeof lsl_centre_map_data === 'undefined';

    if( no_data ){
        lsl_centre_map_data = {
            'icons_uri': '',
            'latitude': '',
            'longitude': ''
        };
    }

    return lsl_centre_map_data;
}

/**
 * Initialize a map and put a marker on it
 */
function lsl_single_centre_init_map(){
    var map_cont = document.getElementById('map');
    var centre_map_data = lsl_get_centre_map_data();

    // The location coordinates
    var coordinates = new google.maps.LatLng( {
        lat: Number(centre_map_data.latitude),
        lng: Number(centre_map_data.longitude)
    });

    // The map, centered at Uluru
    var map = new google.maps.Map( map_cont, {
        zoom: 15,
        center: coordinates
    });

    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({
        position: coordinates,
        icon: centre_map_data.icons_uri + '/markers/found.png',
        map: map
    });
}

// initialize Google Maps V3 component
google.maps.event.addDomListener( window, "load", lsl_single_centre_init_map );
