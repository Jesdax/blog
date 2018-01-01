<?php
$title = 'Commentaires signalés';
include('views/template/headerBackend.php');
if(!isset($_SESSION['administrateur'])) {
    header('Location: index.php');
} else {
;?>

            <div id="main">
                <section class="post">

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
                                    <td><a href="index.php?action=auth&amp;id=<?=$comment->getId(); ?>">Valider</a></td>
                                    <td><a href="index.php?action=deleteComment&amp;id=<?=$comment->getId(); ?>">Supprimer</a></td>
                                </tr>
                            </tbody>
                        </table>

    <?php } ;?>




                </section>
                <section>
                    <p>
                        <a href="index.php?backend=backOfficeView">Retour</a>
                    </p>
                </section>
            </div>

    <?php include('views/template/scriptBody.php');?>
    </body>
    </html>
    <?php } ;?>