<div class="card col-3 m-4">
    <img src="<?php echo($personne['photo']); ?>" class="card-img-top" style="object-fit: cover" alt="" height="150px" width="150px">
    <div class=" card-body">
        <h5 class="card-title"><?php echo($personne['name'].'  '.$personne['surname']);  ?> </h5>
        <?php if(!empty($personne['options'])) { ?>
            <p class="card-text"> Option : <?php foreach($personne['options'] as $option)
                {
                    echo($option.' ');
                }
                ?></p>
        <?php } ?>
        <p class="card-text">Notes : <?php
            foreach($personne['learn'] as $x => $x_value) { echo "" . $x . " = " . $x_value.'<br>'; }
            ?></p>
        <p class="card-text"> Moyenne : <?php echo($personne['moyenne']) ?> </p>
        <?php
        $mention = 'aucune';
        if ($personne['moyenne'] >= 10) {
            if($personne['moyenne'] >= 12 && $personne['moyenne'] < 14) {
                $mention = 'assez bien';
            } else if ($personne['moyenne'] >= 14 && $personne['moyenne']  < 16) {
                $mention = 'bien';
            } else if ($personne['moyenne'] >= 16 && $personne['moyenne'] <= 20) {
                $mention = 'très bien';
            }
        } else {
            $mention = 'recalé';
        } ?>
        <h5>
            - mention : <span <?php if($mention === 'recalé') {
                echo('style="color: red"');
            } ?>>
                <span <?php if($mention === 'très bien') {
                    echo('style="color: green"');
                } ?>>
                    <?php echo($mention); ?>
                </span>
        </h5>
        <?php if(!$_GET['name']) { ?>
        <a href="http://localhost:9090/eleve?name=<?php echo($personne['name'])?>">voir la carte de l'éleve</a>
        <?php } ?>
    </div>
</div>
