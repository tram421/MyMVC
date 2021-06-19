<?php
namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\Admin\Slide;
use Core\Helper;
use Core\Session;

class SlideController extends Auth
{
    private $model;
    // public function __constructor()
    // {
    //      $this->model = new Slide;
    // }
    public function index()
    {
        $this->model = new Slide;
        return $this->loadView('/admin/main', [
            'title'     => __SLIDE_PAGE__,
            'template'  => '/slide/slide',
            'data'      => $this->model->get()
        ]);
    }

    private function formRequest($isCreateTime = 1)
    {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['file'] = (isset($_POST['file'])) ? Helper::makeSafe($_POST['file']) : '';
            if($data['file'] == '') {
                Session::addFlash('error',  __NOT_EXIST_IMAGE__);
                return Helper::redirect('/admin/slide');
            }
            $data['mini_content'] = (isset($_POST['mini_content'])) ? Helper::makeSafe($_POST['mini_content']) : '';
            $data['main_content'] = (isset($_POST['main_content'])) ? Helper::makeSafe($_POST['main_content']) : '';
            $data['button_content'] = (isset($_POST['button_content'])) ? Helper::makeSafe($_POST['button_content']) : '';
            $data['is_public'] = (isset($_POST['is_public'])) ? 1 : 0;

            if ($isCreateTime == 1) {
                $data['created_at'] = date("Y-m-d H:i:s");
            }            
            $data['updated_at'] = date("Y-m-d H:i:s");
            $data['sort_by'] = (isset($_POST['sort_by'])) ? (int)$_POST['sort_by'] : 0;

            

        }
        return $data;
    }

    public function add()
    {
        $this->model = new Slide;
        $data = [];
        $data = $this->formRequest();
        $this->model->insert($data);
        Session::addFlash('success', __ADD_SUCCESS__);
        return Helper::redirect('/admin/slide');
    }

    public function update()
    {
        $this->model = new Slide;
        $data = [];
        $data = $this->formRequest(0);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->update($data, $_POST['id']);
            Session::addFlash('success', __UPDATE_SUCCESS__);
            return Helper::redirect('/admin/slide');
        }
        
    }
    public function destroy()
    {
        $this->model = new Slide;
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $slide = $this->model->show($_POST['id']);
            if (is_null($slide)) {
                Session::addFlash('error', __NOT_EXIST_ID__);
                return json(['message' => 'error']);
            }
            $this->model->delete($slide, $_POST['id']);
            
            Session::addFlash('success',  __DESTROY_SUCCESS__);
            return json([
                'error' => false,
                'message' => __DESTROY_SUCCESS__
            ]);
           
            
            
        }
        
        Session::addFlash('error',  __NOT_EXIST_METHOD__);
        Helper::redirect('/admin/slide');
        return json(['message' => 'error']);
        
    }
       
}