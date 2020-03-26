<?php


    $date = date("Y-m-d");

    function getFrenchDate() {
        return date('d-m-Y');
    }


?>

<body>
<div class="container">
    <h1>this is the homepage</h1>

    <h2>nous sommes le <?php echo(getFrenchDate())?></h2>
</div>
</body>
