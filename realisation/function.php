<?php
require_once 'connexion.php';

function getAllrecipes($pdo){
    $sql="SELECT * FROM recipes";
    $stmt=$pdo->query($sql); 
 return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function searchRecipes($pdo , $keyword){
    $keyword="%" .$keyword ."%";
    $sql="SELECT * FROM recipes WHERE name LIKE :keyword";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['keyword' => $keyword ]);
 return $stmt->fetchAll();
}

function filterRecipes($pdo , $filter){
 $sql="SELECT * FROM recipes WHERE category= :categorie";
 $stmt=$pdo->prepare($sql);
 $stmt->execute(['categorie' => $filter]);
 return $stmt->fetchAll();
}
function sortRecipes($pdo , $sort){
    if($sort == 'recent'){
        $sql="SELECT * FROM recipes ORDER BY id DESC ";
    } elseif($sort == 'oldest'){
        $sql="SELECT * FROM recipes ORDER BY id ASC";
    } elseif($sort == 'time_asc'){
        $sql="SELECT * FROM recipes ORDER BY prep_time ASC";
    }else{
        $sql = "SELECT * FROM recipes ORDER BY name ASC";
    }
    $stmt = $pdo->query($sql);
 return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>