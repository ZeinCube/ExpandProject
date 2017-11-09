<?php
class Application
{
    private $id;
    private $student;
    private $vacancy;
    private $state;

    public function __construct()
    {
    }
    public function prepare($id, $student, $vacancy, $state)
    {
        $this->id = $id;
        $this->student = $student;
        $this->vacancy = $vacancy;
        $this->state = $state;
    }
    public function add()
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("INSERT INTO applications (id, student_id, vacancy_id) VALUES (?,?,?)");
        $stmt->bind_param('issi', $this->id, $this->student->getId(), $this->vacancy->getId());
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
        $stmt = $db->prepare("SELECT student_id, fullname as student_name, vacancy_id, state FROM applications, users WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->bind_result($student_id, $student_name, $vacancy_id, $state);
        if ($stmt->execute() && $stmt->fetch())
        {
            $vacancy = Practice::getById($vacancy_id);
            $student = new User($student_id, $student_name, false, $vacancy->getCluster());
            $application = new Application();
            $application->prepare($id, $student, $vacancy, $state);
            return $application;
        }
        return null;
    }
    
    public function accept()
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("UPDATE applications SET state='accepted' WHERE id=?");
        $stmt->bind_param('issii', $this->author->getId(), $this->title, $this->content, $this->cluster->getId(),
            $this->deadline, $this->id);
        return $stmt->execute();
    }
    public function decline()
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("UPDATE applications SET state='rejected' WHERE id=?");
        $stmt->bind_param('issii', $this->author->getId(), $this->title, $this->content, $this->cluster->getId(),
            $this->deadline, $this->id);
        return $stmt->execute();
    }

}