<?php




use App\src\DAO\PostDAO;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Billet simple pour l'Alaska </title>
</head>

<body>
<div>
    <h1>Blog de Jean Forteroche</h1>
    <p>Actuellement en construction</p>

    <?php

    $post = new PostDAO();
    $posts = $post->getPosts();
    while($post = $posts->fetch())
    {

        ?>
        <div>
            <h2><a href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->id);?>"><?= htmlspecialchars($post->title);?></a></h2>
            <p><?= htmlspecialchars($post->content);?></p>
            <p>Créé le : <?= htmlspecialchars($post->created_date);?></p>
        </div>
        <br>
        <?php
    }
    $posts->closeCursor();

    ?>
</div>
</body>
</html>