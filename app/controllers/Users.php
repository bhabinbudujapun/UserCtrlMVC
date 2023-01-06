<?php

class Users extends Controller
{
    public function index()
    {
        $data = ['Hello', 'World'];
        $this->view('users/index', $data);
    }
}
