<?php
require ('./data.php');
require('./pages/head.php');


//créer une page pour lister les articles -> image, titre et le hook
//créer une autre page pour avoir les infos d'un seul article

$request = $_SERVER['REQUEST_URI']; 
$uri = parse_url($request, PHP_URL_PATH);

switch($uri){
    case "/":
        require __DIR__ . '/pages/homepage.php';
        break;
    default :
        require __DIR__ . '/pages/homepage.php';
break;

}
    
?>
</body>

</html>
