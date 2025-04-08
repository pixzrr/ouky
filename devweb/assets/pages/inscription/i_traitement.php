<?php
session_start();

if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['c_password'])){
    if($_POST['password'] == $_POST['c_password']){

    $user = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['password']);

    include '../../inc/database.php';

    // Vérifier si le pseudo existe déjà
    $sql_check = 'SELECT username FROM user WHERE username LIKE "%'.$user.'%";';
    $check = $connexion->query($sql_check);
    $user_exists = 0;

    foreach ($check AS $c){
        $user_exists = $c['username'];
        if ($user_exists != 0){
            $_SESSION['inscription_error'] = "Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
            header("location:inscription.php");
        }
    }
    if ($user_exists === 0){
        $sql = "INSERT INTO user (username, password) VALUES ('$user', '$pass');";

        // Test d'ajout
    
            if($connexion -> query($sql)){
    
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                
                header("location:../../../index.php");
            } else {
                header("location:../erreur.php");
            }
    }
    } else {
        $_SESSION['inscription_error'] = "Les mots de passe ne correspondent pas.";
        header("location:inscription.php");
    }
} else {
    $_SESSION['inscription_error'] = "Veuillez renseigner tous les champs.";
    header("location:inscription.php");
}
?>