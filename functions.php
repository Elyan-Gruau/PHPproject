<?php

function pr($arr){
    echo '<pre>';
    print_r($arr);
}

function buildCard(){

}

function buildProductDetail($id,$price){
    return include("productDetail.php");
}

function buildProductCard($id){
    //todo rajouter l'id du produit, la fonction genère tout à partir de ça.
    return include("productCard.php");
}

function buildCart(){
    return include("cart.php");
}

function buildLogin(){
    return include("login.php");
}

function buildShop(){
    return include("shop.php");
}
function buildBoard(){
    return include("board.php");
}

function getAllInfoFromProduct($id){
    //todo faire une map qui à toute les info du produit
    //Prix
    //Array de string des des tailles dispobiles
    //String livraison
}

function buildHome(){
    return include("home.php");
}

$oldP = "";
if (isset($_GET['product'])!=$oldP){
    $oldP=isset($_GET['product']);
    echo buildProductDetail(isset($_GET['product']),229.99);
}

else if (isset($_GET['cart'])){
    echo buildCart();
}

else if (isset($_GET['login'])){
    echo buildLogin();
}

else if (isset($_GET['shop'])){
    echo buildShop();
}

else if (isset($_GET['board'])){
    echo buildBoard();
}
else {
    echo buildHome();
}


?>
