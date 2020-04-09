<?php

$stm = $pdo->query('SELECT * from recipes');
$recipes = $stm->fetchAll();


if(!empty($_GET['ingredient_filter'])){
    $stm = $pdo->query("SELECT * FROM recipes WHERE ingredients LIKE '%".$_GET['ingredient_filter']."%'");
    $recipes = $stm->fetchAll();
}


if(!empty($_GET['difficulty_filter'])){
    $stm = $pdo->query("SELECT * FROM recipes WHERE difficulty =".$_GET['difficulty_filter']);
    $recipes = $stm->fetchAll();
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div class="container">
    <a href="http://localhost:9090/new_recipe">Ajouter une recette</a>


    <div class="row">
        <form action="" method="get">
            <input type="text" name="ingredient_filter" placeholder="filtrer par ingredients">
            <input type="submit" value="filtrer">
        </form>
        <form action="" method="get">
            <input type="number" name="difficulty_filter" placeholder="filtrer par difficulté">
            <input type="submit" value="filtrer par difficulté">
        </form>
        <a href="/">reset</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Difficulté</th>
            <th scope="col">Temps de préparation</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($recipes as $recipe){ ?>
            <tr>
                <td scope="row"><a href="http://localhost:9090/recipe?id=<?= $recipe['id'] ?>"><?= $recipe['name'] ?></a></td>
                <td scope="col"><?= $recipe['difficulty'] ?></td>
                <td><?= $recipe['cooking_time'] ?></td>
                <td>
                    <?php if ($recipe['photo']) {?>
                    <img style="width: 100px; object-fit: cover; border: 1px solid" src="<?= $recipe['photo'] ?>" alt="">
                    <?php } else {?>
                        <img style="width: 100px; object-fit: cover; border: 1px solid" src="https://assets.afcdn.com/recipe/20190212/87658_w648h414c1cx1663cy2227cxt0cyt0cxb6236cyb4154.jpg" alt="">
                    <?php } ?>
                </td>
            </tr>


        <?php } ?>


        </tbody>
    </table>
</div>


</body>
</html>
