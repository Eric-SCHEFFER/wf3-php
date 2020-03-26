<?php
require ('datas.php');
$request = $_SERVER['REQUEST_URI'];
$uri = parse_url($request, PHP_URL_PATH);

require ('./composants/header.php');
require('./composants/navbar.php');

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
