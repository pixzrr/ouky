<?php include '../inc/top.php'; ?>
        <main>
            <h2>S'inscrire</h2>
            <h3>Bienvenue parmis nous !</h3>
            
            <form action="../pages/i_traitement.php" method="post" enctype="multipart/form-data">
                <input type="text" name="username" placeholder="Nom d'utilisateur" maxlength="15">
                <input type="password" name="password" placeholder="Mot de passe" minlength="15" maxlength="75">
                <input type="password" name="c_password" placeholder="Confirmer le mot de passe" minlength="15" maxlength="75">
                <input type="submit" value="S'inscrire">
            </form>
        </main>
<?php include '../inc/bottom.php'; ?>