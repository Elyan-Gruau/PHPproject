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
    <?php  buildProductCard("p1") ?>
    <?php  buildProductCard("p2") ?>
    <?php  buildProductCard("p3") ?>
    <?php  buildProductCard("p4") ?>
    <?php  buildProductCard("p5") ?>
    <?php  buildProductCard("p6") ?>
    <?php  buildProductCard("p7") ?>
    <?php  buildProductCard("p8") ?>
    <?php  buildProductCard("p9") ?>
    <?php  buildProductCard("p10") ?>
    <?php  buildProductCard("p11") ?>
    <?php  buildProductCard("p12") ?>
    <?php  buildProductCard("p15") ?>

</section>