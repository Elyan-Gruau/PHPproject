<?php
session_start();
include('includes/connect_client.php');

    $select_query = "select  `p`.prixPublique, `p`.image, `p`.titre, `pv`.nb_vendu from `produit` p, `produit_vendu` pv where `p`.id = '$id' and `pv`.`id_produit` = '$id'";

    $result_select = mysqli_query($con, $select_query);
    $row = mysqli_fetch_array($result_select);


    $select_query_bestseller = "select * from `produit_vendu` order by `nb_vendu` desc";

    $result_select = mysqli_query($con, $select_query_bestseller);

    $bestseller = '';

    for($i = 0; $i < 3; $i++){
        $best_selling = mysqli_fetch_array($result_select);
        if($best_selling['id_produit'] == $id){
            $bestseller = 'Bestseller';
        }
    }


    $price = $row['prixPublique'];
    $title = $row['titre'];
    $sold = $row['nb_vendu'];

    $image = explode(', ', $row['image']);

    $select_query = "select * from `produit`, `produit_vendu` pv where id = '$id' and `pv`.`id_produit`";

    $result_select = mysqli_query($con, $select_query);
    $row = mysqli_fetch_array($result_select);
    $deliveryDays = 10;



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
