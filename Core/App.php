<?php
namespace Core;
use Core\Route;

class App extends Route
{
    public function __construct()
    {
        parent::__construct();


        $this->controller = new $this->controller;
      
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}