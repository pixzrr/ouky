<?php include '../../inc/top.php'; ?>
        <main id="wideview">
            <h2>Se connecter</h2>
            <h3>Heureux de vous revoir !</h3>

            <?php
            if(!empty($_SESSION['connexion_error'])){
                echo '<p id="message">'.$_SESSION['connexion_error'].'</p>';
            }
            ?>
            
            <form action="c_traitement.php" method="post" enctype="multipart/form-data">
                <input type="text" name="username" placeholder="Nom d'utilisateur" maxlength="15">
                <input type="password" name="password" placeholder="Mot de passe" maxlength="75">
                <input type="submit" value="Se connecter">
            </form>
        </main>
<?php include '../../inc/bottom.php';
unset($_SESSION['connexion_error']);
?>