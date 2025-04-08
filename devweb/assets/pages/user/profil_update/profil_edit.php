<?php include '../../../inc/top.php';
    $sql = 'SELECT * FROM user WHERE username="'.$_SESSION['user'].'";';
    include '../../../inc/database.php';
    $infos = $connexion->query($sql);
?>
<main id="wideview">
    <?php echo "<h2>Bienvenue ".$_SESSION['user']."</h2>"; ?>

    <h3>Mes informations :</h3>

    <?php
        foreach($infos AS $i):
        ?>
        <form action="user_update.php" method="post" enctype="multipart/form-data">
        <input type="text" name="username" value="<?= $i['username'] ?>" maxlength="15">
        <input type="text" name="password" value="<?= $i['password'] ?>" minlength="10" maxlength="75">
        <input type="hidden" name="id" value="<?= $i['id']?>">
            <input type="submit" value="Mettre à jour">
        </form>
        <?php endforeach; ?>

        <div class="deconnexion">
            <a href="../../deconnexion.php">Se déconnecter</a>
        </div>
</main>
<?php include '../../../inc/bottom.php'; ?>