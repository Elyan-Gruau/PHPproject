<?php
session_start();
require('includes/connect_client.php');

if (isset($_POST['create_account'])) {

    $mail_client = $_POST['customerLogEmail'];

    $password = $_POST['customerLogPassword'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $select_query = "select * from `client` where email='$mail_client'";
    $result_select = mysqli_query($con, $select_query);

    if (mysqli_num_rows($result_select) > 0) {
        $insert_query = "UPDATE `client` SET `mdp` = '$password' WHERE `client`.`email` = '$mail_client';";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "Mot de passe modifié !";
        }
    }
    else{
        echo "Pas de compte";
    }
}

?>


<div class="right">
    <form action="" method="post">
        <h3>Mot de passe oublié ?</h3>
        <label name="customerLogEmail">Email</label>
        <input autocomplete="off" name="customerLogEmail" type="email" placeholder="exemple@labaouce.com" required>
        <label name="customerLogPassword">Nouveau mot de passe</label>
        <input autocomplete="new-password" name="customerLogPassword" type="password" placeholder="Mot de passe" required>

        <button inputmode="submit" name="reset_password">Soumettre</button>

    </form>
</div>
