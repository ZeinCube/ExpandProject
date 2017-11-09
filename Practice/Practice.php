<?php
class Practice
{
    private $id;
    private $company;
    private $title;
    private $content;
    private $deadline;

    public function __construct()
    {
    }
    public function prepare($id, $company, $title, $content, $deadline)
    {
        $this->id = $id;
        $this->company = $company;
        $this->title = $title;
        $this->content = $content;
        $this->deadline = $deadline;
    }
    public function add()
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("INSERT INTO practice_vacancies (company_id, title, content, deadline) VALUES (?,?,?,?)");
        $stmt->bind_param('issi', $this->company->getId(), $this->title, $this->content, $this->deadline);
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
        $stmt = $db->prepare("SELECT company_id, fullname as company_name, title, content, deadline 
          FROM practice_vacancies, users WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->bind_result($company_id, $company_name, $title, $content, $deadline);
        if ($stmt->execute() && $stmt->fetch())
        {
            $company = new User($company_id, $company_name, true, null);
            $practice = new Practice();
            $practice->prepare($id, $company, $title, $content, $deadline);
            return $practice;
        }
        return null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getDeadline()
    {
        return $this->deadline;
    }

    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

}