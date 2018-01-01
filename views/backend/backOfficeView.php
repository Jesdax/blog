<?php
$title = 'Administration';
include('views/template/headerBackend.php');
if(!isset($_SESSION['administrateur'])) {
    header('Location: index.php');
} else {
;?>

        <div class="main">
            <section class="post">
                <div class="row">
                    <div class="col-lg-12">
                        <legend>Tableau de bord</legend>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <i class="fa fa-plus-circle fa-5x"></i>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?backend=addPost">
                                <div class="panel-footer">
                                    <span class="pull-left">Ajouter un article</span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <i class="fa fa-th-list fa-5x"></i>
                                    </div>
                                    <div class="col-lg-9 text-right">
                                        <h1><?= $postsManager->count(); ?></h1>
                                        <div>Articles</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?backend=listPosts">
                                <div class="panel-footer">
                                    <span class="pull-left">Voir détails</span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-lg-9 text-right">
                                        <h1><?= $commentsManager->count(); ?></h1>
                                        <div>Commentaires</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Voir détails</span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <i class="fa fa-flag fa-5x"></i>
                                    </div>
                                    <div class="col-lg-9 text-right">
                                        <h1><?= $commentsManager->countReported(); ?></h1>
                                        <div>Signalements</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?backend=reported">
                                <div class="panel-footer">
                                    <span class="pull-left">Modérer</span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <hr/>
                    </div>
                </div>
            </section>
    </div>
    <?php include('views/template/scriptBody.php');?>
    </body>
</html>

<?php } ;?>



