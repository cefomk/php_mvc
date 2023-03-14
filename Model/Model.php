<?php
include 'Config.php';

class Sql
{
    private $pdo = null;
    private $stmt = null;

    function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . Config::DBHOST . ";dbname=" . Config::DBNAME . ";charset=" . Config::DBCHARSET,
                Config::DBUSER,
                Config::DBPWD,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]
            );
        } catch (PDOException $erreur) {
            echo 'Erreur de connexion: ' . $erreur->getMessage();
            die();
        }
    }

    function select($sql, $data = null)
    {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
        return $this->stmt->fetchAll();
    }

    function __destruct()
    {
        if ($this->stmt !== null ) { $this->stmt = null; }
        if ($this->pdo !== null ) { $this->pdo = null; }
    }

}

$conn = new Sql();