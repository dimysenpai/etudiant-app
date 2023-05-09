<?php

require_once './header.php';
require_once './database.php';

$matricule = $_POST['matricule'];
$nom = $_POST['nom'];
$telephone = $_POST['telephone'];

$sql = 'INSERT INTO etudiant SET matricule=?, nom=?, telephone';
$params = array($matricule, $nom, $telephone);
request($sql, $params);
echo getMessage('success', 'Insertion reussie !');
