<?php


namespace models;


class UsersManager extends Manager
{
    private $db;

    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function add($login, $password)
    {
        $req = $this->db->prepare('INSERT INTO user (login, password) VALUES (:login, :password)');
        $req->bindValue(':login', $login);
        $req->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
        $req->execute();
    }

    public function exists($info)
    {
        if (is_int($info)) {
            return (bool) $this->db->query('SELECT COUNT(*) FROM user WHERE id = ' . $info)->fetchColumn();
        } else {
            $req = $this->db->prepare('SELECT COUNT (*) FROM user WHERE login = :login');
            $req->execute([':login' => $info]);

            return (bool) $req->fetchColumn();
        }
    }

    public function update(Users $admin)
    {
        $req = $this->db->prepare('UPDATE user SET login = :login, password = :password WHERE id = :id');
        $req->bindValue(':login', $admin->getLogin());
        $req->bindValue(':password', password_hash($admin->getPassword(), PASSWORD_DEFAULT));
        $req->bindValue(':id', $admin->getId());
        $req->execute();
    }

    public function get($login)
    {
        $req = $this->db->prepare('SELECT id, login, password FROM user WHERE login = :login');
        $req->execute([':login' => $login]);

        $data = $req->fetch(\PDO::FETCH_ASSOC);

        return new Users($data);
    }
}