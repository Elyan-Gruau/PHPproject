<?php
session_start();
include('includes/connect_client.php');

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
                    <div class="cartProduct">
                        <div class="productImage">
                            <img src="img/Test1.jpg" alt="image">
                        </div>

                        <div class="productInformation">
                            <div>
                                <h4>The banana chaussons</h4>
                                <p>Plus que </p>
                                <p>10</p>
                            </div>
                            <div>
                                <p> exemplaires</p>
                                <p>Taille: </p>
                                <p>36-37</p>
                            </div>

                            <label >
                                <select name="qty" id="productQtySelectorCart">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </label>
                        </div>
                        <div class="priceCont">
                            <p>19.99€</p>
                            <a class="deleteFromCart">Supprimer</a>
                        </div>

                    </div>
                </div>

                <div class="cartFooter">
                    <p class="cartTotal">19.99€</p>
                    <p>(2 articles):</p>
                    <p>Sous-total </p>


                </div>
            </div>
            <div class="right">
                <p>Sous-total </p>
                <p>(2 articles): </p>
                <p class="cartTotal">19.99€</p>
                <button class="cartCheckout">Passer la commande</button>
            </div>
        </div>
    </div>
</section>