<?php

    $userName = $_POST['userName'];
    echo($userName);

?>

<body>
<div class="container">

    <div class="row">

        <form method="post" action="http://localhost:9090/eleves">

            <input name="userName" type="text" placeholder="votre nom">
            <input type="submit" value="enoyer">

        </form>

    </div>
    <div class="row">
        <?php
        foreach ($classe as $personne){
            require('./composants/card.php');
        } ?>
    </div>
</div>
</body>
