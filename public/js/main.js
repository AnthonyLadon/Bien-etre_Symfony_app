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

//requete AJAX formulaire de recherche pour récupérer villes et codes postaux de Belgique
const LOCALITE = document.getElementById("prestataire_search_localite");
const CODEPOSTAL = document.getElementById("prestataire_search_cp");
const COMMUNE = document.getElementById("prestataire_search_commune");

CODEPOSTAL.addEventListener("change", function () {
  let url = "../zipcode-belgium.json";

  let xhr = new XMLHttpRequest();
  xhr.open("GET", url);
  xhr.send(null);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === xhr.DONE && xhr.status === 200) {
      // récupération de la valeur (Numéro du select) du code postal selectionné
      let num = CODEPOSTAL.value;
      // Puis la valeur du texte dans le select
      let selectedZip = CODEPOSTAL[num].innerText;

      // traitement des données reçues
      let datas = JSON.parse(xhr.response);

      for (data of datas) {
        if (selectedZip == data.zip) {
          console.log(selectedZip + " -> " + data.city);
        }
      }
    }
  };
});

// Permet, sur les autres pages qu'accueil, d'afficher et de masquer le zone de recherche
const TargetDiv = document.getElementById("search-bar-wrap");
const BTN = document.getElementById("search-button-toggle");
TargetDiv.style.display = "none";
BTN.onclick = function () {
  if (TargetDiv.style.display !== "none") {
    TargetDiv.style.display = "none";
    BTN.innerHTML = '<i class="fa fa-search"></i>';
  } else {
    TargetDiv.style.display = "block";
    BTN.innerHTML = '<i class="fa-solid fa-xmark"></i>';
  }
};
