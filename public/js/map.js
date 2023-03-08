//Settings Leaflet maps

// récupération des coordonnées envoyées par l'API
let lat = document.getElementById("map-lat").innerText;
let lng = document.getElementById("map-lng").innerText;

// On passe les valeurs lat et longitude à la carte et au marqeur
var map = L.map("map").setView([lat, lng], 12);

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution:
    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

// marqeur de carte
var marker = L.marker([lat, lng], {
  color: "red",
  fillColor: "#f03",
  fillOpacity: 0.5,
  radius: 500,
}).addTo(map);

marker.bindPopup("Coucou je suis ici!");
