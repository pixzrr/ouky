<?php
if(!empty($_POST['type']) && !empty($_POST['nom']) && !empty($_POST['year']) && !empty($_POST['author']) && !empty($_POST['synopsis']) && !empty($_FILES['logo'])){

    $name = htmlspecialchars($_POST['nom']);
    $type = htmlspecialchars($_POST['type']);
    $year = htmlspecialchars($_POST['year']);
    $author = htmlspecialchars($_POST['author']);
    $synopsis = htmlspecialchars($_POST['synopsis']);

        // Vérification du fichier uploadé
    $logo_tmp = $_FILES['logo']['tmp_name'];
    $logo_size = $_FILES['logo']['size'];
        
    $logo = file_get_contents($logo_tmp);

    $sql = "INSERT INTO user (nom, type, year, author, synopsis, logo) VALUES ('$type', '$name', '$year', '$author', '$synopsis', '$logo');";

    include '../inc/database.php';

    $connexion -> query($sql);

} else {
    echo "veullez renseigner tous les champs";
}
?>