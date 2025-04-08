<?php
session_start();

if(!empty($_POST['username']) && !empty($_POST['password'])){
    $user = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['password']);

    $sql = 'SELECT * FROM user WHERE username LIKE "%'.$user.'%";';

    include '../../inc/database.php';

    $verif = $connexion -> query($sql);


    $pass_verif = 0;
    foreach ($verif AS $v){
        $pass_verif = $v['password'];

        if ($pass === $pass_verif){
            if ($v['admin'] === 1){
                $_SESSION['admin'] = 'admin';

                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;

                header("location:../admin/admin_panel.php");
            } else {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            header("location:../../../index.php");
            }
        } else {
            $_SESSION['connexion_error'] = "Login ou mot de passe incorrect.";
            header("location:connexion.php");
        }
    }
    if($pass_verif === 0){
        $_SESSION['connexion_error'] = "Login ou mot de passe incorrect.";
        header("location:connexion.php");
    }
} else {
    $_SESSION['connexion_error'] = "Veuillez renseigner tous les champs du formulaire.";
    header("location:connexion.php");
}