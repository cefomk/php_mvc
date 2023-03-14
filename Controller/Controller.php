<?php
include '../Model/Model.php';

/*/$resultats = $conn->select("SELECT * FROM `employees` WHERE last_name LIKE ? OR first_name LIKE ?",
["%k%i%","%k%i%"]
);*/

$resultats = $conn->select("SELECT * FROM `employees` WHERE last_name LIKE ? OR first_name LIKE ?",
["%{$_POST["recherche"]}%","%{$_POST["recherche"]}%"]
);

echo json_encode(count($resultats) == 0 ? null : $resultats);