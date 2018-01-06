<?php





class Post extends Hydrating
{
    private $id;
    private $title;
    private $content;
    private $postDate;

    /**
     * Post constructor.
     *
     * @param array $data
     */
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $title = (string) $title;
        $this->title = $title;
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
        $content = (string) htmlspecialchars_decode($content);
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * @param $date
     */
    public function setPostDate($date)
    {
        $date = (string) $date;
        $this->postDate = $date;
    }




}