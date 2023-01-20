<?php
session_start();
include('includes/connect_client.php');

$id_client = $_SESSION['client'];

$select_query = "select `ap`.* from `panier` pan, `achat_produit` ap where `ap`.id_panier=`pan`.id and `pan`.id_client='$id_client'";
$result_select = mysqli_query($con, $select_query);


$totalTTC=0;
$totalItem=0;


function buildAllCartItems($result){
        //. id_panier id_produit, quantite


        while($row = mysqli_fetch_array($result)){
                    $qty = $row['quantite'];
                    $itemId = $row['id_produit'];
                    $itemPrice = $row['prix'];
                    $totalItem++;
                    $totalTCC+=$itemPrice;
                    buildCartItem($itemId,$qty);
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
                    buildAllCartItems($result_select);
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
                <form name="cartValidation">
                    <button class="cartCheckout">Passer la commande</button>
                </form>

            </div>
        </div>
    </div>
</section>