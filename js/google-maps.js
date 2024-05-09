/**
* initialize lsl hub page map
*/
function lsl_init_map(){
  let bounds = new google.maps.LatLngBounds();
  var infoWindow = null;
  var defaultZoom = 12;

  // initialize map
  let map = new google.maps.Map($('#map').get(0), {
    zoom: 6, // starting zoom ( country level zoom )
    center: new google.maps.LatLng( { // default spain centered coordinates
      lat: 40.294856,
      lng: -4.055685
    }),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });


  // check if we have server data TODO: check whether lsl_google_maps_vars.centre_data is defined
  if ( !lsl_google_maps_vars.centre_data.hasOwnProperty('search_coord') ||
       !lsl_google_maps_vars.centre_data.hasOwnProperty('found') ||
       !lsl_google_maps_vars.centre_data.hasOwnProperty('not_found')){

      // we don't have valid server data GET OUT!
      return;
  }

  // if we have search coordinates from server set position and marker
  if ( lsl_google_maps_vars.centre_data.search_coord !== null) {

    var search_coords = lsl_verify_coords( lsl_google_maps_vars.centre_data.search_coord );

    let searchMarker = new google.maps.Marker({
      position: new google.maps.LatLng({
        lat: Number( search_coords.lat),
        lng: Number( search_coords.lng)
      }),
      icon: `${lsl_google_maps_vars.icons_uri}/markers/searchLocation.png`,
      map: map
    });

    //extend the bounds to include searchMarker position
    bounds.extend(searchMarker.position);
  }


  // create found centre markers
  let foundMarkers = lsl_google_maps_vars.centre_data.found.map( function(elem, index) {
    var found_centre_coord = lsl_verify_coords( elem );

    let foundMarker =  new MarkerWithLabel({
      position: new google.maps.LatLng({
        lat: Number( found_centre_coord.lat ),
        lng: Number( found_centre_coord.lng )
      }),
      icon: `${lsl_google_maps_vars.icons_uri}/markers/found.png`,
      map: map,
      labelContent: `${index + 1}`,
      labelAnchor: new google.maps.Point(3, 40),
      labelClass: "gmaps-labels", // the CSS class for the label
      labelStyle: {opacity: 1}
    });

    //extend the bounds to include foundMarker position
    bounds.extend(foundMarker.position);

    // create google maps marker click event to open infobox
    foundMarker.addListener('click', function() {
      if (infoWindow) infoWindow.close();

      infoWindow = new google.maps.InfoWindow({
        content: elem.infobox
      });

      map.panTo(foundMarker.getPosition());
      map.setZoom(defaultZoom);

      infoWindow.open(map, foundMarker);
    });

    // search result list click event to open infobox
    $(`[data-lsl-gmaps-marker-id="${index + 1}"]`).click(function() {
      if (infoWindow) infoWindow.close();

      infoWindow = new google.maps.InfoWindow({
        content: elem.infobox
      });

      map.panTo(foundMarker.getPosition());
      map.setZoom(defaultZoom);

      infoWindow.open(map, foundMarker);
    });

    return foundMarker;
  });

  // initialize found centres cluster
  if ( lsl_google_maps_vars.centre_data.found.length > 1 ) {
    let foundMarkerCluster = new MarkerClusterer(map, foundMarkers,
      {imagePath: `${lsl_google_maps_vars.icons_uri}/marker-clusters/m`
    });
  }




  // create not found centre markers
  let notFoundMarkers = lsl_google_maps_vars.centre_data.not_found.map( function(elem, index) {
    var not_found_centre_coord = lsl_verify_coords( elem );

    let notFoundMarker =  new google.maps.Marker({
      position: new google.maps.LatLng({
        lat: Number( not_found_centre_coord.lat ),
        lng: Number( not_found_centre_coord.lng )
      }),
      icon: `${lsl_google_maps_vars.icons_uri}/markers/notFound.png`,
      map: map
    });

    //extend the bounds to include notFound markers ONLY if there are no found markers
    if( lsl_google_maps_vars.centre_data.found.length == 0  ) {
      bounds.extend(notFoundMarker.position);
    }

    notFoundMarker.addListener('click', function() {
      if (infoWindow) infoWindow.close();

      infoWindow = new google.maps.InfoWindow({
        content: elem.infobox
      });

      map.panTo(notFoundMarker.getPosition());
      map.setZoom(defaultZoom);

      infoWindow.open(map, notFoundMarker);
    });

    return notFoundMarker;
  });

  // initialize not found centres cluster
  if ( lsl_google_maps_vars.centre_data.not_found.length > 1 ) {
    let notFoundMarkerCluster = new MarkerClusterer(map, notFoundMarkers,
      {imagePath: `${lsl_google_maps_vars.icons_uri}/marker-clusters/m`
    });
  }



  // set zoom level after the map is done scaling
  let listener = google.maps.event.addListenerOnce(map, "idle", function () {

    if ( lsl_google_maps_vars.centre_data.found.length == 1 ){
      map.setCenter(bounds.getCenter());
      map.setZoom(defaultZoom);

    } else{
      map.fitBounds(bounds);

    }

  });
}


/**
* verify whether coordinate values are numbers
* @param Object  coords  -  coordinate object
* @return Object  the object coordinate
*/
function lsl_verify_coords( coords ) {

  var invalid_coords = isNaN( coords.lat ) || isNaN( coords.lng );

  if ( invalid_coords )  {

         coords = {
           "lat": "",
           "lng": ""
         };
       }
       return coords
}


// initialize Google Maps V3 component
google.maps.event.addDomListener(window, "load", lsl_init_map);
