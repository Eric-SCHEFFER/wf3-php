<?php
    $error = $_GET['error'];
    if(!empty($_POST)) {

        $name = $_POST['name'];
        $difficulty = $_POST['difficulty'];

        if($difficulty > 1 && $difficulty < 5) {


        $ingredients = $_POST['ingredients'];
        $advices = $_POST['advices'];
        $cooking_time = $_POST['cooking_time'];

        //dossier ou seront stockées les photos
        $uploaddir = './assets/images/';
        //je constitue un fichier avec le path du dossier ou le placer
        $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
        $photo = null;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
            $photo = $uploadfile;
        }

        $stm = $pdo->prepare('INSERT INTO recipes (name, difficulty, ingredients, advices, cooking_time, photo) VALUES (:name, :difficulty, :ingredients, :advices, :cooking_time, :photo)');
        $stm->bindParam(':name', $name);
        $stm->bindParam(':difficulty', $difficulty);
        $stm->bindParam(':ingredients', $ingredients);
        $stm->bindParam(':advices', $advices);
        $stm->bindParam(':cooking_time', $cooking_time);
        $stm->bindParam(':photo', $photo);

        $stm->execute();

        header('location: http://localhost:9090/');
        } else {
            header('location: http://localhost:9090/new_recipe?error=difficulty');
        }
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
        <h1>ajouter une recette</h1>

        <form action="" enctype="multipart/form-data" method="post">


            <input type="text" name="name" placeholder="nom de la recette">
            <span style="color: red"><?= $error ?></span>
            <input type="number" name="difficulty" placeholder="difficulté">
            <input type="text" name="ingredients" placeholder="ingredients (séparés par une virgule)">
            <input type="number" name="cooking_time" placeholder="temps de préparation en minutes">
            <textarea type="text" name="advices" placeholder="vos conseils de préparations"></textarea>
            <input type="file" name="photo" placeholder="vos conseils de préparations">

            <input type="submit" value="envoyer!!">


        </form>

    </div>


</body>
</html>
