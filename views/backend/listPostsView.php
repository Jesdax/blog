<?php
$title = 'Liste d\'articles';
include('views/template/headerBackend.php');
if(!isset($_SESSION['administrateur'])) {
    header('Location: index.php');
} else {
;?>


                <div class="container">
                    <div><p>Articles</p></div>
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
                                                <a href="index.php?frontend=post&amp;id=<?= $post->getId(); ?>"><i class="fa fa-eye"></i></a>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="index.php?backend=editPost&amp;id=<?=$post->getId(); ?>"><i class="fa fa-pencil"></i></a>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="index.php?action=deletePost&amp;id=<?= $post->getId(); ?>"><i class="fa fa-trash"></i></a>
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