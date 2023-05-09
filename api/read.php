<?php

$id = $_GET['idetudiant'];

require_once './header.php';
require_once './database.php';

$sql = 'SELECT * FROM etudiant WHERE idetudiant  =?';
$params = array($id);
$req = request($sql, $params);
$etudiant = recover($req, true);

$xml = PROLOGUE;
$xml = $xml . '<etudiants>';
$xml = $xml . etudiantToXML($etudiant);
$xml = $xml . '</etudiants>';

echo $xml;
