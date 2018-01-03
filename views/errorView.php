<?php
$title = 'Erreur 404';
include('views/template/header.php')
;?>
        <div id="wrapper" style="width: auto">

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

