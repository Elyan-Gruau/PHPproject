<?php
session_start();
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/general.css">
        <link rel="stylesheet" href="css/card.css">
        <link rel="stylesheet" href="css/productStyle.css">
        <link rel="stylesheet" href="css/loginStyle.css">
        <link rel="stylesheet" href="css/cartReviewStyle.css">
        <link rel="stylesheet" href="css/userBoardStyle.css">
        <link rel="stylesheet" href="css/homeStyle.css">
        <link rel="stylesheet" href="css/forgotStyle.css">
        <link rel="preload" href="font/Castellar.tff" as="font" type="font/tff" crossorigin>
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
        </nav>
    </body>
    <footer>

        <div class="footerCont">
            <div class="footerTitle">
                <h4>
                    BROCOLI SoftGames ©
                    GRUAU Elyan - MAHÉ Jules
                </h4>
            </div>
            <div class="footerPart">
                <p> Log Admin</p>
                <ul>
                    <li>
                        <a href="index.php?login">amin@admin.com </a>
                    </li>
                    <li>
                        <a href="index.php?login">admin</a>
                    </li>
                </ul>
            </div>
            <div class="footerPart">
                <p>Github</p>
                <ul>
                    <li>
                        <a href="https://github.com/Elyan-Gruau">Elyan</a>
                    </li>
                    <li>
                        <a href="https://github.com/Sclus">Jules</a>
                    </li>
                    <li>
                        <a href="https://github.com/Elyan-Gruau/PHPproject">Le projet</a>
                    </li>
                </ul>
            </div>
            </div>
    </footer>
</html>
