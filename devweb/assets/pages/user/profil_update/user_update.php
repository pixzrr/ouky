<?php 
session_start();
include '../../../inc/database.php';
if(isset($_POST['username'])){

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $id = htmlspecialchars($_POST['id']);

    $sql = "UPDATE user SET username='$username' , password='$password' WHERE id=$id";

    if($connexion -> query($sql)){
        $_SESSION['connexion_error'] = 'Modifications enregistrées';
        header('location:../../connexion/connexion.php');
    }
};