<?php
session_start();

$id_client = $_SESSION['client'];

$data = mysqli_query($con, "SELECT * FROM client WHERE idClient='$id_client'");
$data = $data->fetch_row();

$prenom = $data['prenom'];

?>

<section  style="height: 900px; min-height: 900px">
    <div class="mainBoardCont">
        <div class="centerBoardCont">
            <div class="left">
                <h3> Bonjour $prenom</h3>
                <a href="?orders">Historique des commandes</a>
                <a href="?disconnect"> Se déconnecter </a>

            </div>
            <div class="right">
                <a href="admin_dashboard/index.php">page admin</a>
            <div>

            </div>
            </div>
</section>

<?php
if(isset($_GET['disconnect'])) {
    $_SESSION['client'] = null;

    $home="index.php";
    echo "<script type='text/javascript'>document.location.href='{$home}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $home . '">';
}
?>
