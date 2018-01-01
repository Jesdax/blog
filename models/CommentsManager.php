<?php


class CommentsManager extends Manager
{
    private $db;

    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function postComment($postId, $author, $content)
    {
        $req = $this->db->prepare('INSERT INTO comments(postId, author, content, reported, comment_date) VALUES (:postId, :author, :content, 0, NOW())');
        $req->bindValue(':postId', $postId);
        $req->bindValue(':author', $author);
        $req->bindValue(':content', $content);
        $affectefLines = $req->execute();

        return $affectefLines;
    }

    public function getComments($postId)
    {
        $comments = [];

        $req = $this->db->prepare('SELECT id, author, content, reported, DATE_FORMAT(comment_date, \'%d.%m.%Y à %Hh%imin\') AS commentDate FROM comments WHERE postId = :postId ORDER BY comment_date DESC');
        $req->execute([':postId' => $postId]);

        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comments($data);
        }
        return $comments;
    }

    public function get($id)
    {
        $req = $this->db->prepare('SELECT id, author, content, reported, DATE_FORMAT(comment_date, \'%d.%m.%Y à %Hh%imin\') AS commentDate FROM comments WHERE id = :id');
        $req->execute([':id' => $id]);

        return new Comments($req->fetch(\PDO::FETCH_ASSOC));
    }

    public function report($id)
    {
        $req = $this->db->prepare('UPDATE comments SET reported = reported + 1 WHERE id = :id');
        $affectedLines = $req->execute([':id' => $id]);

        return $affectedLines;
    }

    public function getReported()
    {
        $comments = [];
        $req = $this->db->query('SELECT id, author, content, reported, DATE_FORMAT(comment_date, \'%d.%m.%Y à %Hh%imin\') AS commentDate FROM comments WHERE reported > 0 ORDER BY reported DESC');

        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comments($data);
        }
        return $comments;
    }

    public function delete($id)
    {
        $req = $this->db->exec('DELETE FROM comments WHERE id = ' . $id);

        return $req;
    }

    public function deletePostComments($postId)
    {
        $req = $this->db->exec('DELETE FROM comments WHERE postId = '. $postId);
    }

    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM comments')->fetchColumn();
    }

    public function countReported()
    {
        return $this->db->query('SELECT COUNT(*) FROM comments WHERE reported > 0')->fetchColumn();
    }

    public function exists($id)
    {
        $req = $this->db->prepare('SELECT COUNT(*) FROM comments WHERE id = :id');
        $req->execute([':id' => $id]);

        return (bool) $req->fetchColumn();
    }

    public function auth($id)
    {
        $req = $this->db->prepare('UPDATE comments SET reported = 0 WHERE id = :id');
        $affectedLines = $req->execute([':id' => $id]);

        return $affectedLines;
    }

}