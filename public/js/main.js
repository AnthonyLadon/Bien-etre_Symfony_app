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

//*****************************/

// Permet, sur les autres pages que l'accueil, d'afficher et de masquer le formulaire de recherche
const TargetDiv = document.getElementById("search-bar-wrap");
const BTN = document.getElementById("search-button-toggle");
// condition pour éviter les erreurs sur la page home (TargetDiv n'existe pas sur page home)
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

//*****************************/

// permet les selections multiples dans les champs select
// qui ont l'attribut 'multiple' et ce sans utiliser la touche ctrl

window.onmousedown = function (e) {
  let el = e.target;
  if (
    el.tagName.toLowerCase() == "option" &&
    el.parentNode.hasAttribute("multiple")
  ) {
    e.preventDefault();

    // permet la selection et dé-selection multiple
    if (el.hasAttribute("selected")) el.removeAttribute("selected");
    else el.setAttribute("selected", "");

    // hack to correct buggy behavior
    let select = el.parentNode.cloneNode(true);
    el.parentNode.parentNode.replaceChild(select, el.parentNode);
  }
};

//*****************************/

// Requete AJAX formulaire de recherche pour récupérer villes et code postaux de Belgique
// depuis un fichier json

const LOCALITE = document.getElementById("prestataire_search_localite");
const CODEPOSTAL = document.getElementById("prestataire_search_cp");
const COMMUNE = document.getElementById("prestataire_search_commune");

// chargement des options du champ Commune selon selection de Localité
LOCALITE.addEventListener("change", function () {
  // Pour récupérer le texte du champ selectioné
  let selectedIndex = LOCALITE.options.selectedIndex;
  let selectedText = LOCALITE.options[selectedIndex].firstChild.data;

  let selectedLocaliteNormalized = selectedText
    .normalize("NFD")
    .replace(/([\u0300-\u036f]|[^0-9a-zA-Z])/g, "")
    .toUpperCase();

  // Définition de la plage de codes postaux selon la localité selectionnée
  switch (selectedLocaliteNormalized) {
    case "REGIONBRUXELLESCAPITALE":
      minZipCode = 1000;
      maxZipCode = 1299;
      break;
    case "PROVINCEDUHAINAUT":
      minZipCode = 7000;
      maxZipCode = 7999;
      break;
    case "BRABANTWALLON":
      minZipCode = 1300;
      maxZipCode = 1499;
      break;
    case "PROVINCEDANVERS":
      minZipCode = 2000;
      maxZipCode = 2999;
      break;
    case "PROVINCEDEFLANDREOCCIDENTALE":
      minZipCode = 8000;
      maxZipCode = 8999;
      break;
    case "PROVINCEDEFLANDREORIENTALE":
      minZipCode = 9000;
      maxZipCode = 9999;
      break;
    case "PROVINCEDUBRABANTFLAMAND":
      minZipCode = 1500;
      maxZipCode = 1999;
      break;
    case "BRABANTFLAMMANDLOUVAIN":
      minZipCode = 3000;
      maxZipCode = 3499;
      break;
    case "PROVINCEDELIEGE":
      minZipCode = 4000;
      maxZipCode = 4999;
      break;
    case "PROVINCEDULUXEMBOURG":
      minZipCode = 6600;
      maxZipCode = 6999;
      break;
    case "PROVINCEDULIMBOURG":
      minZipCode = 3500;
      maxZipCode = 3999;
      break;
    case "PROVINCEDENAMUR":
      minZipCode = 5000;
      maxZipCode = 5680;
      break;
  }

  let url = "../zipcode-belgium.json";

  let xhr = new XMLHttpRequest();
  xhr.open("GET", url);
  xhr.send(null);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === xhr.DONE && xhr.status === 200) {
      // traitement des données reçues
      let datas = JSON.parse(xhr.response);

      let cities = [];
      let city = "";

      for (data of datas) {
        if (data.zip >= minZipCode && data.zip <= maxZipCode) {
          city = data.city
            .normalize("NFD")
            .replace(/([\u0300-\u036f]|[^0-9a-zA-Z])/g, "")
            .toUpperCase();
          cities.push(city);
        }
      }

      // classement ds villes par ordre alphabetique
      cities.sort((a, b) => a.localeCompare(b));

      let citiesOptions = "<option value=''>- Selection -</option>";
      for (i = 0; i < cities.length; i++) {
        citiesOptions += `<option value="${cities[i]}">${cities[i]}</option>`;
      }

      COMMUNE.innerHTML = citiesOptions;
    }
  };
});

// chargement des options du champ Code Postal selon selection de Commune
COMMUNE.addEventListener("change", function () {
  let url = "../zipcode-belgium.json";

  // récupération de la string de la commune selectionnée
  let selectedIndex = COMMUNE.options.selectedIndex;
  let selectedText = COMMUNE.options[selectedIndex].firstChild.data;

  let xhr = new XMLHttpRequest();
  xhr.open("GET", url);
  xhr.send(null);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === xhr.DONE && xhr.status === 200) {
      // Remplacer les caractères spéciaux de la string slectionnée dans le formulaire
      // et la mettre en majuscules
      let selectedCityNormalized = selectedText
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

        // si la string entrée correspond a une ville on récupére les codes postaux de celle-ci
        if (selectedCityNormalized == city) {
          zipCodes.push(data.zip);
        }
      }

      //creation des champs options avec les code postaux
      let zipOptions = "<option value=''>- Selection -</option>";
      for (i = 0; i < zipCodes.length; i++) {
        zipOptions += `<option value='${zipCodes[i]}'>${zipCodes[i]}</option>`;
      }

      //modification des options du select
      CODEPOSTAL.innerHTML = zipOptions;
    }
  };
});

//****************************************************/
