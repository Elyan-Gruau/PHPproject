<?php
include('includes/connect_client.php');

session_start();

$id_client = $_SESSION['client'];
?>

<table>
    <thead>
    <tr>
        <?php
        $result = mysqli_query($con, "SELECT * FROM `facturation` where `id_client` = '$id_client' order by id DESC");
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


