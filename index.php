<?php
include('functions.php');
//$con=mysql_connect("localhost","root","","ecom");
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
        <link rel="stylesheet" href="css/connexionStyle.css">
        <link rel="stylesheet" href="css/cartReviewStyle.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monsterrat">
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="img/logo.png">
    </head>
    <body>
        <nav>
            <a  href="/" class="logoNavCont">
                <div >
                    <img id="logoText" src="img/logoText.png" alt="logoText">
                </div>
            </a>
            <a href="http://" ><img id="cart" src="img/cart.png" alt="Cart"> </a>
            <a href="http://" ><img id="connexion" src="img/profile.png" alt="profile"></a>
            <a href="http://" class="categories">Chaussons</a>
            <a href="http://" class="categories">Sac à dos</a>


        </nav>
        <div class="searcher">
            <h2>Filtre</h2>
            <h3>Prix
                <label class="selector">
                    <select name="Prix" id="prix">
                        <option value="all">Tout</option>
                        <option value="-20€">Moins de 20€</option>
                        <option value="20-50">20€ à 50€</option>
                        <option value="50-100">50€ à 100€</option>
                        <option value="100-200">100€ à 200€</option>
                        <option value="200+">200€ et plus</option>
                    </select>
                </label>
            </h3>




            <button>Rechercher</button>

        </div>
        <section  class="product">
            <div class="card">
                <img src="img/Test1.jpg" alt="image">
                <div class="cont1">
                    <p class="price">19.99€</p>
                    <p class="BestSeller">Bestseller!</p>

                </div>
                <div class="cont2">
                    <p class="title">The Royalty</p>
                    <p class="sold">3015 sold</p>
                    <p class="shipping">Shipping in 10 business days</p>
                </div>
            </div>
            <div class="card">
                <img src="img/Test1.jpg" alt="image">
                <div class="cont1">
                    <p class="price">19.99€</p>
                    <p class="BestSeller">Bestseller!</p>

                </div>
                <div class="cont2">
                    <p class="title">The Royalty</p>
                    <p class="sold">3015 sold</p>
                    <p class="shipping">Shipping in 10 business days</p>
                </div>
            </div>
            <div class="card">
                <img src="img/Test1.jpg" alt="image">
                <div class="cont1">
                    <p class="price">19.99€</p>
                    <p class="BestSeller">Bestseller!</p>

                </div>
                <div class="cont2">
                    <p class="title">The Royalty</p>
                    <p class="sold">3015 sold</p>
                    <p class="shipping">Shipping in 10 business days</p>
                </div>
            </div>
            <div class="card">
                <img src="img/Test1.jpg" alt="image">
                <div class="cont1">
                    <p class="price">19.99€</p>

                </div>
                <div class="cont2">
                    <p class="title">The Royalty</p>
                    <p class="sold">3015 sold</p>
                    <p class="shipping">Shipping in 10 business days</p>
                </div>
            </div>
            <div class="card">
                <img src="img/Test1.jpg" alt="image">
                <div class="cont1">
                    <p class="price">19.99€</p>
                    <p class="BestSeller">Bestseller!</p>

                </div>
                <div class="cont2">
                    <p class="title">The Royalty</p>
                    <p class="sold">3015 sold</p>
                    <p class="shipping">Shipping in 10 business days</p>
                </div>
            </div>
            <div class="card">
                <img src="img/Test1.jpg" alt="image">
                <div class="cont1">
                    <p class="price">19.99€</p>
                    <p class="BestSeller">Bestseller!</p>

                </div>
                <div class="cont2">
                    <p class="title">The Royalty</p>
                    <p class="sold">3015 sold</p>
                    <p class="shipping">Shipping in 10 business days</p>
                </div>
            </div>
            <?php  buildProductCard("p12") ?>
            <?php  buildProductCard("p15") ?>



        </section>
        

  
      

      
      


    </body>
    <footer>
        <p>
            BROCOLI SoftGames ©
            GRUAU Elyan MAHÉ Jules
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
