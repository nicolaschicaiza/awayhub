<?php
include_once "lib/db.php";

class User extends DB
{
    function __construct()
    {
        parent::__construct();
    }

    public function userExists($user)
    {
        // $md5pass = md5($user['pass']);

        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user['username'], 'pass' => $user['password']]);
        return $query;
    }

    public function setUser($user)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $user]);
        return $query;
    }

    public function getByUser($user) //para retornar el nombre
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $user]);
        return $query;
    }

    public function getUsers(){
        $query = $this->connect()->prepare('SELECT * FROM usuarios');
        $query->execute([]);
        return $query;
    } 
}
