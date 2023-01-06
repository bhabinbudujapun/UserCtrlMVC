<?php

class Pages extends Controller
{
    public function index()
    {
        $data = ['Hello', 'World'];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = ['Hello', 'World'];
        $this->view('pages/about', $data);
    }

    public function contact()
    {
        $data = ['Hello', 'World'];
        $this->view('pages/contact', $data);
    }
}
