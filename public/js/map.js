var lat = document.querySelector('#lat').value;
var long = document.querySelector('#long').value;

console.log(lat);
console.log(long);
var mymap = L.map('mapid').setView([lat, long], 13);
                        
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2F0bGF3IiwiYSI6ImNrY29tY2Y5OTA4ajEyeXQ2NXozaDkxaHcifQ.9igOGHyg9C7k1-roKyMWTw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);