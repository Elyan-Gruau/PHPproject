<?php
session_start();
require('includes/connect_client.php');

if (isset($_POST['reset_password'])) {
    echo "la";
    $mail_client = $_POST['customerLogEmail'];
    echo "la";
    $password = $_POST['customerLogPassword'];
    echo "la";
    $password = hash("sha256", $password);
    echo "la";

    $select_query = "select * from `client` where email='$mail_client'";
    echo "la";
    $result_select = mysqli_query($con, $select_query);
    echo "la";

    if (mysqli_num_rows($result_select) > 0) {
        echo "la";
        $insert_query = "UPDATE `client` SET `mdp` = '$password' WHERE `client`.`email` = '$mail_client';";
        $result = mysqli_query($con, $insert_query);
        echo "la";
        if ($result) {

            echo "la";
            $select_query = "select `id` from `client` where email='$mail_client'";
            $result_select = mysqli_query($con, $select_query);
            echo "la";
            $row = mysqli_fetch_assoc($result_select);

            echo "la";
            $id_client = $row['id'];

            $_SESSION['client'] = $id_client;
        }
        else{
            echo "no";
        }

    }
    else{
        echo "pas de compte";
    }

}

?>

<div class="mainForgotCont">
    <div class="centerForgotCont">
        <div class="formCont">
            <form action="" method="post">
                <h3>Mot de passe oublié ?</h3>
                <label name="customerLogEmail">Email</label>
                <input autocomplete="off" name="customerLogEmail" type="email" placeholder="exemple@lababouce.com" required>
                <label name="customerLogPassword">Nouveau mot de passe</label>
                <input autocomplete="new-password" name="customerLogPassword" type="password" placeholder="Mot de passe" required>
                <a href="?login">Mot de passe remémoré</a>

                <button inputmode="submit" name="reset_password">Soumettre</button>

            </form>
        </div>
    </div>
</div>

