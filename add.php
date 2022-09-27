<?php
try {
 $bdd = new PDO('mysql:host=remotemysql.com;dbname=5HZnsbDrPS', '', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (PDOException $e) {
    die($e->getMessage());
}

if (!empty($_POST['name'])) {

    $name = htmlspecialchars($_POST['name']);
    $prix = htmlspecialchars($_POST['prix']);
    $content = htmlspecialchars($_POST['content']);
    $requete = 'INSERT INTO article (name,price,content) 
                VALUE (:name,:prix,:content)';
    $query = $bdd->prepare($requete);
    $query->execute([
        'name' => $name,
        'prix' => $prix,
        'content' => $content,
    ]);
}

header("Location: /index.php?id=2");