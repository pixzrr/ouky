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

$sql = 'INSERT INTO ouky.view (id_user, id_catalogue) VALUES ('.$user_id.','.$content.');';

if($connexion -> query($sql)){
    $_SESSION['content_id'] = $content;
    header('Location:../../contenu.php');
} else {
    header('Location:../erreur.php');
}
?>