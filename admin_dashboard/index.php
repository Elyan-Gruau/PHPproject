<html>
    <head>
        <link rel="stylesheet" href="../css/adminStyle.css"
        <link rel="stylesheet" href="../css/general.css"
    </head>
    <form action="" method="post" class="top">
        <div>
            <a href="index.php?manage_brand">Nouvelle marque</a>
            <a href="index.php?manage_product">Produits</a>
            <a href="index.php?manage_stock">Stocks</a>
            <a href="index.php?manage_fournisseur">Nouveau fournisseur</a>
            <a href="index.php?see_orders">Voir commandes</a>
            <a href="index.php?see_clients">Voir clients</a>
            <a href="index.php?see_sales">Voir ventes</a>
             <a href="../index.php?board"> Retour </a>
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
        if(isset($_GET['see_sales'])){
            include('see_sales.php');
        }
        if(isset($_GET['manage_product_size'])){
            include('manage_product_size.php');
        }

        ?>
    </div>
</html>
