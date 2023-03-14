<?php
include '../Model/Model.php';

/*$resultats = $conn->select("SELECT * FROM `employees` WHERE last_name LIKE ? OR first_name LIKE ?",
["%{$_POST["recherche"]}%","%{$_POST["recherche"]}%"]
);*/

if(isset($_GET['query']) && !is_numeric($_GET['query'])) :

    $resultats = $conn->select("SELECT * FROM `movies_full` WHERE title LIKE ?",
    ["%{$_GET["query"]}%"]
    );

    echo json_encode(count($resultats) == 0 ? null : $resultats);

endif;