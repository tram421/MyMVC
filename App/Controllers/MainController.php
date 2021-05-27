<?php
namespace App\Controllers;
use Core\Controller;
class MainController extends Controller{
    public function index()
    {
        $data = ['title' => "Trang main"];
        $this->loadView('main', $data);
    }
}