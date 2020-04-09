<?php

    $id = $_GET['id'];
    $stm = $pdo->query('SELECT * from recipes WHERE id ='.$id);
    $recipe = $stm->fetch();
    
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

        <?php if ($recipe['photo']) {?>
            <img style="object-fit: cover; border: 1px solid" src="<?= $recipe['photo'] ?>" alt="">
        <?php } else {?>
            <img style="object-fit: cover; border: 1px solid" src="https://assets.afcdn.com/recipe/20190212/87658_w648h414c1cx1663cy2227cxt0cyt0cxb6236cyb4154.jpg" alt="">
        <?php } ?>
        <h1><?= $recipe['name'] ?></h1>

        <h2>Difficulté : <?= $recipe['difficulty'] ?></h2>

        <h3>Ingrédients : <?= $recipe['ingredients'] ?></h3>
        <h3>Temps de préparation : <?= $recipe['cooking_time'] ?> minutes</h3>


        <p class="mt-5"><?= $recipe['advices'] ?></p>

    </div>


</body>
</html>
