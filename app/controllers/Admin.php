<?php

class Admin extends Controller
{

    // protected $adminModel;

    // public function __construct()
    // {
    //     $this->adminModel = $this->model('Admin');
    // }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $user = '';
            // if (count($_POST)) {
            //     $email = $_POST['email'];
            //     $password = md5($_POST['password']);
            //     $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE
            //     email = :email AND password = :password");

            //     $stmt->execute([
            //         ':email' => $email,
            //         ':password' => $password
            //     ]);

            //     $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // }
            // if ($user)
            //     return $user;
            // else
            //     return $user;

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            echo $name . ' ' . $email . ' ' . $password . ' ' . $confirm_password;
            die;
            $data = [$name, $email, $password, $confirm_password];
            // $this->adminModel->register($data);
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
            echo $email . '<br>' . $password;
        } else {
            // echo 'login else part';
            // die;
            $this->view('admin/login', $data);
        }
    }
}
