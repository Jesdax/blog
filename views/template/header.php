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
</head>
<body>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="#">Billet simple pour l'Alaska</a></h1>
        <nav class="links">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?frontend=contactForm">Contact</a></li>
            </ul>
        </nav>
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
                <input type="submit" name="search" class="button big fit" />
            </form>
        </section>

        <?php if(isset($_SESSION['administrateur'])) { ;?>
        <!-- Links -->
        <section>
            <p style="text-align: center">Bienvenue Monsieur Forteroche</p>
            <ul class="links">
                <li>
                    <a href="index.php?backend=backOfficeView"><h3>Administration</h3></a>
                </li>
            </ul>
        </section>
        <?php } else { ;?>
        <section>
            <ul class="links">
                <li><a href="index.php"><h3>Accueil</h3></a></li>
                <li><a href="index.php?frontend=contactForm">Contact</a></li>
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

