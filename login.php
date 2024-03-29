<?php
session_start();
require('includes/connect_client.php');

if (isset($_SESSION['client'])){
    include ('board.php');
}
else{

    if (isset($_GET['forgotPass'])){
        include ('forgotPass.php');
    }
    else{



    if (isset($_POST['create_account'])) {

        $first_name = $_POST['customerLogFirstName'];
        $last_name = $_POST['customerLogLastName'];
        $mail_client = $_POST['customerLogEmail'];

        $password = $_POST['customerLogPassword'];
        $password = hash("sha256", $password);

        $select_query = "select * from `client` where email='$mail_client'";
        $result_select = mysqli_query($con, $select_query);

        if (mysqli_num_rows($result_select) > 0) {
            echo "Déjà inscrit";
        } else {
            $insert_query = "insert into `client` (nom, prenom, email, mdp) values ('$last_name', '$first_name', '$mail_client', '$password')";
            $result = mysqli_query($con, $insert_query);
            if ($result) {



                $select_query = "select `id` from `client` where email='$mail_client'";
                $result_select = mysqli_query($con, $select_query);
                $row = mysqli_fetch_assoc($result_select);

                $id_client = $row['id'];

                $_SESSION['client'] = $id_client;

                $insert_query = "insert into `panier` (id_client) values ('$id_client')";
                $result = mysqli_query($con, $insert_query);

                header("Location: index.php?login");
                die();
            }
        }
    }

    else if (isset($_POST['login'])) {

        $mail_client = $_POST['customerLogEmail'];

        $password = $_POST['customerLogPassword'];
        $password = hash("sha256", $password);

        $select_query = "select `mdp`, `id` from `client` where email='$mail_client'";
        $result_select = mysqli_query($con, $select_query);

        $row = mysqli_fetch_assoc($result_select);

        if ($row['mdp'] == $password) {
            $_SESSION['client'] = $row['id'];
            header("Location: index.php?login");
            die();

        } else {
            echo 'Identifiants incorrects';

        }
    }

?>


<section class="devConnexion">
    <div class="mainConnexionCont">
        <div class="centerConnexionCont">
            <div class="left">
                <form action="" method="post">
                    <h3>Déja client ?</h3>
                    <label id="customerLogEmail">Email</label>
                    <input autocomplete="email" name="customerLogEmail" type="email" placeholder="exemple@lababouce.com" required>
                    <label name="customerLogPassword">Mot de passe</label>
                    <input autocomplete="password" name="customerLogPassword" type="password" placeholder="Mot de passe" required>
                    <a href="?login&forgotPass">Mot de passe oublié</a>
                    <button inputmode="submit" name="login">Connexion</button>
                </form>
            </div>
            <div class="right">
                <form action="" method="post">
                    <h3>Nouveau client ?</h3>
                    <label name="customerLogFirstName">Prénom</label>
                    <input autocomplete="off" name="customerLogFirstName" type="firstname" placeholder="Mylène" required>
                    <label name="customerLogLastName">Nom</label>
                    <input autocomplete="off" name="customerLogLastName" type="lastname" placeholder="Micoton" required>
                    <label name="customerLogEmail">Email</label>
                    <input autocomplete="off" name="customerLogEmail" type="email" placeholder="exemple@lababouce.com" required>
                    <label name="customerLogPassword">Mot de passe</label>
                    <input autocomplete="new-password" name="customerLogPassword" type="password" placeholder="Mot de passe" required>

                    <button inputmode="submit" name="create_account">Créer un compte</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
}
}
?>