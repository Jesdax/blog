<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="public/css/bootstrap.css" rel="stylesheet" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <title>Page d'erreur</title>
    </head>
    <body>
        <div class="container">

            <?php if(isset($errorMessage)) { ;?>

                <div class="alert col-lg-4 col-lg-offset-4 alert-danger text-center">
                    <p><?= $errorMessage; ?></p>
                </div>
                <?php } else { ;?>
                <div class="alert col-lg-4 col-lg-offset-4 alert-info text-center">
                    <p>Aucune erreur à afficher.</p>
                </div>
                <?php } ;?>
        </div>
    </body>
</html>