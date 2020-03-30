<?php
if (isset($_POST['trier'])) {
    $tri = $_POST['trier'];

    if(!empty($_POST['valueX']) && !empty($_POST['valueY'])){
        $valueX = $_POST['valueX'];
        $valueY = $_POST['valueY'];
        $stm = $pdo->query("SELECT * FROM produits WHERE $tri BETWEEN $valueX AND $valueY");
    }else{
        $stm = $pdo->query("SELECT * FROM produits ORDER BY $tri");
    }
    $produits = $stm->fetchAll();
}

?>
Trier par :
<form action="http://localhost:9090/" method="post">
    <select name="trier" id="">
        <option value="category">catégorie</option>
        <option value="price">prix</option>
        <option value="mark">note</option>
    </select>
    <input name="valueX" type="number" placeholder="entre">
    <input name="valueY" type="number" placeholder="et">
    <input class="btn btn-primary my-2" type="submit" value="trier">
</form>

<table class="table table-dark">
    <thead>
    <tr>
        <th>nom</th>
        <th>price</th>
        <th>category</th>
        <th>mark</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($produits as $produit){ ?>
        <tr>
            <td > <?= $produit['name']; ?></td>
            <td > <?= $produit['price']; ?></td>
            <td > <?= $produit['category_name']; ?></td>
            <td > <?= $produit['mark']; ?></td>
        </tr>
    <?php } ?>


    </tbody>
</table>


