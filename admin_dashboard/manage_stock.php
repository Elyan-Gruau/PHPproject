<?php
include('../includes/connect.php');
if (isset($_POST['validate_stock'])){

    $product_size_id = $_POST['product_size_id'];
    $stock = $_POST['stock'];

    $select_query = "select * from `stock_taille` where id_produit_taille='$product_size_id'";
    $result_select = mysqli_query($con, $select_query);
    if(mysqli_num_rows($result_select)>0){
        $insert_query="update `stock_taille` set `stock` = '$stock' where `stock_taille`.`id_produit_taille` = '$product_size_id'";
        $result = mysqli_query($con, $insert_query);
        if ($result){
            echo "Stock mis à jour !";
        }
    }
    else{
        $insert_query="insert into `stock_taille` (`id_produit_taille`, `stock`) values ('$product_size_id', '$stock')";
        $result = mysqli_query($con, $insert_query);
        if ($result){
            echo "Stock ajouté !";
        }
    }


}
?>


<form method="post">
    <div>
        <select id="product_id" name="product_id">
            <?php
            $select_query = "select * from `produit`";
            $result_select = mysqli_query($con, $select_query);
            while($row = mysqli_fetch_array($result_select)) {
                ?>
                <option value="<?php echo $row['id']; ?>" <?php if (isset($_POST['choose_product'])){
                    if ($row['id'] == $_POST['product_id']){
                        echo 'selected="true"';};}?>>
                    <?php echo $row['titre']; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <input type="submit" name="choose_product" value="Voir les tailles">
</form>



<?php
if (isset($_POST['choose_product'])){
    $product_id = $_POST['product_id'];
    $select_query = "select `pt`.id, `pt`.`taille` from `produit_taille` pt, `produit` p where `p`.id = `pt`.`id_produit` and `pt`.`id_produit` = '$product_id'";
    $result_select = mysqli_query($con, $select_query);
    ?>
    <form method="post">
        <select id="product_size_id" name="product_size_id">
            <?php

            while($row = mysqli_fetch_array($result_select)) {
                ?>
                <option value="<?php echo $row['id']; ?>">
                    <?php echo $row['taille']; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <input type="text" placeholder="quantité" name="stock" required>
        </div>
        <div>
            <input type="submit" name="validate_stock" value="Valider stock">
        </div>

    </form>
    <?php
}
?>

<table>
    <thead>
    <tr>
        <?php
        $result = mysqli_query($con, "SELECT `pt`.id, `p`.titre, `pt`.taille, `stock` FROM `stock_taille`,`produit_taille` pt, `produit` p where `pt`.`id`=`id_produit_taille` and `p`.`id`=`pt`.`id_produit` order by `p`.id");
        $row = mysqli_fetch_assoc($result);
        foreach ($row as $key => $value) {
            echo "<th>$key</th>";
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    mysqli_data_seek($result, 0);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

