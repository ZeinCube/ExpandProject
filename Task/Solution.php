<?php
class Solution
{
    private $id;
    private $task;
    private $student;
    private $status;
    private $content;
    private $time;

    public function __construct()
    {
    }
    public function prepare($id, $task, $student, $status, $content, $time)
    {
        $this->id = $id;
        $this->task = $task;
        $this->student = $student;
        $this->status = $status;
        $this->content = $content;
        $this->time = $time;
    }

    public function add()
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("INSERT INTO solutions (task_id, student_id, status, content) ?,?,?,?");
        $stmt->bind_param('iiss', $this->task->getId(), $this->student->getId(), $this->status, $this->content);
        if ($stmt->execute())
        {
            $this->id = $stmt->insert_id;
            return true;
        }
        return false;
    }
}