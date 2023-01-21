<?php
session_start();

if (!isset($_SESSION['client'])){
    header("Location: index.php?login");
    die();
}

$id_client = $_SESSION['client'];

$result = mysqli_query($con, "SELECT * FROM client WHERE id='$id_client'");
$row = mysqli_fetch_assoc($result);

$prenom = $row['prenom'];
$admin = $row['admin'];

?>

<section  style="height: 900px; min-height: 900px">
    <div class="mainBoardCont">
        <div class="centerBoardCont">
            <div class="left">
                <h3> Bonjour <?=$prenom?></h3>
                <a href="?orders">Historique des commandes</a>
                <a href="?disconnect"> Se déconnecter </a>

            </div>

            <?php if ($admin){

            ?>
            <div class="right">
                <a href="admin_dashboard/index.php">page admin</a>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
