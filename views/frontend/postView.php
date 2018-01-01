<!DOCTYPE HTML>
<html>
<head>
    <title><?= $post->getTitle(); ?></title>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width=device-width, initial-scale=1" />
    <link rel = "stylesheet" href = "assets/css/main.css" />
</head>
<body class = "single">
<?php
include('views/template/header.php');
?>
<div id = "main">
    <article class = "post">
        <header>
            <div class = "title">
                <h2><?= $post->getTitle(); ?></h2>
            </div>
            <div class = "meta">
                <time class = "published" datetime = "2015-11-01"><?= $post->getPostDate() ?></time>
                <span class = "author name">Jean Forteroche</span>
            </div>
        </header>

        <p><?= nl2br($post->getContent()); ?></p>
        <ul class="actions pagination">
            <li><a href = "index.php?frontend=listPosts&amp;page=<?= $currentPage ?>" class = "button big previous">Page précédente</a></li>
        </ul>
    </article>
    <legend>Ajouter un commentaire</legend>
    <form action = "index.php?action=postComment&amp;postId=<?= $post->getId(); ?>&amp;page=<?= $currentPage; ?>" method = "post">
        <fieldset>
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author"/>
            <label for="comment">Commentaire</label>
        </fieldset>
        <textarea name="comment" id="comment"></textarea>
        <input class="btn btn-default pull-right" type="submit" value="Poster un commentaire" />
    </form>
</div>


<?php
foreach($comments as $comment) { ?>
    <div class="container">
        <h4><?= $comment->getAuthor(); ?><br /><em> le <?= $comment->getCommentDate(); ?></em></h4>

        <div>
            <?= nl2br(htmlspecialchars($comment->getContent())); ?>
        </div>
        <a class = "btn btn-default" href = "index.php?action=report&amp;idComment=<?= $comment->getId()?>&amp;idPost=<?=$post->getId()?>&amp;page=<?= $currentPage; ?>">Signaler</a>
    </div>
    <?php
}
?>

</body>
</html>