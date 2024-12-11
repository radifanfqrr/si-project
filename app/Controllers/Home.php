<?php

namespace App\Controllers;
use App\Models\Mahasiswa_model;

class Home extends BaseController
{
    public function index()
    {
        echo view("adminHeader");
        echo view("adminNavbar");
        echo view("adminSidebar");
        echo view("Home");
        echo view("adminFooter");
    }
}
