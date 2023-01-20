<?php
include('includes/connect_client.php');

    $select_query = "select * from `produit`, `produit_vendu` pv where id = '$id' and `pv`.`id_produit`";

    $result_select = mysqli_query($con, $select_query);
    $row = mysqli_fetch_array($result_select);

    $deliveryDays = 10;
    $bestseller = 'Bestseller!';
    $price = $row['prixPublique'];
    $title = $row['titre'];
    $sold = $row['`pv`.id_produit'];

    $image = explode(', ', $row['image']);

?>

<div class="card">
    <a href="index.php?product=<?=$id?>" >

        <img src="img/product/<?php echo $image[0]; ?>" alt="image">
        <div class="cont1">
            <p class="price"><?=$price?>€</p>
            <p class="BestSeller"><?=$bestseller?></p>

        </div>
        <div class="cont2">
            <p class="title"><?=$title?></p>
            <p class="sold"><?=$sold?> vendus</p>
            <p class="shipping">Expédition sous <?=  $deliveryDays?> jours </p>
        </div>
     </a>
</div>
