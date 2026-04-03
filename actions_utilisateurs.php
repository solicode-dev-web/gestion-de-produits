<?php
require 'connexion.php';
try{
    $stmt=$pdo->prepare("INSERT INTO utilisateur (nom, email, password) VALUES (:nom, :email, :password)");
    $stmt->execute([
        'nom' => 'charlie',
        'email' => 'charlie@test.com',
        'password' => 'T2B3N4'
    ]);
        echo "Utilisateur ajouté avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$stmt = $pdo->prepare("UPDATE Utilisateur SET email = :email WHERE id = :id");
$stmt->execute([
    'email' => 'chaarlie.new@test.com',
    'id' => 2
]);
echo "Utilisateur mis à jour.";


$stmt = $pdo->prepare("DELETE FROM Utilisateur WHERE id = :id");
$stmt->execute(['id' => 1]);
echo "Utilisateur supprimé.";

echo $stmt->rowCount() . " ligne(s) affectée(s).";