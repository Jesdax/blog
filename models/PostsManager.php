<?php


namespace models;


class PostsManager extends Manager
{
    private $db;

    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function addPost($title, $content)
    {
        $req = $this->db->prepare('INSERT INTO posts (title, content, post_date) VALUES (:title, :content, NOW())');
        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $affectedLines = $req->execute();

        return$affectedLines;
    }

    public function getPosts()
    {
        $posts = [];

        $req = $this->db->query('SELECT id, title, content, DATE_FORMAT(post_date, \'%d.%m.%Y\')AS postDate FROM posts ORDER BY postDate DESC');
        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
            $posts[] = new Posts($data);
        }
        return $posts;
    }

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
        return new Posts($data);
    }

    public function update($id, $title, $content)
    {
        $req = $this->db->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $req->bindValue(':id', $id);
        $affectedLines = $req->execute();

        return $affectedLines;
    }

    public function delete($id)
    {
        $req = $this->db->exec('DELETE FROM posts WHERE id = ' . $id);
        return $req;
    }

    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM posts')->fetchColumn();
    }

}