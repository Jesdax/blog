<?php
$title = 'Administration';
include('views/template/headerBackend.php');
if(!isset($_SESSION['administrateur'])) {
    header('Location: index.php');
} else {
;?>

        <div id="main" style="width: auto">
            <section class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 style="text-align: center">Tableau de bord</h1>
                    </div>
                </div><br/>
                <div class="row">

                    <div class="col-lg-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <i class="fa fa-lock fa-5x"></i>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?backend=info">
                                <div class="panel-footer">
                                    <span class="pull-left">Changez votre mot de passe</span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

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
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <i class="fa fa-warning fa-5x"></i>
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
                    <div class="col-lg-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-lg-9 text-right">
                                        <h1><?= $commentsManager->count(); ?></h1>
                                        <div>Nombre de commentaires totaux dans le blog</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>

    <?php include('views/template/scriptBody.php');?>
    </body>
</html>

<?php } ;?>



