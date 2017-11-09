<?php
class Practice
{
    private $id;
    private $company;
    private $title;
    private $content;
    private $deadline;
    private $cluster;

    public function __construct()
    {
    }
    public function prepare($id, $company, $title, $content, $deadline, $cluster)
    {
        $this->id = $id;
        $this->company = $company;
        $this->title = $title;
        $this->content = $content;
        $this->deadline = $deadline;
        $this->cluster = $cluster;
    }
    public function add()
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("INSERT INTO practice_vacancies (company_id, title, content, deadline, cluster_id) VALUES (?,?,?,?,?)");
        $stmt->bind_param('issi', $this->company->getId(), $this->title, $this->content, $this->deadline, $this->cluster->getId());
        if ($stmt->execute())
        {
            $this->id = $stmt->insert_id;
            return true;
        }
        return false;
    }
    public function commit()
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("UPDATE practice_vacancies SET company_id=?, title=?, content=?, cluster_id=?, deadline=? WHERE id=?");
        $stmt->bind_param('issii', $this->author->getId(), $this->title, $this->content, $this->cluster->getId(),
            $this->deadline, $this->id);
        return $stmt->execute();
    }
    public static function getById($id)
    {
        $db = getConnectionInstance();
        $stmt = $db->prepare("SELECT company_id, fullname as company_name, practice_vacancies.title, content, 
          deadline, cluster_id, clusters.title as cluster_name FROM practice_vacancies, users, clusters 
          WHERE practice_vacancies.id=?");
        $stmt->bind_param('i', $id);
        $stmt->bind_result($company_id, $company_name, $title, $content, $deadline, $cluster_id, $cluster_name);
        if ($stmt->execute() && $stmt->fetch())
        {
            $company = new User($company_id, $company_name, true, null);
            $cluster = new Cluster($cluster_id, $cluster_name);
            $practice = new Practice();
            $practice->prepare($id, $company, $title, $content, $deadline, $cluster);
            return $practice;
        }
        return null;
    }

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