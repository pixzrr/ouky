<?php
session_start();

$user = $_SESSION['user'];
$content = $_POST['id'];

$sql_user_id = 'SELECT id FROM user WHERE username LIKE "%'.$user.'%";';

include '../../../inc/database.php';

$u_id = $connexion->query($sql_user_id);

foreach ($u_id AS $u){
    $user_id = $u['id'];
}

$sql = 'DELETE FROM likes WHERE id_catalogue='.$content.' AND id_user='.$user_id.' ;';

if($connexion -> query($sql)){
    header('Location:likes.php');
} else {
    header('Location:../erreur.php');
}
?>