<?php

function get_bdd(){
    $db_name = $_ENV['DB_NAME'];
    $hostname = $_ENV['DB_HOST'];
    $user = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASS'];

    $dsn = "mysql:host=$hostname;dbname=$db_name;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $password);

    return $pdo;
}

function get($sql, $params = []) {
    $bdd = get_bdd();
    $stmt = $bdd->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCount($sql, $params = []) {
    $result = get($sql, $params);
    if (empty($result)) {
        return 0;
    }
    $firstRow = $result[0];
    return (int)reset($firstRow);
}

function ins_upd_del($sql, $params) {
    $bdd = get_bdd();
    $stmt = $bdd->prepare($sql);
    return $stmt->execute($params);
}

function insert($sql, $params = []) {
    return ins_upd_del($sql, $params);
}

function update($sql, $params = []) {
    return ins_upd_del($sql, $params);
}

function delete($sql, $params = []) {
    return ins_upd_del($sql, $params);
}