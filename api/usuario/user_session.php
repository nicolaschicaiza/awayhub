<?php

class UserSession
{

    public function __construct()
    {
        session_start();
    }

    public function setCurrentUser($user)
    {
        $_SESSION['user'] = $user;  //como si se usara POST
    }

    public function getCurrentUser()
    {
        return $_SESSION['user'];
    }

    public function closeSession()
    {
        session_unset();
        session_destroy();
    }
}


?>