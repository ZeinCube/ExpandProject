<?php

class User
{
    private $id;
    private $fullname;
    private $is_company;
    private $cluster;
    //ГДЕ РЕЙТИНГ БЛЯТЬ

    public function __construct($id, $fullname, $is_company, $cluster)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->is_company = $is_company;
        $this->cluster = $cluster;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getFullName()
    {
        return $this->fullname;
    }
    public function isCompany()
    {
        return $this->is_company;
    }
    public function getCluster()
    {
        return $this->cluster;
    }

}