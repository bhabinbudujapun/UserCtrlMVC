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
                if ($this->rootModel->register($data)) {
                    redirect('admin/login');
                }
            } else {
                $this->view('admin/register');
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
            $loginUser =  $this->rootModel->viewSingle($email, $password);

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
        //     var_dump($user);
        //     die;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['email'] = $user->email;
        redirect('users');
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
