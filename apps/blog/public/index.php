<?php
$request = $_SERVER['REQUEST_URI'];
$uri = parse_url($request, PHP_URL_PATH);

//credentias pour la BDD
$dsn = "mysql:host=mysql;dbname=food";
$user = "root";
$passwd = "root";

//Je me connecte à ma BDD avec PDO
$pdo = new PDO($dsn, $user, $passwd);



switch ($uri) {
    case '/' :
        require __DIR__ . '/pages/homepage.php';
        break;
    case '/recipe':
        require __DIR__ . '/pages/recipe.php';
        break;
    case '/new_recipe':
        require __DIR__ . '/pages/newRecipe.php';
        break;
    default :
        require __DIR__ . '/pages/homepage.php';
        break;
}
?>
</html>
