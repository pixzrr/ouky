<?php
session_start();
define("ROOT", "/devweb/");
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ouky - Accueil</title>
        <meta name="description" content="Ouky - Streaming des meilleures créations du moment">
        <meta name="author" content="Ouky entertaintement">
        <link rel="shortcut icon" href="<?= ROOT ?>assets/images/tv.png">
        <meta charset="utf-8">
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= ROOT ?>assets/css/style.css">
        <link rel="stylesheet" href="<?= ROOT ?>assets/css/mobile.css">
    </head>
    <body>
        <header>
            <div>
                <img src="<?= ROOT ?>assets/images/align-justify.png" alt="voir plus">
                <a href="<?= ROOT ?>index.php"><h1>Ouky</h1></a>
            </div>
            <form action="<?= ROOT ?>assets/pages/recherche.php" method="get">
                <input type="search" name="search" placeholder="Rechercher film ou série...">
                <input type="submit" value="Rechercher">
            </form>

            <?php
        if (!empty($_SESSION['admin'])) {
                ?>
                <div class="admin">
                <a href="<?= ROOT ?>assets/pages/admin_panel.php">Admin</a>
                </div>
                <?php
            } else if (!empty($_SESSION['user']) && !empty($_SESSION['pass'])) {
                ?>
                <div class="profile">
                    <a href="<?= ROOT ?>/assets/pages/profil.php"><img src="<?= ROOT ?>assets/images/user-round.png" alt="profil"></a>
                </div>
                <?php
            } else {
                ?>
            <p>
                <a href="<?= ROOT ?>assets/pages/connexion.php">Se connecter</a>
                <a href="<?= ROOT ?>assets/pages/inscription.php">S'inscrire</a>
            </p><?php
            }
            ?>
        </header>