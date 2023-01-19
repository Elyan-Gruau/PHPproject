<?php
include('functions.php');
//$con=mysql_connect("localhost","root","","ecom");

$homeurl = 'index.php';
$homepage = "/";
$currentpage = $_SERVER['REQUEST_URI'];

if($currentpage == $homepage or $currentpage == 'index.php') {
    header('Location: '.'index.php?shop');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>La Babouce*</title>
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/general.css">
        <link rel="stylesheet" href="css/card.css">
        <link rel="stylesheet" href="css/productStyle.css">
        <link rel="stylesheet" href="css/loginStyle.css">
        <link rel="stylesheet" href="css/cartReviewStyle.css">
        <link rel="stylesheet" href="css/userBoardStyle.css">
        <link rel="stylesheet" href="css/homeStyle.css">
        <link rel="preload" href="font/Castellar.woff2" as="font" type="font/woff2" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monsterrat">
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="img/logo.png">
    </head>
    <body>
        <nav>
            <a  href="index.php?home" class="logoNavCont">
                <div >
                    <img id="logoText" src="img/logoText.png" alt="logoText">
                </div>
            </a>
            <a href="index.php?cart" ><img id="cart" src="img/cart.png" alt="Cart"> </a>
            <a href="index.php?login" ><img id="connexion" src="img/profile.png" alt="profile"></a>
            <a href="index.php?shop" class="categories">Chaussons</a>
            <a href="index.php?board" class="categories">DebugUserBoard</a>
        </nav>

    </body>
    <footer>
        <p>
            BROCOLI SoftGames ©
            GRUAU Elyan - MAHÉ Jules
        </p>
        <ul>
            <li>
                <a>Condition d'utilisations</a>
            </li>
            <li>
                <a>Our Team</a>
            </li>
            <li>
                <a href="https://www.flaticon.com/">Icons used</a>
            </li>
        </ul>
        <p> Contact</p>
        <ul>
            <li>
                <a href="https://www.flaticon.com/">mail</a>
            </li>
            <li>
                <a href="https://www.flaticon.com/">0612458798</a>
            </li>
            <li>
                <a href="https://www.flaticon.com/">Instagram</a>
            </li>
            <li>
                <a href="https://www.flaticon.com/">Linkedin</a>
            </li>
        </ul>
    </footer>
</html>
