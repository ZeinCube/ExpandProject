<?php
include_once 'includes.php';
Auth::login('root','root');
if (!isset($_GET['action']))
    $req = "";
else
    $req = $_GET['action'];
switch ($req) {
    case 'viewTasks':
        $db = getConnectionInstance();
        $stmt = $db->prepare("SELECT * FROM tasks_list");
        $stmt->execute();
        $b = $stmt->get_result();
        $tasks = array();
        while ($a = $b->fetch_assoc())
        {
            array_push($tasks, $a);
        }
        include "Views/TaskList.php";
        break;
    case 'viewPractices':
        $practices = array();
        $db = getConnectionInstance();
        $stmt = $db->prepare("SELECT practice_vacancies.id as id, title, company_id, users.fullname as company_name FROM practice_vacancies, users
          WHERE users.id = practice_vacancies.company_id");
        $stmt->execute();
        $b = $stmt->get_result();
        while ($a = $b->fetch_assoc())
        {
            array_push($practices, $a);
        }
        include 'Views/Practices.php';
        break;
    case 'viewPractice':
        if (!isset($_GET['id']))
            header("refresh:1;url=index.php?action=viewTasks");
        $id = $_GET['id'];
        $p = Practice::getById($id);
        //var_dump($p);
        include 'Views/ShowPractice.php';
        break;
    default:
        header("refresh:1;url=index.php?action=viewTasks");
}