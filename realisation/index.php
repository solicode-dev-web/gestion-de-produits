<?php
require_once 'function.php';
$allRecipes=getAllrecipes($pdo);
if($_SERVER["REQUEST_METHOD"]== 'GET'){
    $search=isset($_GET['search'])?$_GET['search'] :"";
    $filter=isset($_GET['filter'])?$_GET['filter'] :"";
    $sort=isset($_GET['sort'])?$_GET['sort'] :"";
    if(!empty($search)){
        $recipes=searchRecipes($pdo , $search);
    } elseif(!empty($filter)){
        $recipes=filterRecipes($pdo , $filter);
    } elseif(!empty($sort)){
        $recipes=sortRecipes($pdo ,$sort);
    } else{
        $recipes = getAllrecipes($pdo);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de products</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
<header>    
    <form action="index.php" method="GET" class="filter-form">
        <input type="text" name="search" placeholder="search recipes....." value="<?php echo $_GET['search'] ?? ''; ?>">
        
        <select name="filter">
            <option value="">All category</option>
            <option value="Entrée">Entrée</option>
            <option value="Plat">Plat</option>
            <option value="Dessert">Dessert</option>
        </select>

        <select name="sort">
            <option value="">Sort by</option>
            <option value="recent">Recent</option>
            <option value="oldest">Oldest</option>
            <option value="time_asc">rapide preparation</option>
        </select>

        <button type="submit">update</button>
        <a href="index.php" class="reset-btn">reset</a>
    </form>
</header>

<main class="container">
    <div class="recipe-grid">
        <?php if (!empty($recipes)): ?>
            <?php foreach ($recipes as $recipe): ?>
                <div class="recipe-card">
                    <div class="card-image">
                <img src="<?php echo $recipe['image']; ?>" alt="cake">
                    </div>
                    <div class="card-content">
                        <span class="category-badge"><?php echo htmlspecialchars($recipe['category']); ?></span>
                        <h3><?php echo ($recipe['name']); ?></h3>
                        <p class="time">⏱️ <?php echo $recipe['prep_time']; ?> min</p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

</body>
</html>