<?php
$title = 'Accueil';
include('views/template/header.php'); ?>


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
                            <time class="published" datetime="2017-12-01"><?= $post->getPostDate(); ?></time>
                            <a class="author" href="#"><span class="name">Jean Forteroche</span><img src="public/images/polaricone.png" alt="auteur" /></a>
                        </div>
                    </header>
                    <p><?= substr($post->getContent(), 0, 300) . '...' ;?></p>
                    <footer>
                        <ul class="actions">
                            <li><a href="index.php?frontend=post&amp;page=<?= $currentPage ?>&amp;id=<?= $post->getId() ?>" class="button big">Lire la suite</a></li>
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


        <!-- Sidebar -->
        <section id="sidebar">

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
                    <li><a href="index.php?frontend=contactForm" class="fa-envelope"><span class="label">Email</span></a></li>
                </ul>
                <p class="copyright">&copy; Copyright - 2017 Jean Forteroche - <a href="#">mentions légales</a>.</p>
            </section>

        </section>

<?php include('views/template/scriptBody.php');?>

</body>
</html>