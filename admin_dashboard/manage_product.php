<?php
include('../includes/connect.php');
if (isset($_POST['insert_product'])){

    $product_brand_nb = $_POST['brand_nb'];
    $product_color = $_POST['color'];
    $product_selling_price = $_POST['selling_price'];
    $product_buying_price = $_POST['buying_price'];
    $product_images = $_POST['images'];
    $product_title = $_POST['title'];
    $product_desc = $_POST['desc'];
    $product_fournisseur_nb = $_POST['fournisseur_nb'];


    $select_query = "select * from `produit` where titre='$product_title'";
    $result_select = mysqli_query($con, $select_query);
    if(mysqli_num_rows($result_select)>0){
        echo "Il y est déjà bouffon";
    }
    else{
        $insert_query="insert into `produit` (`id_marque`, `couleur`, `prixPublique`, `prixAchat`, `image`, `titre`, `descriptif`, `id_fournisseur`) values 
            ('$product_brand_nb', '$product_color', '$product_selling_price', '$product_buying_price', '$product_images', '$product_title', '$product_desc', '$product_fournisseur_nb')";
        $result = mysqli_query($con, $insert_query);
        if ($result){
            echo "Produit ajouté !";
        }
    }


}
?>
<div><button><a href="index.php?manage_product_size">Taille</a></button></div>

<form action="" method="post">
    <div>
        <select id="brand_nb" name="brand_nb">
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
        <input type="text" placeholder="couleur" name="color" required>
        <input type="text" placeholder="prix de vente" name="selling_price" required>
        <input type="text" placeholder="prix d'achat" name="buying_price" required>
        <input type="text" placeholder="images (, )" name="images" required>
        <input type="text" placeholder="titre" name="title" required>
        <input type="text" placeholder="descriptif" name="desc" required>
        <select id="fournisseur_nb" name="fournisseur_nb">
            <?php
            $select_query = "select * from `fournisseur`";
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
    </div>
    <div>
        <input type="submit" name="insert_product" value="Ajouter produit">
    </div>

</form>
<table>
    <thead>
    <tr>
        <?php
        $result = mysqli_query($con, "SELECT * FROM `produit`");
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
