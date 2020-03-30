<?php
if (isset($_POST['trier']) || isset($_POST['category'])) {
    $tri = $_POST['trier'];

    $category = $_POST['category'];

    if(!empty($_POST['valueX']) && !empty($_POST['valueY'])){
        $valueX = $_POST['valueX'];
        $valueY = $_POST['valueY'];
        $stm = $pdo->query("SELECT * FROM produits WHERE $tri BETWEEN $valueX AND $valueY");
    }else if ($_POST['trier'] != ''){
        $stm = $pdo->query("SELECT * FROM produits ORDER BY $tri");
    } else {
        $stm = $pdo->query("SELECT produits.name, produits.mark, produits.price,categories.name as category_name, categories.id as category_id from produits inner join categories on produits.category = categories.id where category = $category");
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
        <option value=""></option>
    </select>
    <select name="category">
        <?php foreach ($categories as $category){?>
        <option value="<?= $category['id'] ?>" ><?= $category['name']?></option>
        <?php } ?>
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
            <td > <a href="/category?id=<?= $produit['category_id'] ?>"><?= $produit['category_name']; ?></a></td>
            <td > <?= $produit['mark']; ?></td>
        </tr>
    <?php } ?>


    </tbody>
</table>


