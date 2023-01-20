<?php
    session_start();

    //connexion à la base de données
    $con = mysqli_connect("localhost","rs104082","Minabasi23","rs104082_PHP");


    function product_cart_maker($product, $price, $qte, $path) : String {
        $path = "assets/".$path."main.jpg";
        return <<<HTML
             <div class="productcartbox">
                <img src="$path" class="imgCart">
                <p> $product </p>
                <p> $price € </p>
                <p> $qte </p>
                <a href="?suppr=$product"> Suppr </a>
             </div>        
             HTML;
    }

    function checkout($idClient) : String {
        $con = mysqli_connect("localhost","rs104082","Minabasi23","rs104082_PHP");

        $res = mysqli_query($con, "SELECT * FROM panier WHERE idClient='$idClient'  AND old=0");
        $res->fetch_all();

        $prixHT = 0;
        $prixTTC = 0;

        foreach ($res as $line) {
            $idProduit = $line['idProduit'];
            $data = mysqli_query($con, "SELECT * FROM produit WHERE idProduit='$idProduit'");
            $data = $data->fetch_row();
            $prixHT = $prixHT + (intval($data[4]))*$line['quantiteProduit'];
        }

        $prixTTC = $prixHT+($prixHT*(20/100));
        return <<<HTML
            <p>Prix HT : $prixHT €</p>
            <p>Prix TTC : $prixTTC €</p>
            HTML;
    }
?>

<html>
    <head>
        <title> SITE DE VENTE </title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <header>
            <a href="index.php"><img src="assets/LOGOLINE.png" class="logo"></a>
            <a href="cartPage.php"><img src="assets/cart.png" style="float: right" class="icon"></a>
            <a href="accountConnectionPage.php"><img src="assets/account.png" style="float: right" class="icon"></a>
        </header>
        <div class="allProducts">
            <?php
            $idClient = $_SESSION['client'];
            $res = mysqli_query($con, "SELECT * FROM panier WHERE idClient='$idClient' AND old=0");
            $res->fetch_all();

            foreach ($res as $line) {
                $idProduit = $line['idProduit'];
                $query = "SELECT * FROM produit WHERE idProduit='$idProduit'";
                $resProd = mysqli_query($con, $query);
                $resProd = $resProd->fetch_row();
                echo product_cart_maker($resProd[8], $resProd[4], $line['quantiteProduit'], $resProd[6]);
            }
            ?>
        </div>
        <div class="embrellasRackPlus">
            <div class="embrellasRack">
                <p> Your embrella rack </p>
                <?php echo checkout($_SESSION['client']); ?>
            </div>
            <a href="?checkout= <?php echo $_SESSION['client']; ?>"> <p class="proceed"> PROCEED TO CHECKOUT </p></a>
        </div>
    </body>
</html>

<?php
    function deleteProduct($product) {
        $_GET['suppr'] = null;
        $con = mysqli_connect("localhost","rs104082","Minabasi23","rs104082_PHP");

        $res = mysqli_query($con, "SELECT * FROM produit WHERE titre='$product'");
        $res = $res->fetch_row();

        $idProd = $res[0];
        $idClient = $_SESSION['client'];

        mysqli_query($con, "DELETE FROM panier WHERE idProduit = '$idProd' AND idClient = '$idClient'");

        $URL="cartPage.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }

    function checkoutCart($idClient) {
        $_GET['checkout'] = null;
        $con = mysqli_connect("localhost","rs104082","Minabasi23","rs104082_PHP");

        $res = mysqli_query($con, "select * from panier where old=0 and idClient='$idClient'");
        $res = $res->fetch_row();


        $groupe = $res[6];


        $date = date(DATE_RFC2822);

        $prixHT = 0;

        $res2 = mysqli_query($con, "SELECT * FROM panier WHERE idClient='$idClient' AND old=0");
        $res2->fetch_all();

        foreach ($res2 as $line) {
            $idProduit = $line['idProduit'];
            $data = mysqli_query($con, "SELECT * FROM produit WHERE idProduit='$idProduit'");
            $data = $data->fetch_row();
            $prixHT = $prixHT + (intval($data[4]))*$line['quantiteProduit'];
        }

        $prixTTC = $prixHT+($prixHT*(20/100));


        mysqli_query($con, "update panier set old = 1  WHERE old=0 AND '$idClient'=idClient");
        mysqli_query($con, "insert into facturation values ('$groupe', '$date', '$idClient', '$prixHT', '$prixTTC', 0)");

        $data2 = mysqli_query($con, "SELECT * FROM facturation WHERE idClient='$idClient' AND idGroupe='$groupe'");
        $data2 = $data2->fetch_row();

        $idFact = $data2[5];

        echo $idFact;

        mysqli_query($con, "update panier set idFacturation = '$idFact' WHERE '$groupe'=groupe");

        $URL="cartPage.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }

    if(isset($_GET['suppr'])) {
        deleteProduct($_GET['suppr']);
    }

    if(isset($_GET['checkout'])) {
        checkoutCart($_GET['checkout']);
    }
?>
