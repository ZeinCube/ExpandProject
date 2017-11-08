<?php

class Auth
{
    public static function login($username, $password)
    {
        $hashed_pass = hash('sha256', $password);
        $db = getConnectionInstance();
        $stmt = $db->prepare("SELECT users.id as id, fullname, is_company, cluster_id, clusters.name as cluster_name FROM users, clusters WHERE username=? AND password=?");
        $stmt->bind_param('ss', $username, $hashed_pass);
        if ($stmt->execute() && $stmt->num_rows() == 1)
        {
            if (!session_start())
                return false;
            $_SESSION['auth']['username'] = $username;
            $_SESSION['auth']['password'] = $password; //chill, it's hashed ofc
            if ($stmt->bind_result($id, $fullname, $is_company, $cluster_id, $cluster_name) && $stmt->fetch())
            {
                $cluster = new Cluster($cluster_id, $cluster_name);
                $_SESSION['auth']['user'] = new User($id, $fullname, $is_company, $cluster);
            }
            return true;
        } else return false;
    }
    public static function isLoggedIn()
    {
        if (!session_start())
            return false;
        if (isset($_SESSION['auth']))
        {
            $db = getConnectionInstance();
            $stmt = $db->prepare("SELECT id FROM users WHERE username=? AND password=?");
            $stmt->bind_param('ss', $_SESSION['auth']['username'], $_SESSION['auth']['password']);
            return ($stmt->execute() && $stmt->num_rows() == 1);
        } else return false;
    }
    public static function getUser()
    {
        if (!self::isLoggedIn())
            return null;
        return $_SESSION['auth']['user'];
    }
    public static function logout()
    {
        session_start();
        unset($_SESSION['auth']);
    }
}