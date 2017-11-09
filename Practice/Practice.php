<?php
class Practice
{
    private $student;
    private $idToSend;
    private $deadLine;
    private $text;
    private $arrayOfApplications;
    private $cluster;

    public function addNewPractice($cluster ,$text ,$deadLine , $idToSend){
        $this->cluster = $cluster;
        $this->text = $text;
        $this->deadLine = $deadLine;
        $this->idToSend = $idToSend;
    }
}