<?php
define('DNS', 'mysql:host=localhost;dbname=etudiantdb');
define('USER', 'root');
define('PASS', '');

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
