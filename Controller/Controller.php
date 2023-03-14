<?php
include '../Model/Model.php';

/*$resultats = $conn->select("SELECT * FROM `employees` WHERE last_name LIKE ? OR first_name LIKE ?",
["%{$_POST["recherche"]}%","%{$_POST["recherche"]}%"]
);*/

$resultats = $conn->select("SELECT * FROM `employees` WHERE last_name LIKE ? OR first_name LIKE ?",
["%{$_GET["query"]}%","%{$_GET["query"]}%"]
);

echo json_encode(count($resultats) == 0 ? null : $resultats);