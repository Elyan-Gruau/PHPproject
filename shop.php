<?php
require('includes/connect_client.php');
?>


<div class="searcher">
    <div class="searcherPart">
        <h3>Prix</h3>
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
    </div>
    <div class="searcherPart">
        <h3>Marque</h3>
    </div>
    <div class="searcherPart">
        <h3>Couleur</h3>
    </div>
    <div class="searcherPart">
        <button>Rechercher</button>
    </div>


</div>
<section  class="product">
    <?php
    $select_query = "select * from `produit`";

    $result_select = mysqli_query($con, $select_query);

    while($row = mysqli_fetch_array($result_select)) {
        buildProductCard($row['id']);
    }
    ?>


</section>