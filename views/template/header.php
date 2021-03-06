<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title ;?></title>
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="public/css/main.css"/>
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" href="public/css/style.css"/>
    <link rel="stylesheet" href="public/css/snow.css"/>
    <link rel="icon" href="public/images/favicon.ico"/>
</head>
<body>


<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <div class="snow">
            <div class="snow__layer">
                <div class="snow__fall">
                </div>
            </div>
            <div class="snow__layer">
                <div class="snow__fall">
                </div>
            </div>
            <div class="snow__layer">
                <div class="snow__fall">

                </div>
                <div class="snow__fall">

                </div>
                <div class="snow__fall">

                </div>
            </div>
            <div class="snow__layer">
                <div class="snow__fall">

                </div>
            </div>
        </div>
        <h1 style="color: #fff"><a href="#">Voyage au bout du monde arctique</a></h1>
        <nav class="main">
            <ul>
                <li class="search">
                    <a class="fa-search" href="#search">Rechercher</a>
                    <form id="search" method="post" action="index.php">
                        <input type="text" name="postSearch" placeholder="Rechercher un article" />
                        <input type="hidden" name="page" value="<?= $currentPage; ?>">
                    </form>
                </li>
                <li class="menu">
                    <a class="fa-bars" href="#menu">Menu</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Menu -->
    <section id="menu">

        <!-- Search -->
        <section>
            <form class="search" method="post" action="index.php">
                <input type="text" name="postSearch" placeholder="Rechercher un article" />
                <input type="hidden" name="page" value="<?= $currentPage; ?>">
                <input type="submit" name="search" class="button big fit" value="GO !"/>
            </form>
        </section>

        <?php if(isset($_SESSION['administrateur'])) { ;?>
        <!-- Links -->
        <section>
            <p style="text-align: center"><i class="fa fa-user"></i> Bienvenue Monsieur Forteroche</p>
            <ul class="links">
                <li>
                    <a href="index.php?backend=backOfficeView"><h3>Administration</h3></a>
                    <a href="index.php?backend=listPosts"><h3>Articles</h3></a>
                    <a href="index.php?backend=reported"><h3>Commentaires signalés</h3></a>
                </li>
            </ul>
        </section>
        <?php } else { ;?>
        <section>
            <ul class="links">
                <li><a href="index.php"><h3>Accueil</h3></a></li>
                <li><a href="index.php?frontend=contactForm"><h3>Contact</h3></a></li>
            </ul>
        </section>
        <?php } ;?>
        <!-- Actions -->
        <section>
            <ul class="actions vertical">
                <?php if(isset($_SESSION['administrateur'])) { ;?>
                    <li><a href="?disconnect=1" class="button big fit">Se déconnecter</a></li>
                <?php } else { ;?>
                    <li><a href="index.php?backend=backOfficeView" class="button big fit">Se connecter</a></li>
                    <li><a href="index.php?frontend=formAdminLog" class="button big fit disabled">Créer un compte admin</a></li>
                <?php } ;?>
            </ul>
        </section>

    </section>
