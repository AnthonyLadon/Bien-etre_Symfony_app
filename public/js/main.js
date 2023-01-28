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

//******************/

// Requete AJAX formulaire de recherche pour récupérer villes et code postaux de Belgique
// depuis un fichier json

const LOCALITE = document.getElementById("prestataire_search_localite");
const CODEPOSTAL = document.getElementById("prestataire_search_cp");
const COMMUNE = document.getElementById("prestataire_search_commune");

LOCALITE.addEventListener("change", function () {
  let url = "../zipcode-belgium.json";

  // Pour récupérer le texte du champ selectioné
  let selectedIndex = LOCALITE.options.selectedIndex;
  let selectedtText = LOCALITE.options[selectedIndex].firstChild.data;

  // Définition de la plage de code postal selon la localité selectionnée
  switch (selectedtText) {
    case "région Bruxelles capitale":
      zipCodeRange = "";
      break;
    case "province du hainaut":
      // code block
      break;
    case "province du brabant wallon":
      // code block
      break;
    case "province d'anvers":
      // code block
      break;
    case "province de flandre occidentale":
      // code block
      break;
    case "province de flandre orientale":
      // code block
      break;
    case "province du brabant flamand":
      // code block
      break;
    case "province du brabant flamand (Louvain)":
      // code block
      break;
    case "province de liège":
      // code block
      break;
    case "province du luxembourg":
      // code block
      break;
    case "province du limbourg":
      // code block
      break;
    case "province de namur":
      // code block
      break;
  }
});

let xhr = new XMLHttpRequest();
xhr.open("GET", url);
xhr.send(null);
xhr.onreadystatechange = function () {
  if (xhr.readyState === xhr.DONE && xhr.status === 200) {
    // traitement des données reçues
    let datas = JSON.parse(xhr.response);

    for (data of datas) {
      let city = data.city
        .normalize("NFD")
        .replace(/([\u0300-\u036f]|[^0-9a-zA-Z])/g, "")
        .toUpperCase();

      let zipCode = data.zip;
    }
  }

  // let selectOptions = "";
  // for (i = 0; i < zipCodes.length; i++) {
  //   selectOptions += `<option>${zipCodes[i]}</option>`;
  // }
};

COMMUNE.addEventListener("change", function () {
  let url = "../zipcode-belgium.json";

  let xhr = new XMLHttpRequest();
  xhr.open("GET", url);
  xhr.send(null);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === xhr.DONE && xhr.status === 200) {
      // Remplacer les caractères spéciaux de la string reçue etla mettre en majuscules
      let selectedCityNormalized = COMMUNE.value
        .normalize("NFD")
        .replace(/([\u0300-\u036f]|[^0-9a-zA-Z])/g, "")
        .toUpperCase();

      // traitement des données reçues
      let datas = JSON.parse(xhr.response);

      let zipCodes = [];
      // Remplacer les caractères spéciaux de la liste JSON et les mettre en majuscules
      for (data of datas) {
        let city = data.city
          .normalize("NFD")
          .replace(/([\u0300-\u036f]|[^0-9a-zA-Z])/g, "")
          .toUpperCase();

        // si la string entrée correspond a une ville on récupére les code postaux de celle-ci
        if (selectedCityNormalized == city) {
          zipCodes.push(data.zip);
        }
      }

      // creation des champs options avec les code postaux
      let selectOptions = "";
      for (i = 0; i < zipCodes.length; i++) {
        selectOptions += `<option>${zipCodes[i]}</option>`;
      }

      // modification du champ text en select avec les code postaux correspondants
      zipCodes.length > 1
        ? (CODEPOSTAL.outerHTML = `<select type="select" id="prestataire_search_cp" name="prestataire_search[cp]" class="main-search-input">${selectOptions}</select>`)
        : (CODEPOSTAL.outerHTML = `<input type="text" value="${zipCodes[0]}" id="prestataire_search_cp" name="prestataire_search[cp]" class="main-search-input">`);
    }
  };
});

//******************/

// Permet, sur les autres pages que l'accueil, d'afficher et de masquer le zone de recherche
const TargetDiv = document.getElementById("search-bar-wrap");
const BTN = document.getElementById("search-button-toggle");
// condition pour éviter les erreurs sur la page home (TargetDiv n'existe pas sur cette page)
if (TargetDiv) {
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
}
