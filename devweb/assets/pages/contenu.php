<?php include '../inc/top.php';

$id =  $_SESSION['content_id'];

$sql = 'SELECT * FROM catalogue WHERE id="'.$id.'";';
include '../inc/database.php';
$contenu = $connexion->query($sql);
?>
<main id="wideview" class="content_main">

<?php
foreach ($contenu AS $c){?>
    <img id="content_bg" src="../../uploads/<?=$c['logo'] ?>">

    <video controls src="../videos/test.mp4" type="video/mp4"></video>

    <h2><?= $c['nom']?></h2>
<?php } ?>

</main>
<?php include '../inc/bottom.php'; ?>