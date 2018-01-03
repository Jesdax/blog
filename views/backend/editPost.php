<?php
$title = 'Modification d\'article';
$scriptTinyMCE = '<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
            tinyMCE.init({
                selector: "textarea",
                plugins: "image, link, anchor, lists, table, textcolor colorpicker, charmap, contextmenu, help, hr, nonbreaking, preview, print, searchreplace, wordcount, visualblocks",
                toolbar: "undo redo | bold italic underline | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table anchor link image",
                contextmenu: "undo redo | bold italic underline | link image inserttable | cell row column deletetable",
                language: "fr_FR",
                height: "300",
                forced_root_block: false,
                force_br_newlines: true,
                force_p_newlines: false});
        </script>';

include('views/template/headerBackend.php');
if(!isset($_SESSION['administrateur'])) {
    header('Location: index.php');
} else {
;?>
        <div id="main">
            <section class="">
                <?php if(isset($post)) { ;?>
                    <form class="col-lg-10 col-lg-offset-1" action="index.php" method="post">
                        <legend>Modifier un article</legend><br />
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $post->getId(); ?>" />
                            <label for="title">Titre</label>
                            <input class="form-control" type="text" name="title" id="title" value="<?= $post->getTitle(); ?>"/>
                        </div>
                        <div class="form-group"><br />
                            <label for="content">Contenu</label><br />
                            <textarea class="form-control" id="content" name="content"><?= $post->getContent() ?></textarea>
                        </div><br />
                        <input class="pull-right" type="submit" name="update" value="Mettre à jour" />
                    </form>

                <?php } else { ;?>

                    <form class="col-lg-10 col-lg-offset-1" action="index.php" method="post">
                        <legend>Ajout d'un nouvel article</legend>
                        <div class="form-group">
                            <label for="title">Titre</label><br />
                            <input class="form-control" id="title" type="text" name="title"/>
                        </div>
                        <div class="form-group">
                            <label for="content">Contenu</label><br />
                            <textarea class="form-control" id="content" name="content"></textarea>
                        </div><br />
                        <input class="pull-right" type="submit" name="publish" value="Publier l'article" />
                    </form>


                <?php } ;?>

            </section>

            <div class="row">
                <a class="button" href="index.php?backend=backOfficeView">Retour</a>
            </div>
        </div>

            <?php include('views/template/scriptBody.php');?>
        </body>
    </html>
    <?php } ;?>