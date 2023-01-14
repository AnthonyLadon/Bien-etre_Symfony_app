// gestion de l'annimation menu hamburger (@media-querie Smartphone)
let icon = document.getElementById("icon");
let icon1 = document.getElementById("a");
let icon2 = document.getElementById("b");
let icon3 = document.getElementById("c");
let nav = document.getElementById("nav");
let blue = document.getElementById("pink");

icon.addEventListener("click", function () {
  icon1.classList.toggle("a");
  icon2.classList.toggle("c");
  icon3.classList.toggle("b");
  nav.classList.toggle("show");
  blue.classList.toggle("slide");
});

// Permet, sur les autres pages qu'accueil, d'afficher et de masquer le zone de recherche
const targetDiv = document.getElementById("search-bar-wrap");
const btn = document.getElementById("search-button-toggle");
targetDiv.style.display = "none";
btn.onclick = function () {
  if (targetDiv.style.display !== "none") {
    targetDiv.style.display = "none";
    btn.innerHTML = '<i class="fa fa-search"></i>';
  } else {
    targetDiv.style.display = "block";
    btn.innerHTML = '<i class="fa-solid fa-xmark"></i>';
  }
};
