const reponseHTML = document.querySelector("#resultatsDiv");

document.querySelector("#maRecherche").addEventListener("keyup", (e) => {
  
  e.preventDefault();
  reponseHTML.innerHTML = "";

  let recherche = document.querySelector("#recherche").value;

  fetch("http://localhost/php_mvc/Controller/Controller.php?query=" + recherche)
    .then((reponse) => {
      return reponse.json();
    })

    .then((jsonResponse) => {
      jsonResponse.map((value) => {
        reponseHTML.innerHTML += `<div>${value.year} - ${value.titlte} - ${value.plot}</div>`;
      });
    });
});
