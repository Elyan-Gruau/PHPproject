<?php
include('../includes/connect.php');
if (isset($_POST['insert_fournisseur'])) {

    $fournisseur = $_POST['fournisseur'];
    $mail_fournisseur = $_POST['mail_fournisseur'];
    $select_query = "select * from `fournisseur` where nom='$fournisseur'";
    $result_select = mysqli_query($con, $select_query);

    if (mysqli_num_rows($result_select) > 0) {
        echo "Fournisseur déjà présent";
    } else {
        $insert_query = "insert into `fournisseur` (nom, email) values ('$fournisseur', '$mail_fournisseur')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "Fournisseur ajouté !";
        }
    }
}
?>

<form action="" method="post">
    <div>
        <input type="text" placeholder="fournisseur" name="fournisseur" required>
        <input type="email" placeholder="fournisseur@mail.com" name="mail_fournisseur" required>
    </div>
    <div>
        <input type="submit" name="insert_fournisseur" value="Ajouter fournisseur">
    </div>
</form>

<table>
    <thead>
    <tr>
        <?php
        $result = mysqli_query($con, "SELECT * FROM `fournisseur` order by id");
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