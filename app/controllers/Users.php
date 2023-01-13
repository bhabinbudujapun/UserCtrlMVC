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

    public function delete($id = null)
    {
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     die("IF PART");
        //     if ($this->userModel->deleteUser($_POST['id'])) {
        //         redirect('users');
        //     } else {
        //         die;
        //     }
        // } else {
        //     die("DETELE ELSE PART");
        //     $this->view('users/index');
        // }
        echo $_POST['id'];
        echo 'DELETE USER';
    }
}
