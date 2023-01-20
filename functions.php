<?php

function pr($arr){
    echo '<pre>';
    print_r($arr);
}

function buildCard(){

}

function buildProductDetail($id){
     include("productDetail.php");
}

function buildProductCard($id){
    //todo rajouter l'id du produit, la fonction genère tout à partir de ça.
     include("productCard.php");
}

function buildCart(){
     include("cart.php");
}

function buildLogin(){
     include("login.php");
}

function buildShop(){
     include("shop.php");
}
function buildBoard(){
     include("board.php");
}

function buildCartItem($id){

}

function buildHome(){
     include("home.php");
}

$oldP = "";
if (isset($_GET['product'])!=$oldP){
    $oldP=$_GET['product'];
    buildProductDetail($_GET['product']);
}

else if (isset($_GET['cart'])){
    buildCart();
}

else if (isset($_GET['login'])){
    buildLogin();
}

else if (isset($_GET['shop'])){
     buildShop();
}

else if (isset($_GET['board'])){
    buildBoard();
}
else {
    buildHome();
    buildShop();
}


?>
