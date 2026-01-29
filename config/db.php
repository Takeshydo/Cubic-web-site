<?php


$host = "mysql:host=localhost;dbname=database;charset=utf8";
$user = "root";
$password = "";

try{
    $db = new PDO($host, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connection réussi";
} catch(PDOException $e) {
    die("Erreur de connexion");
}