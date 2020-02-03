<?php



use App\src\DAO\PostDAO;
use App\src\DAO\CommentDAO;


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Chapitre publié</title>
</head>

<body>
<div>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <?php
    $post = new PostDAO();
    $posts = $post->getPost($_GET['postId']);
    $post = $posts->fetch()
    ?>
    <div>
        <h2><?= htmlspecialchars($post->title);?></h2>
        <p><?= htmlspecialchars($post->content);?></p>
        <p>Créé le : <?= htmlspecialchars($post->created_date);?></p>
    </div>
    <br>
    <?php
    $posts->closeCursor();
    ?>
    <a href="../public/index.php">Retour à l'accueil</a>

    <div id="comments" class="text-left" style="margin-left: 50px">
        <h3>Commentaires</h3>
        <?php
        $comment = new CommentDAO();
        $comments = $comment->getCommentsFromPost($_GET['postId']);
        while($comment = $comments->fetch())
        {
            ?>
            <h4><?= htmlspecialchars($comment->author);?></h4>
            <p><?= htmlspecialchars($comment->content);?></p>
            <p>Posté le <?= htmlspecialchars($comment->created_date);?></p>
            <?php
        }
        $comments->closeCursor();
        ?>

    </div>

</body>
</html>