<?php
session_start();
if(!empty($_POST['type']) && !empty($_POST['nom']) && !empty($_POST['year']) && !empty($_POST['author'])&& !empty($_POST['category']) && !empty($_POST['synopsis']) && !empty($_FILES['logo']['tmp_name'])){

    $name = htmlspecialchars($_POST['nom']);
    $type = htmlspecialchars($_POST['type']);
    $year = htmlspecialchars($_POST['year']);
    $author = htmlspecialchars($_POST['author']);
    $category = htmlspecialchars($_POST['category']);
    $synopsis = htmlspecialchars($_POST['synopsis']);

        // Changement du nom du fichier + changement de nom pour éviter les clash
        $logo_basename = pathinfo($_FILES['logo']['name'], PATHINFO_FILENAME); // on récupère le nom de l'image
        $logo_extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION); // pareil pour l'extension
        $new_image = $logo_basename.'-'.date("ymd_his").'.'.$logo_extension;

        include '../../inc/database.php';

        $sql = "INSERT INTO catalogue (nom, type, year, author, category, synopsis, logo) VALUES ('$name', '$type', '$year', '$author', '$category', '$synopsis', '$new_image');";

        if($connexion->query($sql)){
            // on déplace l'image dans le dossier image
            $target_directory = '../../../uploads/';
            $target_path = $target_directory . $new_image;
            // on vérifie si le déplacement a été fait
            if (!move_uploaded_file($_FILES['logo']['tmp_name'], $target_path)){
                $_SESSION['upload_failed'] = "Echec de l'envoi du fichier";
                header('location:admin_panel.php');
            } else {
                header('location:admin_panel.php');
            }
        } else {
            $_SESSION['upload_failed'] = "Echec de la connexion à la base de données";
            header('location:admin_panel.php');
        }

} else {
    $_SESSION['upload_failed'] = "Veuillez renseigner tous les champs du formulaire";
    header('location:admin_panel.php');
}
?>