<!DOCTYPE HTML>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    </head>
    <body>
    <?php include('views/template/header.php'); ?>


    <!-- Main -->
        <div id="main">
            <?php foreach($posts as $post) {  ;?>

                <!-- Post -->
                <article class="post">
                    <header>
                        <div class="title">
                            <h2><a href="index.php?page=<?= $currentPage ;?>&amp;frontend=post&amp;id=<?=$post->getId() ;?>"><?= $post->getTitle() ;?></a></h2>

                        </div>
                        <div class="meta">
                            <time class="published" datetime="2015-11-01"><?= $post->getPostDate(); ?></time>
                            <span class="author name">Jean Forteroche</span>
                        </div>
                    </header>
                    <p><?= substr($post->getContent(), 0, 300) . '...' ;?></p>
                    <footer>
                        <ul class="actions">
                            <li><a href="index.php?frontend=post&amp;page=<?= $currentPage ?>&amp;id=<?= $post->getId() ?>" class="button big">Continuer de lire</a></li>
                        </ul>
                    </footer>
                </article>
                <?php } ;?>

            <!-- Pagination -->
            <ul class="actions pagination">

                <?php if($currentPage == 1) { ;?>

                    <li><a href="index.php?frontend=listPosts&amp;page=<?= $currentPage - 1 ?>" class="disabled button big previous">Page précédente</a></li>

                <?php } else { ;?>

                    <li><a href="index.php?frontend=listPosts&amp;page=<?= $currentPage - 1 ?>" class="button big previous">Page précédente</a></li>

                <?php } ;?>

                <?php if($currentPage == $nbrPage) { ;?>

                    <li><a href="index.php?frontend=listPosts&amp;page=<?= $currentPage + 1 ?>" class="disabled button big next">Page Suivante</a></li>

                <?php } else { ;?>

                    <li><a href="index.php?frontend=listPosts&amp;page=<?= $currentPage + 1 ?>" class="button big next">Page Suivante</a></li>

                <?php } ;?>

            </ul>

        </div>

        <!-- footer -->
        <footer id="footer">

            <!-- Intro -->
            <section id="intro">
                <a href="#" class="logo"><img src="public/images/logoForteroche.png" alt="logo JF" /></a>
                <header>
                    <h2>Billet simple pour l'Alaska</h2>
                    <p>Jean Forteroche </p>
                </header>
            </section>

            <!-- About -->
            <section class="blurb">
                <h2>A propos de l'auteur</h2>
                <p>Jean Forteroche, écrivain résidant en France dans le XVIème arrondissements de Paris.</p>
                <ul class="actions">
                    <li><a href="#" class="button">En savoir plus</a></li>
                </ul>
            </section>

            <!-- Footer -->
            <section id="footer">
                <ul class="icons">
                    <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
                    <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
                </ul>
                <p class="copyright">&copy; Copyright - 2017 Jean Forteroche - <a href="#">mentions légales</a>.</p>
            </section>

        </footer>
    </body>
</html>