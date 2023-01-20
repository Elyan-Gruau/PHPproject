<?php
include('../includes/connect.php');
if (isset($_POST['insert_product_size'])){

    $product_id = $_POST['$product_id'];
    $product_size = $_POST['size'];

    $select_query = "select * from `produit_taille` where id_produit='$product_id' and taille='$product_size'";
    $result_select = mysqli_query($con, $select_query);
    if(mysqli_num_rows($result_select)>0){
        echo "Il y est déjà bouffon";
    }
    else{
        $insert_query="insert into `produit_taille` (`id_produit`, `taille`) values ('$product_id', '$product_size')";
        $result = mysqli_query($con, $insert_query);

        $result_id = mysqli_query($con, $select_query);
        $product_size_id = mysqli_fetch_assoc($result_id)['id'];

        $insert_query="insert into `stock_taille` (`id_produit_taille`, `stock`) values ('$product_size_id', 0)";
        $result_stock = mysqli_query($con, $insert_query);

        if ($result){



            echo "Taille ajoutée !";
        }
    }


}
?>
<div><button><a href="index.php?manage_product_size">Taille</a></button></div>

<form action="" method="post">
    <div>
        <select id="$product_id" name="$product_id">
            <?php
            $select_query = "select id, titre from `produit`";
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
        <input type="text" placeholder="taille" name="size" required>

    </div>
    <div>
        <input type="submit" name="insert_product_size" value="Ajouter taille">
    </div>

</form>


<table>
    <thead>
    <tr>
        <?php
        $result = mysqli_query($con, "SELECT `p`.titre, `taille` FROM `produit_taille`, `produit` p where `p`.`id`=`id_produit` order by `p`.id");
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