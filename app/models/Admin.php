<?php
class Admin
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    // Register New User
    public function register($data)
    {
        echo 'Register';
        die;
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $confirm_password = $data['confirm_password'];
        echo $name . ' ' . $email . ' ' . $password . ' ' . $confirm_password;
    }
}
