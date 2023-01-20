<form action="" method="post">
    <div>
        <button><a href="index.php?manage_brand">Nouvelle marque</a></button>
        <button><a href="index.php?manage_product">Produits</a></button>
        <button><a href="index.php?manage_stock">Stocks</a></button>
        <button><a href="index.php?manage_fournisseur">Nouveau fournisseur</a></button>
        <button><a href="index.php?see_orders">Voir commandes</a></button>
        <button><a href="index.php?see_clients">Voir clients</a></button>

    </div>
</form>
<div>
<?php
    if(isset($_GET['manage_brand'])){
        include('manage_brand.php');
    }
    if(isset($_GET['manage_product'])){
        include('manage_product.php');
    }
    if(isset($_GET['manage_stock'])){
        include('manage_stock.php');
    }
    if(isset($_GET['manage_fournisseur'])){
        include('manage_fournisseur.php');
    }
    if(isset($_GET['see_orders'])){
        include('see_orders.php');
    }
    if(isset($_GET['see_clients'])){
        include('see_clients.php');
    }
if(isset($_GET['manage_product_size'])){
    include('manage_product_size.php');
}
    ?>
    </div>