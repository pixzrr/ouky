<?php include '../inc/top.php'; ?>
<main>
    <h3>Résultats pour :
<?php
include "../inc/database.php";
$sql = $connexion -> query('SELECT nom FROM catalogue ORDER BY id DESC');
if(isset($_GET['search']) && !empty($_GET['search'])){

    $recherche = htmlspecialchars($_GET['search']);
    echo $_GET['search']."</h3>";

    $sql = 'SELECT nom FROM catalogue WHERE nom LIKE "%'.$recherche.'%" ORDER BY id DESC;';

    $resultat = $connexion->query($sql);

    echo '<ul>';
    while($r = $resultat->fetch()){
        echo "<li>".$r['nom']."</li>";
    }
    echo "</ul>";
} else {
    $sql;
}
?>
</main>
<?php include '../inc/bottom.php'; ?>