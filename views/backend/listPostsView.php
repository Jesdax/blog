<?php
$title = 'Liste d\'articles';
include('views/template/headerBackend.php');
if(!isset($_SESSION['administrateur'])) {
    header('Location: index.php');
} else {
;?>


                <div id="main" style="width: auto;">
                    <div class="row">
                        <h1>Articles</h1>
                    </div>
                    <div class="row">

                        <?php foreach($posts as $post) { ;?>

                            <div class="col-lg-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <?= $post->getTitle(); ?>
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <abbr title="Voir"><a href="index.php?frontend=post&amp;id=<?= $post->getId(); ?>"><i class="fa fa-eye"></i></a></abbr>
                                            </div>
                                            <div class="col-lg-4">
                                                <abbr title="Modifier"><a href="index.php?backend=editPost&amp;id=<?=$post->getId(); ?>"><i class="fa fa-pencil"></i></a></abbr>
                                            </div>
                                            <div class="col-lg-4">
                                                <abbr title="Supprimer"><a href="index.php?action=deletePost&amp;id=<?= $post->getId(); ?>"><i class="fa fa-trash"></i></a></abbr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <em>Posté le <?= $post->getPostDate(); ?></em>
                                    </div>
                                </div>
                            </div>

                            <?php } ;?>

                    </div>
                    <a href="index.php?backend=backOfficeView" class="button">Retour</a>
                </div>

            <?php include('views/template/scriptBody.php') ;?>

        </body>
    </html>
<?php } ;?>