<body>
<div class="container">

    <div class="row">
        <form action="./form.php">
            <div class="col-3">
                <input type="text" name="name" placeholder="votre nom">
            </div>
            <div class="col-2">
                <button type="submit">envoyer</button>
            </div>
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
