
// geolocation button click event
$(".localisationButton").click(function () {
  geolocateMe();
});

// wp-i18n library
const { __, _x, _n, _nx } = wp.i18n;
let message;


function geolocateMe() {

  // disable geolocation html button
  document.getElementsByClassName("localisationButton").disabled = true;

  // try and find user
  getUserLocation()
    .then(coords => {
      // send request to server
      hubSearchRedirect(coords.lat, coords.lng);
    })
    .catch(error => {

      // display error
      showError(error);
    })
    .then(() => { //
      // re-enable geolocation button
      document.getElementsByClassName("localisationButton").disabled = false;
    });
}


function hubSearchRedirect(lat, lng) {

  // redirect to search page passing lat and lng as GET query string
  window.location = site_url + '/search?lat=' + lat + '&lng=' + lng;
}


function getUserLocation() {
  return new Promise(function (resolve, reject) {
    navigator.geolocation.getCurrentPosition(position => {
      resolve({ lat: position.coords.latitude, lng: position.coords.longitude });
    }, error => {
      reject(error);
    });
  });
}


function showError(error) {
  switch (error.code) {
    case error.PERMISSION_DENIED: //User denied the request for Geolocation.

      message = __('Error: Geolocation request denied. Please update your location settings.', 'lyra-store-locator');
      // display some html with error
      alert(message);
      break;
    case error.POSITION_UNAVAILABLE: // Location information is unavailable.

      message = __('Error: Unable to retrieve your current location.', 'lyra-store-locator');
      // display some html with error
      alert(message);
      break;
    case error.TIMEOUT: // The request to get user location timed out.

      message = __('Error: Geolocation Request timeout.', 'lyra-store-locator');
      // display some html with error
      alert(message);
      break;
    case error.UNKNOWN_ERROR: // An unknown error occurred.

      message = __('Error: An unknown error occured. Please try again.', 'lyra-store-locator');
      // display some html with error
      alert(message);
      break;
  }
}
