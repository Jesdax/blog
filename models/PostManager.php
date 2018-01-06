<?php




class PostManager extends Manager
{
    private $db;

    /**
     * PostManager constructor.
     */
    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    /**
     * @param $title
     * @param $content
     *
     * @return bool
     */
    public function addPost($title, $content)
    {
        $req = $this->db->prepare('INSERT INTO posts (title, content, post_date) VALUES (:title, :content, NOW())');
        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $affectedLines = $req->execute();

        return $affectedLines;
    }

    /**
     * @return array
     */
    public function getPosts()
    {
        $posts = [];

        $req = $this->db->query('SELECT id, title, content, DATE_FORMAT(post_date, \'%d.%m.%Y\')AS postDate FROM posts ORDER BY postDate DESC');
        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
            $posts[] = new Post($data);
        }
        return $posts;
    }

    /**
     * @param $id
     *
     * @return Post
     */
    public function getPost($id)
    {
        if (is_int($id)) {
            $req = $this->db->query('SELECT id, title, content, DATE_FORMAT(post_date, \'%d.%m.%Y\')AS postDate FROM posts WHERE id = ' . $id);
            $data = $req->fetch(\PDO::FETCH_ASSOC);
        } else {
            $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(post_date, \'%d.%m.%Y\')AS postDate FROM posts WHERE title = :title');
            $req->execute([':title' => $id]);

            $data = $req->fetch(\PDO::FETCH_ASSOC);
        }
        return new Post($data);
    }

    /**
     * @param $id
     * @param $title
     * @param $content
     *
     * @return bool
     */
    public function update($id, $title, $content)
    {
        $req = $this->db->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $req->bindValue(':id', $id);
        $affectedLines = $req->execute();

        return $affectedLines;
    }

    /**
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        $req = $this->db->exec('DELETE FROM posts WHERE id = ' . $id);
        return $req;
    }

    /**
     * @return mixed
     */
    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM posts')->fetchColumn();
    }

    /**
     * @param $start
     * @param $nbr
     *
     * @return array
     * @throws Exception
     */
    public function pagination($start, $nbr)
    {
        $posts = [];

        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(post_date, \'%d.%m.%Y\')AS postDate FROM posts LIMIT :start, :nbr');
        $req->bindValue(':start', $start, \PDO::PARAM_INT);
        $req->bindValue(':nbr', $nbr, \PDO::PARAM_INT);

        if (!$req->execute()) {
            throw new \Exception('Impossible de sélectionner les articles pour la pagination.');
        } else {
            while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
                $posts[] = new Post($data);
            }
            return $posts;
        }
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function exists($id)
    {
        if (is_int($id)) {
            return $this->db->query('SELECT id FROM posts WHERE id = '.$id)->fetchColumn();
        } else {
            $req = $this->db->prepare('SELECT title FROM posts WHERE title = :title');
            $req->execute([':title' => $id]);

            return $req->fetchColumn();
        }
    }


}