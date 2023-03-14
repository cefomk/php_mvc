const reponseHTML = document.querySelector("#resultatsDiv");

document.querySelector("#maRecherche").addEventListener("submit", (e) => {
  
  e.preventDefault();
  reponseHTML.innerHTML = "";

  let recherche = document.querySelector("#recherche").value;

  fetch("http://localhost/php_mvc/Controller/Controller.php?query=" + recherche)
    .then((reponse) => {
      return reponse.json();
    })

    .then((jsonResponse) => {
      console.dir(jsonResponse);
      jsonResponse.recherche.map((value) => {
        console.log(value.name);
        reponseHTML.innerHTML += `<div>${value.employee_id} - ${value.first_name} - ${value.last_name}</div>`;
      });
    });
});
