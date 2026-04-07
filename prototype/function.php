<?php
function getAllrecipes($pdo){
    $sql="SELECT * FROM recipes ORDER BY created_at DESC";
    $stmt=$pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}