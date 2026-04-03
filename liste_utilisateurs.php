<?php
require 'connexion.php';
try{
    $sql="SELECT * FROM utilisateur";
    $stmt=$pdo->query($sql);
    $utilisateur=$stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table border='1'>
<tr><th>ID</th><th>Nom</th><th>Email</th></tr>";
foreach ($utilisateur as $user) {
    echo "<tr><td>{$user['id']}</td><td>{$user['nom']}</td><td>{$user['email']}</td></tr>";
}
echo "</table>";

} catch(PDOException $e){
    echo "Erreur de connexion : " .$e->getMessage();
}