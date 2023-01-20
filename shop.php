<?php
session_start();
require('includes/connect_client.php');



//$price;
//$brand;
//$color;


?>


<div class="searcher">
    <div class="searcherPart">
        <form action="" method="post">
            <h3>Prix</h3>
            <label class="selector">
                <select name="price" id="price">
                    <option value="all">Tout</option>
                    <option value="-20€">20€ et moins</option>
                    <option value="20-50">20€ à 50€</option>
                    <option value="50-100">50€ à 100€</option>
                    <option value="100-200">100€ à 200€</option>
                    <option value="200+">200€ et plus</option>
                </select>
            </label>
    </div>
    <div class="searcherPart">
        <h3>Marque</h3>
        <label class="selector">
            <select id="brand" name="brand">
                <option value="all">Tout</option>
                <?php
                $select_query = "select * from `marque`";
                $result_select = mysqli_query($con, $select_query);
                while($row = mysqli_fetch_array($result_select)) {
                    ?>
                    <option value="<?php echo $row['id']; ?>">
                        <?php echo $row['nom']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </label>
    </div>


    <div class="searcherPart">
        <h3>Couleur</h3>
        <label class="selector">
            <select id="coulor" name="coulor">
                <option value="all">Tout</option>
                <?php
                $select_query = "SELECT couleur FROM `produit` GROUP by couleur;";
                $result_select = mysqli_query($con, $select_query);
                while($row = mysqli_fetch_array($result_select)) {
                    ?>
                    <option value="<?php echo $row[0]; ?>">
                        <?php echo $row[0]; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </label>
    </div>
    <div class="searcherPart">
        <button type="submit" name="filter">Rechercher</button>
    </div>

    </form>
</div>
<section  class="product">
    <?php
    $select_query = "select * from `produit`";

    $result_select = mysqli_query($con, $select_query);
    if (isset($_POST['filter'])){
        while($row = mysqli_fetch_array($result_select)) {
            if (filter($row['id'])){
                buildProductCard($row['id']);
            }


        }
        }
    else{
        while($row = mysqli_fetch_array($result_select)) {
            buildProductCard($row['id']);;
        }
    }


    function filter($id){
        $filterPrice = false;
        $filterBrand = false;
        $filterColor = false;

        echo "testing filter";

        $select_query = "select  `p`.prixPublique, `p`.image, `p`.titre, `pv`.nb_vendu from `produit` p, `produit_vendu` pv where `p`.id = '$id' and `pv`.`id_produit` = '$id'";

        $result_select = mysqli_query($con, $select_query);
        echo "ici";
        $row = mysqli_fetch_array($result_select);
        $price = $row['prixPublique'];
        $brand = $row['marque'];
        $color = $row['color'];


        if ($_POST['price'] == null){
            echo "NULLLL";
            $_POST['price'] = 'all';
        }

        echo " sumbited price ".$_POST['price'];



        switch($_POST['price'] ){
            case "all":
                $filterPrice = true;
                echo "all";
                break;
            case "-20":
                $filterPrice = $price < 20;
                break;
            case "20-50":
                $filterPrice = $price >= 20 && $price <= 50;
                break;
            case "50-100":
                $filterPrice = $price >= 50 && $price <= 100;
                break;
            case "100-200":
                $filterPrice = $price >= 100 && $price <= 200;
                break;
            case "200+":
                $filterPrice = $price >= 200;
                break;
        }
        echo "affter switch";

        if ($_POST['brand'] == "all") {
            $filterBrand = true;
        } else {
            $filterBrand = $_POST['brand'] == $brand;
        }

        if ($_POST['color'] == "all") {
            $filterColor = true;
        } else {
            $filterColor = $_POST['color'] == $color;
        }


        return $filterPrice && $filterBrand && $filterColor;
    }



    ?>


</section>