<?php



class UserManager extends Manager
{
    private $db;

    /**
     * UserManager constructor.
     */
    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    /**
     * @param User $admin
     *
     * @return PDOStatement
     */
    public function add(User $admin)
    {
        $req = $this->db->prepare('INSERT INTO user (login, password) VALUES (:login, :pass)');
        $req->bindValue(':login', $admin->getLogin());
        $req->bindValue(':pass', password_hash($admin->getPassword(), PASSWORD_DEFAULT));
        $req->execute();

        return $req;
    }

    /**
     * @param $info
     *
     * @return mixed
     */
    public function exists($info)
    {
        if (is_int($info)) {
            return $this->db->query('SELECT id FROM user WHERE id = '.$info)->fetchColumn();
        } else {
            $req = $this->db->prepare('SELECT login FROM user WHERE login = :login');
            $req->execute([':login' => $info]);

            return $req->fetchColumn();
        }
    }

    /**
     * @param User $admin
     */
    public function update(User $admin)
    {
        $req = $this->db->prepare('UPDATE user SET password = :pass WHERE login = :login');
        $req->bindValue(':login', $admin->getLogin());
        $req->bindValue(':pass', password_hash($admin->getPassword(), PASSWORD_DEFAULT));
        $req->execute();

        return $req;
    }

    /**
     * @param $login
     *
     * @return User
     */
    public function get($login)
    {
        $req = $this->db->prepare('SELECT id, login, password FROM user WHERE login = :login');
        $req->execute([':login' => $login]);

        $data = $req->fetch(\PDO::FETCH_ASSOC);

        return new User($data);
    }


}