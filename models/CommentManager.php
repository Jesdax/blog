<?php


class CommentManager extends Manager
{
    private $db;


    /**
     * CommentManager constructor.
     */
    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    /**
     * @param $postId
     * @param $author
     * @param $content
     *
     * @return bool
     */
    public function postComment($postId, $author, $content)
    {
        $req = $this->db->prepare('INSERT INTO comments(postId, author, content, reported, comment_date) VALUES (:postId, :author, :content, 0, NOW())');
        $req->bindValue(':postId', $postId);
        $req->bindValue(':author', $author);
        $req->bindValue(':content', $content);
        $affectefLines = $req->execute();

        return $affectefLines;
    }

    /**
     * @param $postId
     *
     * @return array
     */
    public function getComments($postId)
    {
        $comments = [];

        $req = $this->db->prepare('SELECT id, author, content, reported, DATE_FORMAT(comment_date, \'%d.%m.%Y à %Hh%imin\') AS commentDate FROM comments WHERE postId = :postId ORDER BY comment_date DESC');
        $req->execute([':postId' => $postId]);

        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    /**
     * @param $id
     *
     * @return Comment
     */
    public function get($id)
    {
        $req = $this->db->prepare('SELECT id, author, content, reported, DATE_FORMAT(comment_date, \'%d.%m.%Y à %Hh%imin\') AS commentDate FROM comments WHERE id = :id');
        $req->execute([':id' => $id]);

        return new Comment($req->fetch(\PDO::FETCH_ASSOC));
    }


    /**
     * @param $id
     *
     * @return bool
     */
    public function report($id)
    {
        $req = $this->db->prepare('UPDATE comments SET reported = reported + 1 WHERE id = :id');
        $affectedLines = $req->execute([':id' => $id]);

        return $affectedLines;
    }

    /**
     * @return array
     */
    public function getReported()
    {
        $comments = [];
        $req = $this->db->query('SELECT id, author, content, reported, DATE_FORMAT(comment_date, \'%d.%m.%Y à %Hh%imin\') AS commentDate FROM comments WHERE reported > 0 ORDER BY reported DESC');

        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    /**
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        $req = $this->db->exec('DELETE FROM comments WHERE id = ' . $id);

        return $req;
    }

    /**
     * @param $postId
     */
    public function deletePostComments($postId)
    {
        $req = $this->db->prepare('DELETE FROM comments WHERE postId = :postId');
        $req->bindValue(':postId', $postId);
        $req->execute();

        return $req;
    }

    /**
     * @return mixed
     */
    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM comments')->fetchColumn();
    }

    /**
     * @return mixed
     */
    public function countReported()
    {
        return $this->db->query('SELECT COUNT(*) FROM comments WHERE reported > 0')->fetchColumn();
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function exists($id)
    {
        $req = $this->db->prepare('SELECT id FROM comments WHERE id = :id');
        $req->execute([':id' => $id]);

        return (bool) $req->fetchColumn();
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function auth($id)
    {
        $req = $this->db->prepare('UPDATE comments SET reported = 0 WHERE id = :id');
        $affectedLines = $req->execute([':id' => $id]);

        return $affectedLines;
    }

}