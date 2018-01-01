
<!DOCTYPE html>
<html>
    <head>
        <title>Page de Connexion</title>
        <meta charset="utf-8" />
        <link href="public/css/bootstrap.css" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet">
    </head>

    <body>
        <form class="col-lg-4 col-lg-offset-4" action="index.php" method="post">
            <div class="form-group">
                <label for="login">Identifiant</label>
                <input class="form-control" type="text" name="login" id="login" />
            </div>
            <div class="form-group">
                <label for="pass">Mot de passe</label>
                <input class="form-control" type="password" name="pass" id="pass"/>
            </div>
            <input type="submit" value="Se connecter" name="connexion" id="connexion" />
        </form>
        <div class="row">
            <a href="index.php" class="btn btn-default">Revenir à l'acceuil</a>
        </div>

    </body>
</html>