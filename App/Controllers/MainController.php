<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Menu;
class MainController extends Controller
{
    private $menuModel;
    public function __construct()
    {
        $this->menuModel = new Menu();
    }
    public function index()
    {
        $menusData = $this->menuModel->get();
        $this->loadView('main', [
            'title' => __HOME_PAGE__,
            'template' => "home",
            'menusData' => $menusData
            ]);
    }
}