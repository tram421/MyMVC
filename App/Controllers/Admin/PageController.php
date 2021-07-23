<?php
namespace App\Controllers\Admin;
use App\Core\Auth;
use App\Models\Admin\Page;
use Core\Session;
use Core\Helper;
use App\Controllers\Admin\LogController;

class PageController extends Auth
{
    private $model;
    private $log;
    public function __construct()
    {
        parent::__construct();
        $this->log = new LogController;

    }
    public function manage($slug = '')
    {
        $this->model = new Page;
        if($slug != '') {            
            $page = $this->model->show($slug);
            
            $this->loadView('admin/main',[
                'title' => 'Quản lý trang '.$slug,
                'template' => 'page/edit',
                'data' => $page
            ]);
        }
    }
    private function formRequest()
    {
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            $data['id'] = isset($_POST['id']) ? $_POST['id'] : 0;
            $data['description']    = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';      
            $data['updated_at']     = date("Y-m-d H:i:s");
        }
        return $data;
    }
    public function update()
    {
        // dd($_SERVER['REQUEST_METHOD']);
        $this->model = new Page;
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $slug = (isset($_POST['slug'])) ? $_POST['slug'] : '';
             if ($slug != '') {
                 $page = $this->model->show($slug);
                
                if (is_null($page)) {
                    Session::addFlash('error', __NOT_EXIST_ID__);
                    return Helper::reload();
                }            
                $data = $this->formRequest(0);
            
                if ( !$data ) {
                    Session::addFlash('error', __NOT_RECEIVED_DATA__);
                    return Helper::reload();
                }
                $result = $this->model->update($data, $_POST['id']);
                if ($result) {

                    $action = 'Update all page[' . $_POST['id'] . ']';;
                    $this->log->addLog($this->user['id'], $action);

                    Session::addFlash('success', __UPDATE_SUCCESS__);
                    return Helper::reload();
                }
                
                Session::addFlash('error', __UPDATE_ERROR__);
                return Helper::reload();
             }
           
        }
        Session::addFlash('error', __NOT_EXIST_METHOD__);
         return Helper::reload();
    }

    
}