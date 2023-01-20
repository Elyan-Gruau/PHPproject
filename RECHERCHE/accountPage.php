<?php
    session_start();

    function createPage() {
        $con = mysqli_connect("localhost","rs104082","Minabasi23","rs104082_PHP");

        $id = $_SESSION['client'];

        $data = mysqli_query($con, "SELECT * FROM client WHERE idClient='$id'");
        $data = $data->fetch_row();

        $nom = $data[1];
        $identifiant = $data[4];

        return <<<HTML
            <h1> Bonjour $identifiant</h1>
            <a href="?deco" style="color: red"> Se déconnecter ! </a>
            HTML;
    }
?>

<html>
<head>
    <title> SITE DE VENTE </title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <a href="index.php"><img src="assets/LOGOLINE.png" class="logo"></a>
        <a href="cartPage.php"><img src="assets/cart.png" style="float: right" class="icon"></a>
        <a href="accountConnectionPage.php"><img src="assets/account.png" style="float: right" class="icon"></a>
    </header>
    <?php echo createPage() ?>
</body>
</html>

<?php
    if(isset($_GET['deco'])) {
        $_SESSION['client'] = null;

        $URL="index.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
?>
