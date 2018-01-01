<?php
include('views/template/headerBackend.php');
if(!isset($_SESSION['administrateur'])) {
    header('Location: index.php');
} else {
;?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Commentaires signalés</title>
            <meta charset="utf-8">
        </head>
        <body>
            <a href="index.php?backend=backOfficeView">Retour</a>
    <?php foreach($comments as $comment) { ;?>
        <p>
            Auteur : <?= $comment->getAuthor(); ?> <br />
            Commentaire : <?= nl2br($comment->getContent()); ?> <br/>
            Publié le : <?= $comment->getCommentDate(); ?> <br/>
            Nombre de signalements : <?= $comment->getReported(); ?> <br/>
            <a href="index.php?action=auth&amp;id=<?=$comment->getId(); ?>">Autoriser</a> | <a href="index.php?action=deleteComment&amp;id=<?=$comment->getId(); ?>">Supprimer</a>
        </p>
    <?php } ;?>
        </body>
    </html>
    <?php } ;?>