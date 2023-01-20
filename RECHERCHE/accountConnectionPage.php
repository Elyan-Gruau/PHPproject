<?php
    session_start();

    if(isset($_SESSION['client'])) {
        header("Location: accountPage.php");
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
    <div class="connexion">
        <h2>Se connecter</h2>
        <form name="connexion" action="accountConnexion.php" method="post">
            <p> Identifiant : <input type="text" required="required" name="identifiant"></p>
            <p> Mot de passe : <input type="password" required="required" name="mdp"></p>
            <input type="submit">
        </form>
    </div>
    <div class="create">
        <h2>Créer un compte</h2>
        <form name="creation" action="accountCreation.php" method="post">
            <p> Nom : <input type="text" required="required" name="nom"></p>
            <p> Prenom : <input type="text" required="required" name="prenom"></p>
            <p> Email : <input type="email" required="required" name="email"></p>
            <p> Identifiant : <input type="text" required="required" name="identifiant"></p>
            <p> Mot de passe : <input type="password" required="required" name="mdp"></p>
            <input type="submit">
        </form>
    </div>
</body>
</html>
