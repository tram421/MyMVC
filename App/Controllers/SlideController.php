<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Slide;
class SlideController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Slide;
    }
    public function getSlideHTLM()
    {
        $this->loadView('slide',[
            'title' => 'slide',
            'data' => $this->model->get()
        ]);
    }   
}