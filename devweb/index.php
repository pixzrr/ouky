<?php
include 'assets/inc/top.php'; ?>
<main id="">
    <!--Bannière-->
    <article>
        <img id="bannière" src="assets/images/classroom.webp" alt="assassination classroom">
        <section>
            <p>Date de sortie</p>
        </section>
    </article>

    <?php 
        if(!empty($_SESSION['user'])){
            echo "<h2>Bienvenue ".$_SESSION['user']."</h2>";
        } ?>
    
    <section>
        <!--Modèle de carte de film / série-->
        <article>
            <div id="overflow">
            <img src="assets/images/carrousel/img-2.jpg" alt="jsp mais faut remplir">
            </div>

            <p>2025</p>
            <!--Police spéciale à prévoir pour le titre-->
            <p id="card_title">Titre</p>
            <!--Jsp si on met le genre (drame, thriller, etc) ou la note du film ou de la série-->
            <div>
                <p id="card_genre">thriller</p>
                <!--Catégorie : film ou série?-->
                <p>serie</p>
            </div>
        </article>
    </section>
</main>
<aside id="">
    <img id="view_less" src="assets/images/x.png" alt="obligatoire">
    <img src="assets/images/suzume.jpeg" alt="obligatoire">

    <h2 id="titre">TITRE<h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae placeat architecto, sequi eligendi itaque exercitationem aperiam nulla doloribus cupiditate nisi ut non quae, saepe, consectetur dolorum! Placeat repellendus culpa hic?</p>
</aside>
<?php include 'assets/inc/bottom.php'; ?>