<?php
//Je me connecte à ma BDD avec PDO
//Je demande a ma base de récupérer tous les articles et de les retourner sous forme d'un statement
$stm = $pdo->query("SELECT * from produits");
//je retourner tous mes articles sous forme d'un tableau via la méthode fetchAll()
$produits = $stm->fetchAll();
require ('./components/tableau.php');
?>

