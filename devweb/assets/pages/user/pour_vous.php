<?php include '../../inc/top.php';
    $sql_category = 'SELECT category FROM catalogue ORDER BY category;';
    include '../../inc/database.php';
    $reponse = $connexion->query($sql_category);

    $compteur1 = 0;

    foreach ($reponse AS $r){
        $compteur1++;
        echo '<h3>'.$r['category'].'</h3>';
    }
 ?>
<main>
    <h2>Pour vous :</h2>
    <section id="all_content">

</section>
</main>
<aside id="">
    <img id="view_less" src="../../images/x.png" alt="obligatoire">
    <img src="../../images/suzume.jpeg" alt="obligatoire">

    <h2 id="titre">TITRE<h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae placeat architecto, sequi eligendi itaque exercitationem aperiam nulla doloribus cupiditate nisi ut non quae, saepe, consectetur dolorum! Placeat repellendus culpa hic?</p>
</aside>
<?php include '../../inc/bottom.php'; ?>