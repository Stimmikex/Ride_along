/*
	NOTE!
	This does not work in Chrome 50+ without HTTPS
*/

function geolocation() {
	if ("geolocation" in navigator) {
		/* geolocation is available */
		navigator.geolocation.watchPosition(function(position) {
			displayLocation(position.coords.latitude, position.coords.longitude);
		});
	} else {
		/* geolocation is NOT available */
		console.error("geolocation is not available");
	}
}

function displayLocation(lat, lon) {
	pos = 'GeoLocation. lat: ' + lat + ', lon: ' + lon;
	document.getElementById('geolocation').innerHTML = pos;
}