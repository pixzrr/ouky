<?php
session_start();
define("ROOT", "/devweb/");
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ouky</title>
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
            <section>
                <img src="<?= ROOT ?>assets/images/align-justify.png" alt="dérouler le menu" id="boutton">  <!--id pour le js-->
                <a href="<?= ROOT ?>index.php"><h1>Ouky</h1></a>
            </section>
            <form action="<?= ROOT ?>assets/pages/recherche.php" method="get">
                <input type="search" name="search" placeholder="Rechercher film ou série...">
                <input type="submit" value="Rechercher">
            </form>
            <?php
            if (!empty($_SESSION['admin'])) {
                ?>
                <div class="profile">
                    <a href="<?= ROOT ?>assets/pages/admin/admin_panel.php"><img src="<?= ROOT ?>assets/images/shield-user.png" alt="admin panel"></a>
                </div>
                <?php
            } else if (!empty($_SESSION['user']) && !empty($_SESSION['pass'])) {
                ?>
                <div class="profile">
                    <a href="<?= ROOT ?>/assets/pages/user/profil.php"><img src="<?= ROOT ?>assets/images/user-round.png" alt="profil"></a>
                </div>
                <?php
            } else {
                ?>
            <p>
            <a href="<?= ROOT ?>assets/pages/connexion/connexion.php">Se connecter</a>
            <a href="<?= ROOT ?>assets/pages/inscription/inscription.php">S'inscrire</a>
            </p><?php
            }
            ?>
        </header>
        <nav id="">
        <section id="mobile_search">
                <article>
                    <form action="<?= ROOT ?>assets/pages/mobile_recherche.php" method="get">
                        <input type="image" src="<?= ROOT ?>assets/images/search.png" alt="barre de recherche" id="loupe">
                        <label for="loupe">Rechercher</label>
                    </form>
                </article>
            </section>
            <!--Pour tous-->
            <section>
                <a href="<?= ROOT ?>index.php">
                    <article>
                        <img src="<?= ROOT ?>assets/images/house.png" alt="Accueil">
                        <p>Accueil</p>
                    </article>
                </a>
                <a href="<?= ROOT ?>assets/pages/tous/films.php">
                    <article>
                        <img src="<?= ROOT ?>assets/images/clapperboard.png" alt="voir tous les films">
                        <p>Films</p>
                    </article>
                </a>
                <a href="<?= ROOT ?>assets/pages/tous/series.php">
                    <article>
                        <img src="<?= ROOT ?>assets/images/film.png" alt="voir toutes les séries">
                        <p>Séries</p>
                    </article>
                </a>
                <a href="<?= ROOT ?>assets/pages/tous/derniers_ajouts.php">
                    <article>
                        <img src="<?= ROOT ?>assets/images/copy-plus.png" alt="voir les derniers ajouts">
                        <p>Derniers ajouts</p>
                    </article>
                </a>
            </section>

            <!--User connecté-->
            <?php
            if (!empty($_SESSION['user']) && !empty($_SESSION['pass'])) { ?>
            <section>
                <a href="<?= ROOT ?>assets/pages/user/profil.php">
                    <article>
                        <img src="<?= ROOT ?>assets/images/user-circle.png" alt="voir tous les films">
                        <p>Profil</p>
                    </article>
                </a>
            </section>
            <?php } ?>

            <!--Pour tous-->
            <section>
                <a href="<?= ROOT ?>assets/pages/annonce.php">
                    <article>
                        <img src="<?= ROOT ?>assets/images/megaphone.png" alt="voir tous les films">
                        <p>Annonces</p>
                    </article>
                </a>
            </section>

            <section>
                <a href="<?= ROOT ?>assets/pages/infos.php">
                    <article>
                        <img src="<?= ROOT ?>assets/images/clapperboard.png" alt="voir tous les films">
                        <p>À propos</p>
                    </article>
                </a>
                <a href="<?= ROOT ?>assets/pages/mentions_legales.php">
                    <article>
                        <img src="<?= ROOT ?>assets/images/clapperboard.png" alt="voir tous les films">
                        <p>Mentions légales</p>
                    </article>
                </a>
                <a href="<?= ROOT ?>assets/pages/confidentialite.php">
                    <article>
                        <img src="<?= ROOT ?>assets/images/clapperboard.png" alt="voir tous les films">
                        <p>Confidentialité</p>
                    </article>
                </a>
            </section>
        </nav>
