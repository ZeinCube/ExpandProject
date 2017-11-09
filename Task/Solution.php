<?php
class Solution
{
    private $id;
    private $task;
    private $student;
    private $state;
    private $content;
    private $created;

    public function __construct()
    {
    }
    public function prepare($id, $task, $student, $state, $content, $created)
    {
        $this->id = $id;
        $this->task = $task;
        $this->student = $student;
        $this->state = $state;
        $this->content = $content;
        $this->created = $created;
    }

    public function add()
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("INSERT INTO solutions (task_id, student_id, state, content) VALUES (?,?,?,?)");
        $stmt->bind_param('iiss', $this->task->getId(), $this->student->getId(), $this->state, $this->content);
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
            $solution->prepare($id, $task, $student, $state, $content, $created);
            return $solution;
        }
        return null;
    }
    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getStudent()
    {
        return $this->student;
    }

    public function setStudent($student)
    {
        $this->student = $student;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCreated()
    {
        return $this->created;
    }

}