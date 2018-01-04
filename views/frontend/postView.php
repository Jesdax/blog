<?php
$title = $post->getTitle();
include('views/template/header.php'); ?>

<div id="main">
    <article class="post">
        <header>
            <div class="title">
                <h2><?= $post->getTitle(); ?></h2>
            </div>
            <div class="meta">
                <time class="published" datetime="2017-12-01"><?= $post->getPostDate() ?></time>
                <a class="author" href="#"><span class="name">Jean Forteroche</span><img src="public/images/polaricone.png" alt="auteur" /></a>
            </div>
        </header>

        <p><?= nl2br($post->getContent()); ?></p>
        <ul class="actions pagination">
            <li><a href="index.php?frontend=listPosts&amp;page=<?= $currentPage ?>" class = "button big previous">Page précédente</a></li>
        </ul>
    </article>
    <legend>Ajouter un commentaire</legend>
    <form action="index.php?action=postComment&amp;postId=<?= $post->getId(); ?>&amp;page=<?= $currentPage; ?>" method="post">
        <fieldset>
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author"/>
            <label for="comment">Commentaire</label>
        </fieldset>
        <textarea name="comment" id="comment"></textarea><br />
        <input class="btn btn-default pull-right" type="submit" value="Poster un commentaire" />
    </form><br />
    <?php
    foreach($comments as $comment) { ?>
        <div class="post" style="background-color: #d9d9d9">
            <h4><?= $comment->getAuthor(); ?><br /><em> le <?= $comment->getCommentDate(); ?></em></h4>
            <div>
                <?= nl2br(htmlspecialchars($comment->getContent())); ?>
            </div>
            <a class="btn btn-default" href="index.php?action=report&amp;idComment=<?= $comment->getId()?>&amp;idPost=<?=$post->getId()?>&amp;page=<?= $currentPage; ?>">Signaler</a>
        </div>
    <?php } ;?>
</div>
</div>
    <?php include('views/template/scriptBody.php');?>

</body>
</html>