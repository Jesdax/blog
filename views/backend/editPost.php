<?php
include('views/template/headerBackend.php');
if(!isset($_SESSION['administrateur'])) {
    header('Location: index.php');
} else {
;?>


    <!DOCTYPE html>
    <html>
    <head>
        <title>Page d'articles</title>
        <meta charset="utf-8">
        <link href="public/css/bootstrap.css" rel="stylesheet">
        <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
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
        </script>
    </head>
        <body>
            <div class="container">
                <?php if(isset($post)) { ;?>
                    <p>
                        <a href="index.php?backend=listPosts">Retour à la liste des articles</a>
                    </p>

                    <form class="col-lg-10 col-lg-offset-1" action="index.php" method="post">
                        <legend>Modifier un article</legend>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $post->getId(); ?>" />
                            <label for="title">Titre</label><br />
                            <input class="form-control" type="text" name="title" id="title" value="<?= $post->getTitle(); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="content">Contenu</label><br />
                            <textarea class="form-control" id="content" name="content"><?= $post->getContent() ?></textarea>
                        </div>
                        <input class="pull-right" type="submit" name="update" value="Mettre à jour" />
                    </form>

                    <?php } else { ;?>

                    <p>
                        <a href="index.php?backend=backOfficeView">Retour</a>
                    </p>

                    <form class="col-lg-10 col-lg-offset-1" action="index.php" method="post">
                        <legend>Ajout d'un nouvel article</legend>
                        <div class="form-group">
                            <label for="title">Titre</label><br />
                            <input class="form-control" id="title" type="text" name="title"/>
                        </div>
                        <div class="form-group">
                            <label for="content">Contenu</label><br />
                            <textarea class="form-control" id="content" name="content"></textarea>
                        </div>
                        <input class="pull-right" type="submit" name="publy" value="Publier" />
                    </form>

                    <?php } ;?>

            </div>
        </body>
    </html>
    <?php
}
?>