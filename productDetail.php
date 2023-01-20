<?php

include('includes/connect_client.php');

$select_query = "select * from `produit` where `id` = '$id'";
$result_select = mysqli_query($con, $select_query);
$row = mysqli_fetch_array($result_select);


$price = $row['prixPublique'];
$title = $row['titre'];
$desc = $row['descriptif'];
$image = explode(', ', $row['image']);
$image_nb = $_GET['image'] ?? 0;

$select_query = "select * from `produit_taille` where `id_produit` = '$id'";
$result_size = mysqli_query($con, $select_query);

$size = $_GET['size'] ?? mysqli_fetch_assoc($result_size)['taille'];
$result_size = mysqli_query($con, $select_query);

$select_query = "select * from `produit_taille` where `id_produit` = '$id' and `taille` = '$size'";
$id_produit_taille = mysqli_fetch_assoc(mysqli_query($con, $select_query))['id'];


$select_query = "select * from `stock_taille` where `id_produit_taille` = '$id_produit_taille'";
$result_stock = mysqli_query($con, $select_query);


$deliveryDays = 10;
$bestseller = 'Bestseller!';

$sold = 3015;

$qtt = 1;


if (isset($_POST['add_to_cart'])){
    echo $qtt;
}

 //todo à changer
    function changeSize($newSize){
        $size = $newSize;
    }
?>
<form method="post">
<section class="devProductPage"  style="height: 900px; min-height: 900px">
    <div class="mainProductContainer">
        <div class="centerProductContainer">
            <div class="left">
                <div class="imgCont">
                    <img src="img/product/<?php echo $image[$image_nb] ?>" class="mainImg">
                    <div class="otherImagesCont">
                        <?php
                        $im = 0;
                        foreach ($image as $i){

                                ?>
                                <a href="index.php?product=<?=$id?>&size=<?=$size?>&image=<?=$im?>"><img src="img/product/<?php echo $i ?>"></a>
                        <?php
                            $im++;
                            }
                        ?>

                    </div>
                </div>
            </div>
            <div class="right">
                <div class="productTitle">
                    <h2><?php echo $title?></h2>
                </div>
                <div class="currentSize">
                    <p>Taille actuelle</p>
                    <p><?php echo $size?></p>
                </div>
                <div class="productPrice">
                    <p><?php echo $price?>€</p>
                </div>
                <h3>Tailles disponibles</h3>
                <div class="sizeSelectCont">
                    <?php
                    while ($row = mysqli_fetch_assoc($result_size)) {
                        $size = $row['taille'];
                        ?>
                        <a href="index.php?product=<?=$id?>&size=<?=$size?>&image=<?=$image_nb?>"><?=$size?></a>
                    <?php
                    }
                    ?>

                </div>
                <h3> Quantité</h3>
                <div>
                    <div class="qtySelectCont">
                        <label>
                            <select name="qty" id="productQtySelector">
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
                        <p> Plus que&nbsp;</p><p><?=$qstock?></p><p>&nbsp;paires disponibles.</p>
                    </div>
                    <div class="addToCartCont">
                        <button inputmode="submit" name="add_to_cart">Ajouter au panier</button>
                    </div>
                    <div class="descriptionCont">
                        <h3>Description</h3>
                        <p><?php echo $desc;
                        ?></p>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
    </div>
</section>
</form>