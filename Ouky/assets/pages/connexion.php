<?php include '../inc/top.php'; ?>
        <main>
            <h2>Se connecter</h2>
            <h3>Heureux de vous revoir !</h3>
            
            <form action="../pages/c_traitement.php" method="post" enctype="multipart/form-data">
                <input type="text" name="username" placeholder="Nom d'utilisateur" maxlength="15">
                <input type="password" name="password" placeholder="Mot de passe" maxlength="75">
                <input type="submit" value="Se connecter">
            </form>
        </main>
<?php include '../inc/bottom.php'; ?>