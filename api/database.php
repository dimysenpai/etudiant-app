<?php
define('DNS', 'mysql:host=localhost;dbname=etudiantdb');
define('USER', 'root');
define('PASS', '');
define('PROLOGUE', '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>');

function getConnect()
{
    $pdo = new PDO(DNS, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function request($sql, $params = null)
{
    $pdo = getConnect();
    $req = $pdo->prepare($sql);
    if ($params == null) {
        $req->execute();
    } else {
        $req->execute($params);
    }

    return $req;
}

function recover($req, $one = true)
{
    $datas = null;
    $req->setFetchMode(PDO::FETCH_OBJ);
    if ($one == true) {
        $datas = $req->fetch();
    } else {
        $datas = $req->fetchAll();
    }
    return $datas;
}

function getMessage($status, $content)
{
    $xml = PROLOGUE;
    $xml = $xml . '<message>';
    $xml = $xml . '<status>';
    $xml = $xml . $status;
    $xml = $xml . '</status>';
    $xml = $xml . '<content>';
    $xml = $xml . $content;
    $xml = $xml . '</content>';
    $xml = $xml . '</message>';

    return $xml;
}

function etudiantToXML($etudiant)
{
    $xml = '';
    $xml = $xml . '<etudiant id="' . $etudiant->idetudiant . '">';
    $xml = $xml . '<matricule>';
    $xml = $xml . $etudiant->matricule;
    $xml = $xml . '</matricule>';
    $xml = $xml . '<nom>';
    $xml = $xml . $etudiant->nom;
    $xml = $xml . '</nom>';
    $xml = $xml . '<telephone>';
    $xml = $xml . $etudiant->telephone;
    $xml = $xml . '</telephone>';
    $xml = $xml . '</etudiant>';

    return $xml;
}
