<?php
include('../includes/connect.php');
?>

<table>
    <thead>
    <tr>
        <?php
        $result = mysqli_query($con, "SELECT `pv`.id_produit, `p`.titre, `pv`.nb_vendu FROM `produit_vendu` pv, `produit` p where `pv`.id_produit = `p`.id order by id_produit");
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
