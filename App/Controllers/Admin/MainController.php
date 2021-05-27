<?php

namespace App\Controllers\Admin;

use App\Core\Auth;

class MainController extends Auth
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {
        return $this->loadView('admin/main', [
            'title' => 'Trang quản trị admin',
            'template' => 'home'
        ]);
    }

}