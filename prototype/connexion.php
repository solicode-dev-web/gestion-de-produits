<?php
$host='localhost';
$dbname='cuisine_db';
$username='root';
$password='Timouu2008';
try{
    $pdo=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8" , $username , $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Erreur de connexion : " .$e->getMessage();
}