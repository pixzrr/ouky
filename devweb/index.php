<?php
include 'assets/inc/top.php';
$sql_series = 'SELECT * FROM catalogue WHERE type="serie" LIMIT 5;';
$sql_films = 'SELECT * FROM catalogue WHERE type="movie" LIMIT 5;';
include 'assets/inc/database.php';
$serie = $connexion->query($sql_series);
$film = $connexion->query($sql_films);
?>
<main id="">
    <!--Bannière-->
        <img id="bannière" src="assets/images/classroom.webp" alt="assassination classroom">

    <?php 
        if(!empty($_SESSION['user'])){
            echo "<h2>Bienvenue ".$_SESSION['user']."</h2>";
        } ?>
    

    <h3>Les séries du moment :</h3>
        <!--Séries du moment-->
    <section>
    <?php
        foreach($serie AS $s):
        ?>

        <article id="s<?= $s['id']; ?>">
        <div id="overflow">
            <img src="uploads/<?= $s['logo'] ?>" alt="<?= $s['nom'] ?>">
            </div>
            <p><?= $s['year'] ?></p>
            <p><?= $s['nom'] ?></p>

            <div>
                <p id="card_genre"><?= $s['category'] ?></p>
                <!--Catégorie : film ou série?-->
                <p><?= $s['type'] ?></p>
            </div>
        </article>
        <?php endforeach; ?>
</section>






<h3>Les films du moment :</h3>
        <!--Films du moment-->
    <section>
    <?php
        foreach($film AS $f):
        ?>

        <article id="s<?= $s['id']; ?>">
        <div id="overflow">
            <img src="uploads/<?= $f['logo'] ?>" alt="<?= $f['nom'] ?>">
            </div>
            <p><?= $f['year'] ?></p>
            <p><?= $f['nom'] ?></p>

            <div>
                <p id="card_genre"><?= $f['category'] ?></p>
                <!--Catégorie : film ou série?-->
                <p><?= $f['type'] ?></p>
            </div>
        </article>
        <?php endforeach; ?>
</section>
</main>







<?php
    $aside = $connexion->query($sql_series);

    foreach($aside AS $a):
    ?>
<aside>

    <div id="view_less">
        <img src="assets/images/chevron-left.png" alt="obligatoire pour le SEO et pour l'accessibilité">
    </div>

    <section>
        <div id="overflow">
            <img src="uploads/<?= $a['logo'] ?>" alt="<?= $a['nom'] ?>">
        </div>

        <?php
            if (!empty($_SESSION['user'])){
            $sql_user_id = 'SELECT id FROM user WHERE username LIKE "%'.$_SESSION['user'].'%";';
            $u_id = $connexion->query($sql_user_id);
            foreach ($u_id AS $u){
                $user_id = $u['id'];
            }

            $sql_like_test = 'SELECT id_catalogue FROM likes WHERE id_user LIKE '.$user_id.' AND id_catalogue LIKE '.$a['id'].';';
            $l_test = $connexion->query($sql_like_test);
            $like_test = 0; // un id commence par 1, donc pas de contenu avec un id à 0, donc pas de conflit potentiel avec un contenu ayant un id à 0
            foreach ($l_test AS $l){
                $like_test = $l['id_catalogue'];
            }
            

            if ($like_test == $a['id']){ ?>
                <form action="assets/pages/user/likes/likes_remove.php" method="post">
                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                    <input type="image" id="heart" src="assets/images/heart_full.png" alt="obligatoire">
                </form>
            <?php } else { ?>
                <form action="assets/pages/user/likes/likes_add.php" method="post">
                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                    <input type="image" id="heart" src="assets/images/heart.png" alt="obligatoire">
                </form>
                <?php } }?>

                

        <p><?= $a['nom'] ?></p>

        <p><?= $a['year'] ?></p>
        <p><?= $a['category'] ?></p>

        <p><?= $a['synopsis'] ?></p>

        <form action="assets/pages/contenu.php" method="get">
            <input type="hidden" name="id" value="<?= $a['id'] ?>">
            <input type="submit" value="Voir plus">
        </form>
    </section>
</aside>
<?php endforeach;?>















<?php
    $aside = $connexion->query($sql_films);

    foreach($aside AS $a):
    ?>
<aside>

    <div id="view_less">
        <img src="assets/images/chevron-left.png" alt="obligatoire">
    </div>

    <section>
        <div id="overflow">
            <img src="uploads/<?= $a['logo'] ?>" alt="<?= $a['nom'] ?>">
        </div>

        <?php
            if (!empty($_SESSION['user'])){
            $sql_user_id = 'SELECT id FROM user WHERE username LIKE "%'.$_SESSION['user'].'%";';
            $u_id = $connexion->query($sql_user_id);
            foreach ($u_id AS $u){
                $user_id = $u['id'];
            }

            $sql_like_test = 'SELECT id_catalogue FROM likes WHERE id_user LIKE '.$user_id.' AND id_catalogue LIKE '.$a['id'].';';
            $l_test = $connexion->query($sql_like_test);
            $like_test = 0; // un id commence par 1, donc pas de contenu avec un id à 0, donc pas de conflit potentiel avec un contenu ayant un id à 0
            foreach ($l_test AS $l){
                $like_test = $l['id_catalogue'];
            }
            

            if ($like_test == $a['id']){ ?>
                <form action="assets/pages/user/likes/likes_remove.php" method="post">
                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                    <input type="image" id="heart" src="assets/images/heart_full.png" alt="obligatoire">
                </form>
            <?php } else { ?>
                <form action="assets/pages/user/likes/likes_add.php" method="post">
                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                    <input type="image" id="heart" src="assets/images/heart.png" alt="obligatoire">
                </form>
                <?php } }?>

                

        <p><?= $a['nom'] ?></p>

        <p><?= $a['year'] ?></p>
        <p><?= $a['category'] ?></p>

        <p><?= $a['synopsis'] ?></p>

        <form action="assets/pages/contenu.php" method="get">
            <input type="hidden" name="id" value="<?= $a['id'] ?>">
            <input type="submit" value="Voir plus">
        </form>
    </section>
</aside>
<?php endforeach;?>
<?php include 'assets/inc/bottom.php'; ?>