<?php
class Solution
{
    private $id;
    private $task;
    private $student;
    private $status;
    private $content;
    private $created;

    public function __construct()
    {
    }
    public function prepare($id, $task, $student, $status, $content, $created)
    {
        $this->id = $id;
        $this->task = $task;
        $this->student = $student;
        $this->status = $status;
        $this->content = $content;
        $this->created = $created;
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
    public static function getById($id)
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("SELECT task_id, student_id, users.fullname as student_name, state, content, created 
          FROM solutions, users WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->bind_result($task_id, $student_id, $student_name, $state, $content, $created);
        if ($stmt->execute() && $stmt->fetch())
        {
            $task = Task::getById($task_id);
            $student = new User($student_id, $student_name, false, $task->getCluster());
            $solution = new Solution();
            $solution->prepare($id, $task, $student, $content, $created);
            return $solution;
        }
        return null;
    }
}