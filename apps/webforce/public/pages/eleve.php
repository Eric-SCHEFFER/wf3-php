<?php
$eleveName = $_GET['name'];
?>

<body>
<div class="container">
    <h1>page de l'élève : <?php echo($eleveName)?></h1>
    <?php foreach ($classe as $personne) {
        if($personne['name'] === $eleveName) {
            require ('./composants/card.php');
        }
    } ?>
</div>
</body>
