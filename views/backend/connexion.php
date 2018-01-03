<?php
$title = 'Page de connexion';
include('views/template/header.php');
;?>

    <div id="main">
        <article class="post">
                <form class="" action="index.php" method="post">
                    <div class="form-group">
                        <label for="login">Identifiant</label>
                        <input class="form-control" type="text" name="login" id="login" />
                    </div><br />
                    <div class="form-group">
                        <label for="pass">Mot de passe</label>
                        <input class="form-control" type="password" name="pass" id="pass"/>
                    </div><br />
                    <input type="submit" value="Se connecter" name="connexion" id="connexion" />
                </form>
            <a class="button" href="index.php"><i class="fa fa-arrow-left"> Revenir à l'accueil</i></a>
        </article>
    </div>



<?php include('views/template/scriptBody.php');?>
</body>
</html>