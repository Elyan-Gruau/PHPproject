<?php
    include('includes/connect_client.php');


    $select_query ="select  `p`.titre, `p`.image, `p`.prixPublique, `m`.nom, `pt`.taille from `produit` p, `produit_taille` pt, `marque` m 
                    where `pt`.id = '$id' and `p`.id = `pt`.id_produit and `m`.id = `p`.id_marque";



    $result_select = mysqli_query($con, $select_query);
    $row = mysqli_fetch_array($result_select);

    $brand = $row['nom'];

    $title = $row['titre'];
    $size = $row['taille'];
    $price = $row['prixPublique'];
    $images = explode(', ', $row['image']);

    $select_query = "select * from `stock_taille` where `id_produit_taille` = '$id'";
    $result_stock = mysqli_query($con, $select_query);
    $row = mysqli_fetch_array($result_stock);

    $stockLeft = $row['stock'];





?>

<div class="cartProduct">
    <div class="productImage">
        <img src="img/product/<?=$images[0] ?>" alt="image">
    </div>

    <div class="productInformation">
        <div>
            <h4><?=$title?></h4>
            <p><?=$brand?></p>
        </div>
        <div>
            <p> exemplaires</p>
            <p>Taille: </p>
            <p><?=$size?></p>
        </div>
        <div>
            <p>Plus que </p>
            <p><?=$stockLeft?></p>
        </div>


        <label >
            <select name="qty" id="productQtySelectorCart" onselect="update_qty">
                <?php
                for($i = 1; $i <= min($stockLeft, 10); $i++){
                    ?>
                    <option value='<?=$i?>' <?=$i?> <?php if ($qty == $i){
                        echo "selected";
                    }?>><?=$i?></option>
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
