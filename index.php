<?php

include "vendor/autoload.php";

try {

    $bdd = new PDO('mysql:host=remotemysql.com;dbname=5HZnsbDrPS', '', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (PDOException $e) {
    die($e->getMessage());
}

$articles = $bdd->query('SELECT * FROM article')->fetchAll();

dump($articles);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="m-auto w-75">
        <form method="post" action="add.php">
            <label> Marque </label>
            <input class="form-control" type="text" name="name" />
            <label> Prix</label>
            <input class="form-control" type="number" name="prix" />
            <label> Contenue </label>
            <textarea class="form-control" name="content"></textarea>
            <button type="submit" class="btn btn-primary"> Envoyer</button>
        </form>
    </div>
    <div class="container">
        <?php if (isset($_GET['id']) && $_GET['id'] == 1) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Bravo!</strong> Votre article est suprimer
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <?php if (isset($_GET['id']) && $_GET['id'] == 2) : ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Bravo!</strong> Votre article est ajouter
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <?php if (isset($_GET['id']) && $_GET['id'] == 3) : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Bravo!</strong> Votre article à été suprimer
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Contenue</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($articles as $article) : ?>
                        <th scope="row"><?= $article->id ?></th>
                        <th scope="row"><?= $article->name ?></th>
                        <th scope="row"><?= $article->content ?></th>
                        <th scope="row"><?= $article->price ?></th>
                        <th scope="row">
                            <a class="btn btn-danger btn-sm" href="delete.php?id=<?= $article->id ?>"> Delete</a>
                            <a class="btn btn-primary btn-sm" href="update.php?id=<?= $article->id ?>"> Update</a>
                        </th>

                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>