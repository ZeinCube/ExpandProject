<?php

class Request
{
    private $db;
    public function __construct()
    {
        $this->db = getConnectionInstance();
    }
    //public function
}