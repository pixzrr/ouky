<?php
define('SERVER', 'mysql:server=localhost; dbname=ouky');
define('USER', 'root');
define('PASS', '');

$connexion = new PDO(SERVER, USER, PASS);
?>