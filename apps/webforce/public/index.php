<?php
require ('datas.php');
$request = $_SERVER['REQUEST_URI'];
$uri = parse_url($request, PHP_URL_PATH);
require ('./composants/header.php');
require('./composants/navbar.php');

//credentias pour la BDD
$dsn = "mysql:host=mysql;dbname=Webforce";
$user = "root";
$passwd = "root";

//Je me connecte à ma BDD avec PDO
$pdo = new PDO($dsn, $user, $passwd);

//Je demande a ma base de récupérer tous les articles et de les retourner sous forme d'un statement
$stm = $pdo->query("SELECT * from articles");

//je retourner tous mes articles sous forme d'un tableau via la méthode fetchAll()
$articles = $stm->fetchAll();

switch ($uri) {
    case '/' :
        require __DIR__ . '/pages/homepage.php';
        break;
    case '/eleves':
        require __DIR__ . '/pages/eleves.php';
        break;
    case '/eleve':
        require __DIR__ . '/pages/eleve.php';
        break;
    default :
        require __DIR__ . '/pages/homepage.php';
        break;
}
?>
</html>
