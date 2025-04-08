<?php include '../../inc/top.php'; ?>
        <main id="wideview">
            <h2>S'inscrire</h2>
            <h3>Bienvenue à bord !</h3>

            <?php
            if(!empty($_SESSION['inscription_error'])){
                echo '<p id="message">'.$_SESSION['inscription_error'].'</p>';
            }
            ?>
            
            <form action="i_traitement.php" method="post" enctype="multipart/form-data">
                <input type="text" name="username" placeholder="Nom d'utilisateur" maxlength="15">
                <input type="password" name="password" placeholder="Mot de passe" minlength="10" maxlength="75">
                <input type="password" name="c_password" placeholder="Confirmer le mot de passe" minlength="10" maxlength="75">
                <input type="submit" value="S'inscrire">
            </form>
        </main>
<?php include '../../inc/bottom.php';
unset($_SESSION['inscription_error']);
?>