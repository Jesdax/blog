<?php



class Comments extends Hydrating
{
    private $id;
    private $postId;
    private $author;
    private $content;
    private $reported;
    private $commentDate;

    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    /**
     * @return int
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     */
    public function setPostId($postId)
    {
        $postId = (int) $postId;
        if ($postId > 0) {
            $this->postId = $postId;
        }
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $author = (string) $author;
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $content = (string) $content;
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getReported()
    {
        return $this->reported;
    }

    /**
     * @param int $reported
     */
    public function setReported($reported)
    {
        $reported = (int) $reported;
        if ($reported >= 0) {
            $this->reported = $reported;
        }
    }

    /**
     * @return string
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param string $commentDate
     */
    public function setCommentDate($commentDate)
    {
        $commentDate = (string) $commentDate;
        $this->commentDate = $commentDate;
    }



}