
var map = L.map('map').setView([-34.6037, -58.3816], 13);
// script.js
function initMap() {
    var location = { lat: -34.6037, lng: -58.3816 };
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: location
    });

    var locations = [
        { lat: -34.597748125295595, lng: -58.41778475679015, title: 'Av. Córdoba 3638' },
        { lat: -34.61233559274043, lng: -58.37023778653815, title: 'Av. Belgrano 271' },
        { lat: -34.59440189928126, lng: -58.400459721310696, title: 'Av. Sta. Fe 2301' }
    ];

    locations.forEach(function(location) {
        new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: map,
            title: location.title
        });
    });
}
