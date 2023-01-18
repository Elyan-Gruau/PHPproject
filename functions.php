<?php
function pr($arr){
    echo '<pre>';
    print_r($arr);
}

function buildCard(){

}

function buildProductDetail($id){
    global $dtm;
    return include("productDetail.php");
}

function buildProductCard($id){
    //todo rajouter l'id du produit, la fonction genère tout à partir de ça.
    return include("productCard.php");
}

function buildCart(){

}

$oldP = "";
if (isset($_GET['product'])!=$oldP){

    $oldP=isset($_GET['product']);
    echo buildProductDetail(isset($_GET['product']));
}


?>
