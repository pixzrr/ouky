<?php
session_start();

if(!empty($_POST['username']) && !empty($_POST['password'])){
    if (($_POST['username'] == 'admin') && ($_POST['password'] == 'admin')){
        $_SESSION['admin'] = 'admin';

        header("location:../pages/admin_panel.php");
    } else {
    $user = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['password']);

    $sql_vu = 'SELECT username FROM user WHERE username LIKE "%'.$user.'%";';
    $sql_vp = 'SELECT password FROM user WHERE password LIKE "%'.$pass.'%";';
    include '../inc/database.php';

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
}