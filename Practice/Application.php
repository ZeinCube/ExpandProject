<?php
class Application
{
    private $student;
    private $DATE;
    private $accepted;
    private $taskID;

    public function pushApplication($studentID,$taskID){
        $this->student = $studentID;
        $this->taskID = $taskID;

    }

}