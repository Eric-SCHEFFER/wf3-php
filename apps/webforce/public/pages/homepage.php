<?php

if(!empty($_POST['name'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $mark = $_POST['mark'];

    $stm = $pdo->prepare('INSERT INTO produits (name, price, category, mark) VALUES (:name, :price, :category, :mark)');
    $stm->bindParam(':name', $name);
    $stm->bindParam(':price', $price);
    $stm->bindParam(':category', $category);
    $stm->bindParam(':mark', $mark);

    $stm->execute();


}

//Je me connecte à ma BDD avec PDO
//Je demande a ma base de récupérer tous les articles et de les retourner sous forme d'un statement
$stm = $pdo->query("SELECT * from produits");
//je retourner tous mes articles sous forme d'un tableau via la méthode fetchAll()
$produits = $stm->fetchAll();





require ('./components/tableau.php');
?>

<form action="/" method="post">
    <input name="name" type="text" placeholder="name">
    <input name="price" type="number" placeholder="price">
    <input name="category" type="text" placeholder="category">
    <input name="mark" type="number" placeholder="mark">
    <input type="submit" value="ajouter">
</form>

