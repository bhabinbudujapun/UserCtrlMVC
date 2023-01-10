<?php
class Root extends Database
{
    // Register New User
    public function register($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $password_confirmation = $data['password_confirmation'];
        
    }

    // Login User
    public function login($data)
    {
        echo 'Login' . '<br>';
        die;
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
    }
}
