<?php include '../../../inc/top.php';
    $sql_user_id = 'SELECT id FROM user WHERE username LIKE "%'.$_SESSION['user'].'%";';

    include '../../../inc/database.php';

    $u_id = $connexion->query($sql_user_id);

    foreach ($u_id AS $u){
        $user_id = $u['id'];
    }

    $sql_likes = 'SELECT * FROM likes
    INNER JOIN user ON likes.id_user = user.id
    INNER JOIN catalogue ON likes.id_catalogue = catalogue.id
    WHERE id_user='.$user_id.'
    ORDER BY likes.id DESC;';

    $likes = $connexion->query($sql_likes);
?>
<main>

    <img id="pfp" src="../../../images/user-round.png" alt="photo de profil">

    <table id="profile_table">
        <thead>
            <tr>
                <th><a href="../profil.php">Activité</a></th>
                <th><a id="profile_selected" href="likes.php">Aimé</a></th>
                <th><a href="../profil_update/profil_edit.php"><img class="pfp" src="../../../images/settings.png" alt="photo de profil"></a></th>
            </tr>
        </thead>
        <tbody>
            <td colspan="4">
            <section id="all_content">


            <?php
        foreach($likes AS $f):
        ?>
            <article>
        <div id="overflow">
            <img src="../../../../uploads/<?= $f['logo'] ?>" alt="<?= $f['nom'] ?>">
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
            </td>
        </tbody>

    </table>

</main>





<?php
    $aside = $connexion->query($sql_likes);

    foreach($aside AS $a):
    ?>
<aside>

    <div id="view_less">
        <img src="../../../images/chevron-left.png" alt="obligatoire">
    </div>

    <section>
        <div id="overflow">
            <img src="../../../../uploads/<?= $a['logo'] ?>" alt="<?= $a['nom'] ?>">
        </div>

        <?php
            $sql_user_id = 'SELECT id FROM user WHERE username LIKE "%'.$_SESSION['user'].'%";';
            $u_id = $connexion->query($sql_user_id);
            foreach ($u_id AS $u){
                $user_id = $u['id'];
            }

            $sql_like_test = 'SELECT id_catalogue FROM likes WHERE id_user LIKE '.$user_id.' AND id_catalogue LIKE '.$a['id_catalogue'].';';
            $l_test = $connexion->query($sql_like_test);
            $like_test = 0; // un id commence par 1, donc pas de contenu avec un id à 0, donc pas de conflit potentiel avec un contenu ayant un id à 0
            foreach ($l_test AS $l){
                $like_test = $l['id_catalogue'];
            }
            

            if ($like_test == $a['id_catalogue']){ ?>
                <form action="likes_remove.php" method="post">
                    <input type="hidden" name="id" value="<?= $a['id_catalogue'] ?>">
                    <input type="image" id="heart" src="../../../images/heart_full.png" alt="obligatoire">
                </form>
            <?php } else { ?>
                <form action="likes_add.php" method="post">
                    <input type="hidden" name="id" value="<?= $a['id_catalogue'] ?>">
                    <input type="image" id="heart" src="../../../images/heart.png" alt="obligatoire">
                </form>
                <?php } ?>

                

        <p><?= $a['nom'] ?></p>

        <p><?= $a['year'] ?></p>
        <p><?= $a['category'] ?></p>

        <p><?= $a['synopsis'] ?></p>

        <form action="../../contenu.php" method="get">
            <input type="hidden" name="id" value="<?= $a['id_catalogue'] ?>">
            <input type="submit" value="Voir plus">
        </form>
    </section>
</aside>
<?php endforeach; ?>
<?php include '../../../inc/bottom.php'; ?> 