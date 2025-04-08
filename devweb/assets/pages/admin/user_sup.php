<?php
if (isset($_POST['id'])){

    $x = $_POST['id'];

    include "../../inc/database.php";

    $sql = "DELETE FROM user WHERE id=$x";

    if($connexion -> query($sql)){
        header("location:admin_panel.php");
    } else {
        header("location:erreur.php");
    }
} else {
    echo "non";
}
?>