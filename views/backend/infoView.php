<?php
$title = 'Page d\'information';
include('views/template/headerBackend.php');
if(!isset($_SESSION['administrateur'])) {
    header('Location: index.php');
} else {
;?>


    <div id="main">
        <article class="post">
            <form class="" action="index.php" method="post">
                <div class="form-group">
                    <label for="login">Votre identifiant</label>
                    <input class="form-control" type="text" name="login" id="login" />
                </div><br />
                <div class="form-group">
                    <label for="pass">Votre nouveau mot de passe</label>
                    <input class="form-control" type="password" name="pass" id="pass"/>
                </div><br />
                <input type="submit" value="Soumettre la modification" name="modify"/>
            </form>
            <a class="button" href="index.php?backend=backOfficeView"><i class="fa fa-arrow-left"> Retour</i></a>
        </article>
    </div>


    <?php include('views/template/scriptBody.php');?>
    </body>
</html>
<?php } ;?>