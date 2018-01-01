<?php





class Manager
{
    protected function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=projet_3;charset=utf8','root','Commercy1411');
            return $db;
        } catch (\Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
    }
}