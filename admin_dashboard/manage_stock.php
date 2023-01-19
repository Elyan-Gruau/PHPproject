<?php
include('../includes/connect.php');
if (isset($_POST['insert_product'])){

    $product_id = $_POST['product_id'];
    $stock = $_POST['stock'];



    $insert_query="insert into `Stock` (`id_produit`, `stock`) values ('$product_id', '$stock')";
    $result = mysqli_query($con, $insert_query);
    if ($result){
        echo "Stock ajouté !";
    }

}
?>

<form action="" method="post">
    <div>
        <select id="product_id" name="product_id">
            <?php
            $select_query = "select * from `produit`";
            $result_select = mysqli_query($con, $select_query);
            while($row = mysqli_fetch_array($result_select)) {
                ?>
                <option value="<?php echo $row['id']; ?>">
                    <?php echo $row['titre']; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <input type="text" placeholder="quantité" name="stock" required>
    </div>
    <div>
        <input type="submit" name="insert_product" value="Valider stock">
    </div>

</form>

<table>
    <thead>
    <tr>
        <?php
        $result = mysqli_query($con, "SELECT `p`.id, `p`.titre, `stock` FROM `Stock`, `produit` p where `p`.`id`=`id_produit` order by `p`.id");
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

