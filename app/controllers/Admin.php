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
        $data = ['Hello', 'World'];
        $this->view('admin/register', $data);
    }

    public function login()
    {
        $data = ['Hello', 'World'];
        $this->view('admin/login', $data);
    }
}
