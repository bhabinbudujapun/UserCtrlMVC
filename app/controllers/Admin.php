<?php

class Admin extends Controller
{

    protected $rootModel;

    public function __construct()
    {
        $this->rootModel = $this->model('Root');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm_password' => $_POST['confirm_password']
            ];
            if ($data['password'] == $data['confirm_password']) {
                $this->rootModel->register($data);
            } else {
            }
        } else {
            $this->view('admin/register');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loginUser =  $this->rootModel->login($email, $password);

            if ($loginUser) {
                $this->createSession($loginUser);
            } else {
                $this->view('admin/login');
            }
        } else {
            $this->view('admin/login');
        }
    }

    // Set the session
    public function createSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['email'] = $user->email;
        redirect('users/index');
    }

    // Destroy the session
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        session_destroy();
        redirect('admin/login');
    }
}
