<?php include '../../inc/top.php';
    $sql_user_id = 'SELECT id FROM user WHERE username LIKE "%'.$_SESSION['user'].'%";';

    include '../../inc/database.php';

    $u_id = $connexion->query($sql_user_id);

    foreach ($u_id AS $u){
        $user_id = $u['id'];
    }

    $sql_view = 'SELECT * FROM view
    INNER JOIN user ON view.id_user = user.id
    INNER JOIN catalogue ON view.id_catalogue = catalogue.id
    WHERE id_user='.$user_id.'
    ORDER BY view.id DESC;';

    $views = $connexion->query($sql_view);
?>
<main>

    <img id="pfp" src="../../images/user-round.png" alt="photo de profil">

    <table id="profile_table">
        <thead>
            <tr>
                <th><a id="profile_selected" href="profil.php">Activité</a></th>
                <th><a href="likes/likes.php">Aimé</a></th>
                <th><a href="profil_update/profil_edit.php"><img class="pfp" src="../../images/settings.png" alt="photo de profil"></a></th>
            </tr>
        </thead>
        <tbody>
            <td colspan="3">
            <section id="all_content">


            <?php
        foreach($views AS $v):
        ?>
            <article>
        <div id="overflow">
            <img src="../../../uploads/<?= $v['logo'] ?>" alt="<?= $v['nom'] ?>">
            </div>
            <p><?= $v['year'] ?></p>
            <p><?= $v['nom'] ?></p>

                    <div>
                    <p id="card_genre"><?= $v['category'] ?></p>
                    <!--Catégorie : film ou série?-->
                    <p><?= $v['type'] ?></p>
                    </div>
                    </div>
                    </article>
                    <?php endforeach; ?>





                </section>
            </td>
        </tbody>

    </table>

</main>





<?php
    $aside = $connexion->query($sql_view);

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
            $sql_user_id = 'SELECT id FROM user WHERE username LIKE "%'.$_SESSION['user'].'%";';
            $u_id = $connexion->query($sql_user_id);
            foreach ($u_id AS $u){
                $user_id = $u['id'];
            }

            $sql_like_test = 'SELECT id_catalogue FROM likes WHERE id_user LIKE '.$user_id.' AND id_catalogue LIKE '.$a['id_catalogue'].';';
            $v_test = $connexion->query($sql_like_test);
            $view_test = 0; // un id commence par 1, donc pas de contenu avec un id à 0, donc pas de conflit potentiel avec un contenu ayant un id à 0
            foreach ($v_test AS $v){
                $view_test = $v['id_catalogue'];
            }
            

            if ($view_test == $a['id_catalogue']){ ?>
                <form action="likes_remove.php" method="post">
                    <input type="hidden" name="id" value="<?= $a['id_catalogue'] ?>">
                    <input type="image" id="heart" src="../../images/heart_full.png" alt="obligatoire">
                </form>
            <?php } else { ?>
                <form action="likes_add.php" method="post">
                    <input type="hidden" name="id" value="<?= $a['id_catalogue'] ?>">
                    <input type="image" id="heart" src="../../images/heart.png" alt="obligatoire">
                </form>
                <?php } ?>

                

        <p><?= $a['nom'] ?></p>

        <p><?= $a['year'] ?></p>
        <p><?= $a['category'] ?></p>

        <p><?= $a['synopsis'] ?></p>

        <form action="../contenu.php" method="get">
            <input type="hidden" name="id" value="<?= $a['id_catalogue'] ?>">
            <input type="submit" value="Voir plus">
        </form>
    </section>
</aside>
<?php endforeach; ?>
<?php include '../../inc/bottom.php'; ?> 