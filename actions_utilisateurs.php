<?php
require 'connexion.php';

try {
    $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
    $stmt->execute([
        'nom' => 'Charlie',
        'email' => 'charlie@test.com'
    ]);
    echo "Utilisateur ajouté avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
