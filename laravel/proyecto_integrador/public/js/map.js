
var map = L.map('map').setView([-34.6037, -58.3816], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var locations = [
    { lat:-34.597748125295595, lng:-58.41778475679015, popup: 'Av. Córdoba 3638' },
    {lat: -34.61233559274043,lng:-58.37023778653815,popup: 'Av. Belgrano 271' },
    { lat:-34.59440189928126,lng: -58.400459721310696, popup: 'Av. Sta. Fe 2301' }
];


locations.forEach(function(location) {
    L.marker([location.lat, location.lng])
        .addTo(map)
        .bindPopup(location.popup);
});
