<?php
include('../includes/connect.php');
if (isset($_POST['insert_brand'])){

    $brand_name = $_POST['brand'];
    $select_query = "select * from `marque` where nom='$brand_name'";
    $result_select = mysqli_query($con, $select_query);
    if(mysqli_num_rows($result_select)>0){
        echo "Il y est déjà bouffon";
    }
    else{
        $insert_query="insert into `marque` (nom) values ('$brand_name')";
        $result = mysqli_query($con, $insert_query);
        if ($result){
            echo "Marque ajoutée !";
        }
    }

}
?>

<form action="" method="post">
    <div>
        <input type="text" placeholder="marque" name="brand">
    </div>
    <div>
        <input type="submit" name="insert_brand" value="Ajouter marque">
    </div>
</form>

<table>
    <thead>
    <tr>
        <?php
        $result = mysqli_query($con, "SELECT * FROM `marque` order by id");
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