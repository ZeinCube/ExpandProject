<?php
/**
 * Created by PhpStorm.
 * User: t1meshft
 * Date: 08.11.2017
 * Time: 19:25
 */

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