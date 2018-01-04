<?php $title = 'Page de création admin';
include('views/template/header.php');
;?>
        <div id="main">
            <form class = "col-lg-4 col-lg-offset-4" action="index.php" method="post">
                <div class = "form-group">
                    <label for="login">Votre pseudo admin</label>
                    <input class="form-control" type="text" name="login" id="login" required autofocus/>
                </div><br />
                <div class="form-group">
                    <label for="pass">Mot de passe</label>
                    <input class="form-control" type="password" name="pass" id="pass" required autofocus/>
                </div><br />
                <input type="submit" value="Créer un compte admin" name="create" />
            </form>
            <a class="button" href="index.php"><i class="fa fa-arrow-left"> Revenir à l'accueil</i></a>
        </div>
</div>
<?php include('views/template/scriptBody.php');?>
    </body>
</html>