function doRecherche()
{
   let data = new FormData(document.getElementById("maRecherche"));
   
   fetch("http://localhost/php_mvc/Controller/Controller.php", { method:"POST", body:data })
   .then (res => res.json())
   .then (res => {
    let resultats = document.getElementById("resultatsDiv");
    if (res !== null) {
        for (let r of res)
        {
            resultats.innerHTML += `<div>${r.employee_id} - ${r.first_name} - ${r.last_name}</div>`;
        }
    }
   });
   
   return false;
}