<?php
class Student extends User
{
    private $cluster;
    public function __construct($id, $name, $cluster)
    {
        parent::__construct($id, $name);
        $this->cluster = $cluster;
    }
    public function getCluster()
    {
        return $this->cluster;
    }
}