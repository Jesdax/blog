<?php
$title = 'Page de contact';
include('views/template/header.php');
;?>
        <div id="main">
            <form class = "col-lg-4 col-lg-offset-4" action="index.php" method="post">
                <div class = "form-group">
                    <label for="name">Nom / Prénom :</label>
                    <input class="form-control" type="text" name="name" id="name" required autofocus/>
                </div><br/>
                <div class="form-control">
                    <label for="mail">Email :</label>
                    <input class="form-control" type="text" name="mail" id="mail" required autofocus/>
                </div><br/>
                <div class="form-group">
                    <label for="objet">Objet :</label>
                    <input class="form-control" type="text" name="objet" id="objet" />
                </div><br/>
                <div class="form-control">
                    <label for="message">Votre message :</label>
                    <textarea name="message" id="message"></textarea>
                </div>
                <br />
                <input type="submit" value="Envoyez" name="sendMessage" id="sendMessage"/>
            </form>
            <a class="button" href="index.php"><i class="fa fa-arrow-left"> Revenir à l'accueil</i></a>
        </div>
    <?php include('views/template/scriptBody.php'); ?>
    </body>
</html>
