<?php
$title = 'Commentaires signalés';
include('views/template/headerBackend.php');
if(!isset($_SESSION['administrateur'])) {
    header('Location: index.php');
} else {
;?>

            <div id="main">
                <section class="post">
                    <h1 style="text-align: center">Commentaires signalés</h1><br />
                    <?php foreach($comments as $comment) { ;?>

                        <table>
                            <thead>
                                <tr>
                                    <th>Auteur :</th>
                                    <th>Commentaire :</th>
                                    <th>Publié le :</th>
                                    <th>Nombre de signalements :</th>
                                    <th>Autoriser</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $comment->getAuthor(); ?></td>
                                    <td><?= nl2br($comment->getContent()); ?></td>
                                    <td><?= $comment->getCommentDate(); ?></td>
                                    <td><?= $comment->getReported(); ?></td>
                                    <td><a style="margin-left: 15px;" class="btn btn-success" href="index.php?action=auth&amp;id=<?=$comment->getId(); ?>"><i class="fa fa-check"></i></a></td>
                                    <td><a style="margin-left: 19px;" class="btn btn-danger" href="index.php?action=deleteComment&amp;id=<?=$comment->getId(); ?>"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            </tbody>
                        </table>

    <?php } ;?>




                </section>
                <section>
                        <a href="index.php?backend=backOfficeView" class="button">Retour</a>
                </section>
            </div>

    <?php include('views/template/scriptBody.php');?>
    </body>
    </html>
    <?php } ;?>