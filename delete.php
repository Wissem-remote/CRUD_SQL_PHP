<?php
include "vendor/autoload.php";
if(isset($_GET['id']))
{
    try {

        $bdd = new PDO('mysql:host=remotemysql.com;dbname=5HZnsbDrPS', '', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    $requete = 'DELETE FROM article WHERE id=:id';
    $query = $bdd->prepare($requete);
    $query->execute([
        'id' => htmlspecialchars($_GET['id'])
    ]);
    header("Location: /index.php?id=1");
}