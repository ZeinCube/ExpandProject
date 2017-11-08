<?php
class Request
{
    public $bd;
    public $requestText;
    public function newRequest($bd, $requestText){
        $this->bd = $bd;
        $this->requestText = $requestText;
    }
}