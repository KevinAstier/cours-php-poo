<?php

function getPdo(){
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', 'Humans31!', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}