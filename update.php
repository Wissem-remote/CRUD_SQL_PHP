<?php

include "vendor/autoload.php";
if (isset($_GET['id'])) {
    try {

        $bdd = new PDO('mysql:host=remotemysql.com;dbname=5HZnsbDrPS', '', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

$id = htmlspecialchars($_GET['id']);
$articles = $bdd->prepare('SELECT * FROM article WHERE id=:id' );
$articles = $articles->execute([
    'id' => $id
]);
$article = $article->fetchAll();

if (!empty($_POST['name'])) {

    $name = htmlspecialchars($_POST['name']);
    $prix = htmlspecialchars($_POST['prix']);
    $content = htmlspecialchars($_POST['content']);
    $requete = 'UPDATE article SET name = :name, price = :prix, content = :content WHERE id=:id';
    $query = $bdd->prepare($requete);
    $query->execute([
        'id' => $id,
        'name' => $name,
        'prix' => $prix,
        'content' => $content,
    ]);
    header("Location: /index.php?id=3");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="w-75 m-auto">
        <form method="post">
            <label> Marque </label>
            <input class="form-control" type="text" name="name" value="<?= $article[0]->name ?>" />
            <label> Contenue </label>
            <textarea class="form-control" name="content"><?= $article[0]->content ?></textarea>
            <label> Prix</label>
            <input class="form-control" type="number" name="prix" value="<?= $article[0]->price ?>" />
            <button type="submit" class="btn btn-primary"> Envoyer</button>
        </form>
    </div>
</body>

</html>