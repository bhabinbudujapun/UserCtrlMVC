<?php

class Admin extends Controller
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }

    public function register()
    {
    }

    public function login()
    {
    }
}
