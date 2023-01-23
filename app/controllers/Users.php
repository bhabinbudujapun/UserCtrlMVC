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
        $start_page = 0;
        if (func_get_args()) {
            $start_page = (int)func_get_arg(1);
        } else {
            // $totalRecords = $this->userModel->getTotalRecords($pageNo);
            $data = $this->userModel->getUsers($start_page);
            $this->view('users/index', $data);
        }
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

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'gender' => $_POST['gender'],
                'address' => $_POST['address'],
                'marital_status' => $_POST['married'],
            ];
            if ($this->userModel->editUser($data)) {
                redirect('users');
            } else {
                die;
            }
        } else {
            $data = $this->userModel->getSingleUser($id);
            $this->view('users/edit', $data);
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
