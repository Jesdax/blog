<?php


class Mailer
{
    public      $message,
                $objet,
                $expediteur,
                $email,
                $destinataire = 'augustin.kavera@gmail.com';


    public function message()
    {
        extract($_POST);
        $this->expediteur = htmlspecialchars('name');
        $this->email = htmlspecialchars('mail');
        $this->objet = htmlspecialchars('objet');
        $this->message = htmlspecialchars('message');
    }


    public function sendMail()
    {
        $this->message();

        $destinataire = $this->destinataire;
        $name = $this->expediteur;
        $mail = $this->email;
        $objet = $this->objet;

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: $name <$mail>\r\n Reply-to : $name <$mail>\nX-Mailer:PHP";

        $message = '<div style="width: 100%; text-align: center; font-weight: bold">'.$this->message.'</div>';

        if (mail($destinataire, $objet, $message, $headers)) {
            echo '<div class="alert col-lg-4 col-lg-offset-4 alert-success text-center"> L\'email a bien été envoyé</div>';
        } else {
            echo '<div class="alert col-lg-4 col-lg-offset-4 alert-danger text-center">Une erreur est survenue, votre email n\'a pas été envoyé.</div>';
        }
    }

}