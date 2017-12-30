<?php
$title = 'Page d\'articles';
include "../template/header.php";
?>

    <div class="container">
        <h3>Articles</h3>
            <div class="row">
                <div class="col-lg-9">
                    <?php foreach ($posts as $post) { ;?>
                    <div class="col-lg-4 text-center">
                        <div class="">
                            <div class="">
                                <div class="row">
                                    <?= $post->title() ;?>
                                </div><br />
                                <div class="row">
                                    <em><a href="index.php?frontend=post&amp;page=<?= $currentPage ?>&amp;id=<?= $post->id() ?>">Lire</a></em>
                                </div>
                            </div>
                                <div class="">
                                    <em><?= $post->postDate() ;?></em>
                                </div>
                        </div>
                    </div>
                    <?php } ;?>
                </div>
                    <div class="col-lg-3">
                        <?php ;?>
                    </div>
            </div>
            <div class="row">
                <div class="col-lg-1">
                    <div class="btn-group">
                        <?php for($i = 1; $i <= $nbrPage; $i++) {;?>
                            <a class="btn btn-info" href="index.php?frontend=listPosts&amp;page=<?= $i ;?>"><?= $i ;?></a>
                        <?php } ;?>
                    </div>
                </div>
            </div>
    </div>



