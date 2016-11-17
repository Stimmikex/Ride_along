/*
	NOTE!
	This does not work in Chrome 50+ without HTTPS
*/

function geolocation() {
	if ("geolocation" in navigator) {
		/* geolocation is available */
		navigator.geolocation.getCurrentPosition(function(position) {
		});
	} else {
		/* geolocation is NOT available */
		console.error("geolocation is not available");
	}
}