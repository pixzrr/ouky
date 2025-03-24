<?php
if(!empty($_POST['type']) && !empty($_POST['nom']) && !empty($_POST['year']) && !empty($_POST['author']) && !empty($_POST['synopsis']) && !empty($_FILES['logo']['tmp_name'])){

    $name = htmlspecialchars($_POST['nom']);
    $type = htmlspecialchars($_POST['type']);
    $year = htmlspecialchars($_POST['year']);
    $author = htmlspecialchars($_POST['author']);
    $synopsis = htmlspecialchars($_POST['synopsis']);

        // Fichier
        $logo_basename = pathinfo($_FILES['logo']['name'], PATHINFO_FILENAME); // on récupère le nom de l'image
        $logo_extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $new_image = $logo_basename.'-'.date("ymd_his").'.'.$logo_extension;

        include '../inc/database.php';

        $sql = "INSERT INTO catalogue (nom, type, year, author, synopsis, logo) VALUES ('$name', '$type', '$year', '$author', '$synopsis', '$new_image');";

        // on execute et on vérifie si la requête a fonctionné
        if($connexion->query($sql)){
            // on déplace l'image dans le dossier image
            $target_directory = '/Ouky/server_data/images/';
            $target_path = $target_directory . $new_image;
            // on vérifie si le déplacement a été fait
            if (!move_uploaded_file($_FILES['logo']['tmp_name'], $target_path)){
                header("location:../pages/erreur.php?message=er"); // header vers le admin pannel avec un message d'erreur
            }
            header("location:../pages/admin_panel.php?message=ok");
        } else {
            header("location:../pages/erreur.php?message=no");
        }
        $connexion->close(); //on coupe l'acès à la base de données

} else {
    echo "veullez renseigner tous les champs";
}
?>