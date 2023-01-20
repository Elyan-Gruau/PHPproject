<?php
    include('includes/connect_client.php');


    $select_query ="select  `p`.titre, `p`.image, `p`.prixPublique, `p`.couleur, `m`.nom  from `produit` p, `marque` m where `p`.id = '$id' and `m`.id = `p`.id_marque";
    $result_select = mysqli_query($con, $select_query);
    $row = mysqli_fetch_array($result_select);

    $size = 42;


    $select_query = "select * from `stock_taille` where `id_produit_taille` = '$size'";
    $result_stock = mysqli_query($con, $select_query);


    $title = $row['titre'];

    $stockLeft = 69;
    $price = $row['prixPublique'];
    $images = explode(', ', $row['image']);


?>

<div class="cartProduct">
    <div class="productImage">
        <img src="img/product/<?=$images[0] ?>" alt="image">
    </div>

    <div class="productInformation">
        <div>
            <h4><?=$title?></h4>
            <p>Plus que </p>
            <p><?=$stockLeft?></p>
        </div>
        <div>
            <p> exemplaires</p>
            <p>Taille: </p>
            <p><?=$size?></p>
        </div>

        <label >
            <select name="qty" id="productQtySelectorCart">
                <?php
                $qstock = mysqli_fetch_assoc($result_stock)['stock'];
                for($i = 1; $i <= min($qstock, 10); $i++){
                    ?>
                    <option value='<?=$i?>' <?=$i?>><?=$i?></option>
                    <?php

                }
                ?>
            </select>
        </label>
    </div>
    <div class="priceCont">
        <p><?=$price?>€</p>
        <a class="deleteFromCart">Supprimer</a>
    </div>
</div>
