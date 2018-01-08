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
        $this->expediteur = htmlspecialchars($name);
        $this->email = htmlspecialchars($mail);
        $this->objet = htmlspecialchars($objet);
        $this->message = htmlspecialchars($message);
    }


    public function sendMail()
    {
        $this->message();

        $destinataire = $this->destinataire;
        $expediteur = $this->expediteur;
        $email = $this->email;
        $objet = $this->objet;

        $headers = 'MIME-Version: 1.0' . "\n";
        $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n";
        $headers .= 'Reply-To: ' . $email . "\n";
        $headers .= 'From: "Expediteur"<' . $expediteur . '>' . "\n";
        $headers .= 'Delivered-to: ' . $destinataire . "\n";
        $message = '<div style="width: 100%; text-align: center; font-weight: bold">' . $this->message . '</div>';

        if (mail($destinataire, $objet, $message, $headers)) {

            echo '<div class="alert col-lg-4 col-lg-offset-4 alert-success text-center"> L\'email a bien été envoyé</div>';

        } else {

            echo '<div class="alert col-lg-4 col-lg-offset-4 alert-danger text-center">Une erreur est survenue, votre email n\'a pas été envoyé.</div>';

        }
    }

}