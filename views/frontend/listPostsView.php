<?php
include('views/template/header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page d'articles</title>
    <meta charset = "utf-8">
    <link href = "public/css/bootstrap.css" rel="stylesheet" />
</head>
<body>
<div class = "container">
    <legend>Articles</legend>
    <div class = "row">
        <div class = "col-lg-9">
            <?php
            foreach($posts as $post)
            {
                ?>
                <div class = "col-lg-4 text-center">
                    <div class = "panel panel-default">
                        <div class = "panel-body">
                            <div class = "row">
                                <?= $post->getTitle(); ?>
                            </div><br/>
                            <div class = "row">
                                <a href="index.php?frontend=post&amp;page=<?= $currentPage ?>&amp;id=<?= $post->getId() ?>">Lire</a></em>
                            </div>
                        </div>
                        <div class = "panel-footer">
                            <em><?= $post->getPostDate() ?></em>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class = "col-lg-3">
            <?php include('views/template/search.php'); ?>
        </div>
    </div>

    <div class = "row">
        <div class = "col-lg-1 pull-right">
            <div class = "btn-group">
                <?php
                for($i = 1; $i <= $nbrPage; $i++)
                {
                    ?>
                    <a class="btn btn-info" href="index.php?frontend=listPosts&amp;page=<?= $i ?>"><?= $i ?></a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include('views/template/scriptBody.php');?>
</body>
</html>