<?php
namespace App\Controllers\Admin;
use App\Core\Auth;
use App\Models\Admin\Post;
use Core\Session;
use Core\Helper;
class PostController extends Auth
{
    private $model;
    public function __construct()
    {
        $this->model = new Post;
    }
     
    public function add()
    {
        $this->loadView('admin/main',[
            'title' => 'Tạo bài viết',
            'template' => '/post/add'
        ]);
    }
     private function formRequest($isCreateTime = 1)
    {
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $data['title'] = isset($_POST['title']) ? Helper::makeSafe($_POST['title']) : '';
            $data['category'] = isset($_POST['category']) ? $_POST['category'] : '';
            $data['short_content'] = isset($_POST['short_content']) ? Helper::makeSafe($_POST['short_content']) : '';
            $data['description']    = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';         
            $data['public']         = isset($_POST['public']) ? 1 : 0;
            $data['updated_at']     = date("Y-m-d H:i:s");
            if ($isCreateTime == 1) {
                        $data['created_at'] = date("Y-m-d H:i:s");
            }
        }
        return $data;
    }


    public function create()
    {
        $data = $this->formRequest(1);
        $this->model->insert($data);
        Session::addFlash('success', 'Thêm bài viết thành công');
        return Helper::reload();
       
    }

    public function listDesc()
    {
        $this->model = new Post;
        $trash =  $this->model->get('desc', 'all', 1);
        $count1 = 0;
        if ($trash != NULL) {
            $count1 = sizeof($trash);
        }
        $model = new Post;
         $data = $model->get();
        
        //  dd($data);
         $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;     
        $limit = 5;
        $offset =0;        
        $sumPage = 1;
        // dd($data);
        if ($data != NULL) {
            $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;     
            $limit = 5;
            $offset = ($page - 1) * $limit;            
            $sumPage = ceil(sizeof($data) / $limit);
        }
        $this->loadView('admin/main',[
            'title' => 'Tạo bài viết',
            'template' => '/post/list',
            'data'  => $data,
            'page' => $page,
            'sumPage' => $sumPage,
            'trashnum' => $count1
        ]);
    }
    public function list()
    {   
        $this->model = new Post;
        $trash =  $this->model->get('desc', 'all', 1);
        $count1 = 0;
        if ($trash != NULL) {
            $count1 = sizeof($trash);
        }
        // dd($trash);
        $model = new Post;
         $data = $model->get('desc');
         $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;     
        $limit = 5;
        $offset =0;        
        $sumPage = 1;
        if ($data != NULL) {
            $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;     
            $limit = 5;
            $offset = ($page - 1) * $limit;            
            $sumPage = ceil(sizeof($data) / $limit);
        }
        // dd($count1);
        $this->loadView('admin/main',[
            'title' => 'Danh sách bài viết',
            'template' => '/post/list',
            'data'  => $data,
            'page' => $page,
            'sumPage' => $sumPage,
            'trashnum' => $count1
        ]);
    }

    public function trashList()
    {
        $this->model = new Post;
        $trash =  $this->model->get('desc', 'all', 1);
        $count = 0;
        if ($trash != NULL) {
            $count = sizeof($trash);
        }
        $model = new Post;
         $data = $model->get('desc', 'all', 1);
        //  dd($data);
         $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;     
        $limit = 5;
        $offset =0;        
        $sumPage = 1;
        if ($data != NULL) {
            $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;     
            $limit = 5;
            $offset = ($page - 1) * $limit;            
            $sumPage = ceil(sizeof($data) / $limit);
        }
        
        $this->loadView('admin/main',[
            'title' => 'Thùng rác',
            'template' => '/post/list',
            'data'  => $data,
            'page' => $page,
            'sumPage' => $sumPage,
            'trashnum' => $count,
            'is_trash' => true
        ]);
    }

    public function editActive($id = 0, $stt = -1)
    {
        if ($id == 0 || $stt == -1) {
            Session::addFlash('error', __DATA_ERROR__);
            return Helper::reload();
        }

        $active = $stt == 1 ? 0 : 1;
        $data = ['public' => $active];
        $this->model->update($data, $id);

        Session::addFlash('success', __UPDATE_SUCCESS__);
        return Helper::reload();

    }
    public static function showCategory()
    {
        $html="<option value = 'guide'>Guide</option>
            <option value = 'review'>Review</option>
            <option value = 'experience'>Experience</option>
            <option value = 'other'>Other</option>";
        return $html;
    }
    public function edit($id = 0)
    {
        $data = $this->model->show($id);
        $cat = $this->showCategory();
        // $menuName = $this->menuModel->getname($idMenu);
        $this->loadView('/admin/main',[
            'title' => 'Sửa bài viết',
            'template' => '/post/edit',
            'data' => $data,
            'cat' => $cat
        ]);
    }

    
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = $this->model->show($_POST['id']);
            if (is_null($product)) {
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
                Session::addFlash('success', __UPDATE_SUCCESS__);
                 return Helper::redirect('/admin/posts/listDesc');
            }
            
            Session::addFlash('error', __UPDATE_ERROR__);
             return Helper::reload();
        }
        Session::addFlash('error', __NOT_EXIST_METHOD__);
         return Helper::reload();
    }
    public function trash()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = (isset($_POST['id'])) ? (int)$_POST['id'] : 0;
            if ($id != 0) {
                $data = ['is_delete' => 1];
                $this->model->update($data, $id);
                 return json(['mess' => 'success']);
            }
        }
    }
    public function restore($id = 0)
    {      
        if ($id != 0) {
            $data = ['is_delete' => 0];
            $this->model->update($data, $id);
            Session::addFlash('success', 'Khôi phục thành công');
            return Helper::reload();
        }
         return Helper::reload();
    }
      
}