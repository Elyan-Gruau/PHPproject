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
                <select name="Prix" id="prix">
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
        <button type="sumbit" name="filter">Rechercher</button>
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
        if (isset($_POST['filter'])){
            if($_POST(''))
        }
        return true;
    }
    ?>


</section>