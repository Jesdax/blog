<!DOCTYPE html>
<html>
    <head>
        <title>Page de création de compte</title>
        <meta charset="utf-8" />
        <link href="public/css/bootstrap.css" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div>
            <form class = "col-lg-4 col-lg-offset-4" action="index.php" method="post">
                <div class = "form-group">
                    <label for="login">Votre pseudo admin</label>
                    <input class="form-control" type="text" name="login" id="login" required autofocus/>
                </div>
                <div class="form-group">
                    <label for="pass">Mot de passe</label>
                    <input class="form-control" type="password" name="pass" id="pass" required autofocus/>
                </div>
                <input type="submit" value="Créer un compte admin" name="create" />
            </form>
            <p><a class="btn btn-default" href="index.php">Revenir à l'accueil</a></p>
        </div>
    </body>
</html>