<?php





class Manager
{
    /**
     * @return PDO
     */
    protected function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=projet_3;charset=utf8','root','');
            return $db;
        } catch (\Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
    }
}