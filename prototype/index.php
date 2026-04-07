<?php
require_once 'connexion.php';
require_once 'function.php';
$recipes=getAllrecipes($pdo);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Recettes</title>
    <style>
        .recipe-card { 
        border: 1px solid #ccc;
         margin: 10px; 
         padding: 10px; 
         display: inline-block; 
         width: 200px;
          }
        .recipe-card img {
         width: 100%; 
         height: auto;
          }
    </style>
</head>
<body>
    <h1>Catalogue de Recettes</h1>

    <div class="recipe-list">
        <?php foreach ($recipes as $recipe): ?>
            <div class="recipe-card">
                <img src="<?= $recipe['image'] ?>" alt="<?= $recipe['name'] ?>">
                
                <h3><?=$recipe['name'] ?></h3>
                <p><strong>Catégorie :</strong> <?= $recipe['category'] ?></p>
                <p><strong>Temps :</strong> <?= $recipe['prep_time'] ?> min</p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>