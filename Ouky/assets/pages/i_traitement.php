<?php
session_start();
if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['c_password'])){
    if($_POST['password'] == $_POST['c_password']){

    $user = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['password']);

    include '../inc/database.php';

    // Vérifier si le pseudo existe déjà
    $sql_check = 'SELECT username FROM user WHERE username LIKE "%'.$user.'%";';
    $check = $connexion->query($sql_check);
    $user_exists = $check->fetchColumn();

    if ($user_exists > 0) {
        echo "Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
    } else {

    $sql = "INSERT INTO user (username, password) VALUES ('$user', '$pass');";

    $sql_vu = 'SELECT username FROM user WHERE username LIKE "%'.$user.'%";';
    $sql_vp = 'SELECT password FROM user WHERE password LIKE "%'.$pass.'%";';

    $connexion -> query($sql);


    $v_user = $connexion -> query($sql_vu);
    $v_pass = $connexion -> query($sql_vp);

    $ru = $v_user->fetch();
    $rp = $v_pass->fetch();

        if ($ru['username'] === $user && $rp['password'] === $pass){

            // session cookie
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            header("location:../../index.php");
        } else {
            header("location:../pages/erreur.php");
        }

    }
    } else {
        echo "mdp ne correspondent pas";
    }
} else {
    echo "veullez renseigner tous les champs";
}
?>