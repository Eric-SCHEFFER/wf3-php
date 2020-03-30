<?php
$categoryId = $_GET['id'];
$stm = $pdo->query("SELECT produits.name, produits.mark, produits.price,categories.name as category_name, categories.id as category_id from produits inner join categories on produits.category = categories.id where category = $categoryId");
$produits = $stm->fetchAll();

?>

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
            <td ><?= $produit['category_name']; ?></td>
            <td > <?= $produit['mark']; ?></td>
        </tr>
    <?php } ?>


    </tbody>
</table>
