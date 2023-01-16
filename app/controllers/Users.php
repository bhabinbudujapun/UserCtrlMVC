<?php

class Users extends Controller
{
    protected $rootModel;
    protected $userModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('admin/login');
        }

        // Instanc of model
        $this->rootModel = $this->model('Root');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $data = $this->userModel->getUsers();
        $this->view('users/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'gender' => $_POST['gender'],
                'address' => $_POST['address'],
                'marital_status' => $_POST['married'],
            ];
            if ($this->userModel->addUser($data)) {
                redirect('users');
            } else {
                die;
            }
        } else {
            $this->view('users/add');
        }
    }

    public function edit()
    {
        // echo 'hello';
        // die;
        if (['REQUEST_METHOD'] == 'POST') {
            echo 'hello88';
            die;
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'gender' => $_POST['gender'],
                'address' => $_POST['address'],
                'marital_status' => $_POST['married'],
            ];
            $this->userModel->editUser($data);
            die;
        } else {
            // echo 'hello77';
            // die;
            $this->view('users/edit');
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->userModel->deleteUser($_POST['id'])) {
                redirect('users');
            } else {
                die;
            }
        } else {
            redirect('users');
        }
    }
}
