<?php

require_once './header.php';
require_once './database.php';

$sql = 'SELECT * FROM etudiant';
$req = request($sql);
$etudiants = recover($req, false);

$xml = PROLOGUE;
$xml = $xml . '<etudiants>';
if ($etudiants != null && sizeof($etudiants)) {
    foreach ($etudiants as $key => $etudiant) {
        $xml = $xml . etudiantToXML($etudiant);
    }
}
$xml = $xml . '</etudiants>';

echo $xml;
