<?php include '../../inc/top.php';
    $sql_filtre = 'SELECT * FROM catalogue WHERE type="movie";';
    include '../../inc/database.php';
    $films = $connexion->query($sql_filtre);
 ?>
<main>
    <h2>Tous les films :</h2>
    <section>
        <?php
        foreach($films AS $f):
        ?>

        <article>
        <div id="overflow">
            <img src="../../../uploads/<?= $f['logo'] ?>" alt="<?= $f['nom'] ?>">
            </div>
            <p><?= $f['year'] ?></p>
            <p><?= $f['nom'] ?></p>

            <div>
                <p id="card_genre"><?= $f['category'] ?></p>
                <!--Catégorie : film ou série?-->
                <p><?= $f['type'] ?></p>
            </div>
            </div>
        </article>
        <?php endforeach; ?>
</section>
</main>



<?php
    $aside = $connexion->query($sql_filtre);

    foreach($aside AS $a):
    ?>
<aside>

    <div id="view_less">
        <img src="../../images/chevron-left.png" alt="obligatoire">
    </div>

    <section>
        <div id="overflow">
            <img src="../../../uploads/<?= $a['logo'] ?>" alt="<?= $a['nom'] ?>">
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
                <form action="../user/likes/likes_remove.php" method="post">
                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                    <input type="image" id="heart" src="../../images/heart_full.png" alt="obligatoire">
                </form>
            <?php } else { ?>
                <form action="../user/likes/likes_add.php" method="post">
                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                    <input type="image" id="heart" src="../../images/heart.png" alt="obligatoire">
                </form>
                <?php } }?>

                

        <p><?= $a['nom'] ?></p>

        <p><?= $a['year'] ?></p>
        <p><?= $a['category'] ?></p>

        <p><?= $a['synopsis'] ?></p>

        <?php if (!empty($_SESSION['user'])){ ?>
            <form action="../user/views/view_add.php" method="post">
        <?php } else { ?>
            <form action="../contenu.php" method="post">
        <?php } ?>
            <input type="hidden" name="id" value="<?= $a['id'] ?>">
            <input type="submit" value="Voir plus">
        </form>
    </section>
</aside>
<?php endforeach;?>
<?php include '../../inc/bottom.php'; ?>