<?php
session_start();
include('includes/connect_client.php');

if (!isset($_SESSION['client'])){
    header("Location: index.php?login");
    die();
}
else{


$id_client = $_SESSION['client'];

$select_query = "select `ap`.* from `panier` pan, `achat_produit` ap where `ap`.id_panier=`pan`.id and `pan`.id_client='$id_client'";
$result_select = mysqli_query($con, $select_query);
$row = mysqli_fetch_array($result_select);

$result_select = mysqli_query($con, $select_query);

$id_panier = $row['id_panier'];

$totalTTC=0;
$totalItem=0;


function buildAllCartItems($result, $totalTTC, $totalItem){
        //. id_panier id_produit, quantite


        while($row = mysqli_fetch_array($result)){
                    $qty = $row['quantite'];
                    $itemId = $row['id_produit'];
                    $itemPrice = $row['prix'];
                    $totalItem++;
                    $totalTTC+=$itemPrice*$qty;
                    buildCartItem($itemId,$qty);
              }
              return array($totalTTC, $totalItem);
}

if (isset($_POST['cartValidation'])){

    $totalTTC = $_POST['totalTTC'];

    $prixHT = $totalTTC / 1.2;


    $insert_query="insert into `facturation` (`id_client`, `prixHT`, `prixTTC`, `id_panier`) values ('$id_client','$prixHT', '$totalTTC', '$id_panier')";
    $result = mysqli_query($con, $insert_query);
    if ($result){

        $select_query = "select `ap`.*, `pt`.id_produit produit_id from `panier` pan, `achat_produit` ap, `produit_taille` pt where `ap`.id_panier=`pan`.id and `pan`.id_client='$id_client' and `pt`.id = `ap`.id_produit";
        $result_select = mysqli_query($con, $select_query);

        while($row = mysqli_fetch_array($result_select)){

            $qty = $row['quantite'];
            $itemId = $row['id_produit'];
            $product_id = $row['produit_id'];


            $update_query = "UPDATE `produit_vendu` SET `nb_vendu` = `nb_vendu`+'$qty' WHERE `produit_vendu`.`id_produit` = '$product_id'";
            $result_insert = mysqli_query($con, $update_query);

            $update_query = "UPDATE `stock_taille` SET `stock` = `stock`-'$qty' WHERE `stock_taille`.`id_produit_taille` = '$itemId'";
            $result_insert = mysqli_query($con, $update_query);

        }



        $delete_query = "DELETE FROM `panier` WHERE `id_client` = '$id_client'";
        $result = mysqli_query($con, $delete_query);

        $insert_query = "insert into `panier` (id_client) values ('$id_client')";
        $result = mysqli_query($con, $insert_query);

        header("Location: index.php?cart");
    }
}

?>

<section class="devCartReview">
    <div class="mainCartReviewCont">
        <div class="centerCartReviewCont">
            <div class="left">
                <div class="cartHeader">
                    <h3>Votre Panier</h3>
                    <p id="cartPriceText">Prix</p>
                </div>
                <div class="cartItemsCont">
                    <?php
                    $array = buildAllCartItems($result_select, $totalTTC, $totalItem);
                    $totalTTC = $array[0];
                    $totalItem = $array[1];
                    ?>
                </div>
                <div class="cartFooter">
                    <p class="cartTotal"><?=$totalTTC?>€</p>
                    <p>(<?=$totalItem?> articles):</p>
                    <p>Sous-total </p>
                </div>
            </div>
            <div class="right">
                <p>Sous-total </p>
                <p>(<?=$totalItem?> articles): </p>
                <p class="cartTotal"><?=$totalTTC?>€</p>
                <form action="" method="post">
                    <input type="text" hidden="hidden" value="<?= $totalTTC ?>" name="totalTTC">
                    <button type="submit" class="cartCheckout" name="cartValidation">Passer la commande</button>
                </form>

            </div>
        </div>
    </div>
</section>
<?php
}
?>