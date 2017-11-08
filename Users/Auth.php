<?php

class Auth
{
    public static function login($username, $password)
    {
        $hashed = hash('sha256', $password);
        $db = getConnectionInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $stmt->bind_param('ss', $username, $password);
        if ($stmt->execute() && $stmt->num_rows() == 1)
        {
            //TODO login code (uses $_SESSION)
            return true;
        } else return false;
    }
}