<?php
include('views/template/headerBackend.php');
if(!isset($_SESSION['administrateur'])) {
    header('Location: index.php');
} else {
;?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Liste d'articles</title>
            <meta charset="utf-8">
            <link href="public/css/bootstrap.css" rel="stylesheet">
            <link href="public/css/style.css" rel="stylesheet">
        </head>
        <body>
            <p><a href="index.php?backend=backOfficeView">Retour</a></p>
                <div class="container">
                    <legend>Articles</legend>
                    <div class="row">

                        <?php foreach($posts as $post) { ;?>

                            <div class="col-lg-3 text-center">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <?= $post->getTitle(); ?>
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <a href="index.php?frontend=post&amp;id=<?= $post->getId(); ?>">Voir</a>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="index.php?backend=editPost&amp;id=<?=$post->getId(); ?>">Modifier</a>
                                            </div>
                                            <div class="col-lg-4">
                                                <a data-toggle="modal" href="index.php?action=deletePost&amp;id=<?= $post->getId(); ?>" id="delete">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <em>Posté le <?= $post->getPostDate(); ?></em>
                                    </div>
                                </div>
                            </div>

                            <?php } ;?>

                        <div class="modal fade" id="confirm">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Confirmation</h4>
                                    </div>
                                    <div class="modal-body">
                                        Êtes-vous sur de vouloir supprimer <?= $post->getId(); ?> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal">Non</button>
                                        <a class="btn btn-primary">Oui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <script src = "public/js/jquery.js"></script>
            <script src = "public/js/bootstrap.js"></script>
            <script>
                $('#delete').click(function(){
                    $('#confirm').modal('show');
                });
            </script>
        </body>
    </html>
    <?php } ;?>