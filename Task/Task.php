<?php
class Task
{
    private $id;
    private $author;
    private $title;
    private $content;
    private $cluster;
    private $created;
    private $deadline;

    public function __construct()
    {
    }

    public function prepare($id, $author, $title, $content, $cluster, $created, $deadline)
    {
        $this->id = $id;
        $this->author = $author;
        $this->title = $title;
        $this->content = $content;
        $this->cluster = $cluster;
        $this->created = $created;
        $this->deadline = $deadline;
    }

    public function add()
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("INSERT INTO tasks (author_id, title, content, cluster_id, deadline) ?,?,?,?,?");
        $stmt->bind_param('issii', $this->author->getId(), $this->title, $this->content, $this->cluster->getId(),
            $this->deadline);
        if ($stmt->execute())
        {
            $this->id = $stmt->insert_id;
            return true;
        }
        return false;
    }

    public function commit()
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("UPDATE tasks SET author_id=?, title=?, content=?, cluster_id=?, deadline=? WHERE id=?");
        $stmt->bind_param('issii', $this->author->getId(), $this->title, $this->content, $this->cluster->getId(),
            $this->deadline, $this->id);
        return $stmt->execute();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        if (!isset($this->id))
            $this->id = $id;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        if (!isset($this->created))
            $this->created = $created;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCluster()
    {
        return $this->cluster;
    }

    public function setCluster($cluster)
    {
        $this->cluster = $cluster;
    }

    public function getDeadline()
    {
        return $this->deadline;
    }

    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }
}