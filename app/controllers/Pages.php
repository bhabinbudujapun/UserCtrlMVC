<?php

class Pages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'User Mangt.',
            'description' => 'User Control System built on top of the MVC framework',
            'info' => 'User Control System built on top of the',
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About',
            'description' => 'User Control System built on top of the MVC framework',
            'info' => 'User Control System built on top of the',
        ];

        $this->view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'description' => 'User Control System built on top of the MVC framework',
            'info' => 'User Control System built on top of the',
        ];
        $this->view('pages/contact', $data);
    }
}
