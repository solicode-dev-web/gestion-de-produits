<?php
$username='root';
$password='Timouu2008';
$dsn="mysql:host=localhost;dbname=cuisine_db;charset=utf8";

try{
    $pdo= new PDO($dsn , $username , $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Erreur de connexion : ".$e->getMessage();
}
?>