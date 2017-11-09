<?php
class Cluster
{
    private $id;
    private $title;
    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getId()
    {
        return $this->id;
    }
}