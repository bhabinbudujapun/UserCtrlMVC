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
        $data = [
            'title' => 'Login',
            'description' => 'User Control System built on top of the MVC framework',
            'info' => 'User Control System built on top of the',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // echo $email . '<br>' . $password;
            $data = [$email, $password];
            $this->rootModel->login($data);
        } else {
            // echo 'login else part';
            // die;
            $this->view('admin/login', $data);
        }
    }
}
