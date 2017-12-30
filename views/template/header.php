<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Jean Forteroche">
        <link rel="icon" href="../../public/images/favicon.ico">

        <title><?= $title ;?></title>

        <!-- Bootstrap core CSS -->
        <link href="../../public/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../../public/css/starter.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="#">Blog 2.0</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?fontend=home">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?frontend=tickets">Articles</a>
                        </li>
                        <li class="nav-item offset-10">
                            <a class="nav-link" href="index.php?backend=backOfficeView">Administration</a>
                        </li>
                    </ul>

                    <!-- Search -->

                    <form class="form-inline my-2 my-lg-0" method="post" action="">
                        <input class="form-control mr-sm-2" type="text" placeholder="Rechercher un article" aria-label="Rechercher un article"/>
                        <input type="hidden" name="page" value="<?= $currentPage ;?>">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                    </form>
                </div>
            </nav>
        </header>
        <!--<section>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?backend=backOfficeView">Administration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?frontend=tickets">Articles</a>
                    </li>
                </ul>
            </nav>
            <ul>
                <?php /*if (isset($_SESSION['administrateur'])) { ;*/?>
                    <li class="nav-item">
                        <a href="?disconnect=1" class="btn btn-outline-success my-2 my-sm-0">Se déconnecter</a>
                    </li>
                <?php /*} else {;*/?>
                    <li class="nav-item">
                        <a href="index.php?backend=backOfficeView" class="btn btn-outline-success my-2 my-sm-0">Se connecter</a>
                    </li>
                <?php /*} ;*/?>
            </ul>
        </section>-->


        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <script src="../../public/js/jquery.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../public/js/popper.min.js"></script>
        <script src="../../public/js/bootstrap.min.js"></script>

    </body>
</html>