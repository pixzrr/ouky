<?php include '../inc/top.php'; ?>
<main>
    <?php echo "<h2>Bienvenue ".$_SESSION['user']."</h2>"; ?>
    <h3>Mes informations :</h3>

    <a class="deconexion" href="../pages/s_destroy.php">Se déconnecter</a>
</main>
<?php include '../inc/bottom.php'; ?>