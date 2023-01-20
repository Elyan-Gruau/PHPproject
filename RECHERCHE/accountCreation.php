<?php
    session_start();

    $con = mysqli_connect("localhost","rs104082","Minabasi23","rs104082_PHP");

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $identifiant = $_POST['identifiant'];
    $mdp = $_POST['mdp'];

    $res = mysqli_query($con, "SELECT * FROM client WHERE identifiant='$identifiant'");
    $res = $res->fetch_row();

    if($res == null) {
        mysqli_query($con, "INSERT INTO client VALUES (0, '$nom', '$prenom', '$email', '$identifiant', '$mdp')");

        $data = mysqli_query($con, "SELECT * FROM client WHERE identifiant='$identifiant'");
        $data = $data->fetch_row();

        $_SESSION['client'] = $data[0];

        header("Location: accountPage.php");
        die();
    }

    else {
        echo '<script>alert("Identifiant existant")</script>';
        header("Location: accountConnectionPage.php");
        die();
    }




?>
