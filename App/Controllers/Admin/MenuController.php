<?php
namespace App\Controllers\Admin;

use App\Core\Auth;
use Core\Helper;
use Core\Session;
use App\Models\Admin\Menu;

class MenuController extends Auth
{
    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Menu();
    }
    public function create()
    {
       $menus = $this->model->get(); //lấy hết danh mục thay cho hàm getParent()
        return $this->loadView('admin/main',[
            'title'     => 'Thêm Danh Mục',
            'template'  => 'menu/add',
            'menus'     => $menus
        ]);
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';

            if ($data['name'] == '') {
                Session::addFlash('error', "Vui lòng nhập tên danh mục");
                return Helper::redirect('/admin/menus/add');
            }

            $data['parent_id']      = isset($_POST['parent_id']) ? (int) $_POST['parent_id'] : 0;
            $data['description']    = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
            $data['order_by']       = isset($_POST['order_by']) ? (int) $_POST['order_by'] : 0;
            $data['active']         = isset($_POST['active']) ? (int) $_POST['active'] : 0;
            $data['created_at']     = Helper::timeStamp();
            $data['updated_at']     = Helper::timeStamp();

            $result = $this->model->insert($data);
            #kiểm tra trùng lặp
            if ($result === -1) {
                Session::addFlash('error', 'Trùng danh mục');
                return Helper::redirect('/admin/menus/add');
            }
            Session::addFlash('success', 'Thêm danh mục thành công');
            return Helper::redirect('/admin/menus/add');
        }
        Session::addFlash('error', 'Phương thức không tồn tại');
        return Helper::redirect('/admin/menus/add');
    }
    public function index()
    {
        $menus = $this->model->get();
        $this->loadView('/admin/main', [
            'title'     => 'Danh sách danh mục',
            'template'  => 'menu/list',
            'menus'     => $menus
        ]);
    }

    public function edit($id = 0)
    {
        $data = $this->model->show($id);
        $menus = $this->model->get(); //lấy hết danh mục thay cho hàm getParent()
         $this->loadView('/admin/main', [
            'title'     => 'Chỉnh sửa danh mục',
            'template'  => 'menu/edit',
            'menus'     => $menus,
            'data'      => $data
        ]);
    }
    public function reEdit($id = 0, array $data)
    {
        $menus = new Menu(); 
         $this->loadView('/admin/main', [
            'title'     => 'Chỉnh sửa danh mục',
            'template'  => 'menu/edit',
            'menus'     => $menus->get(), //fix bug duplicate menu
            'data'      => $data
        ]);
    }
    public function update($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = $this->model->show($id);
            $menus = $this->model->get();
            if (is_null($data)) {
                Session::addFlash('error', "ID $id Không tồn tại");
                return Helper::redirect('/admin/menus/list');
            }
            $dataSet['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            $dataSet['parent_id']      = isset($_POST['parent_id']) ? (int) $_POST['parent_id'] : 0;
            $dataSet['description']    = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
            $dataSet['order_by']       = isset($_POST['order_by']) ? (int) $_POST['order_by'] : 0;
            $dataSet['active']         = isset($_POST['active']) ? (int) $_POST['active'] : 0;
            $dataSet['updated_at']     = Helper::timeStamp();


            if($dataSet['name'] == '') {
                Session::addFlash('error', 'Vui lòng nhập vào tên danh mục');
                #Giữ lại các thông số vừa nhập thay vì dùng redirect
                return  $this->reEdit($id, $dataSet);
            }
            // foreach ($menus as $key => $value) {
            //     //trong cùng 1 danh mục cha thì kiểm tra trùng lặp
            //     if ($value['parent_id'] == $dataSet['parent_id']) {
            //         if($value['name'] == $dataSet['name']) { //bị trùng tên trong cùng danh mục cha
            //             Session::addFlash('error', "Tên danh mục bị trùng trong cùng danh mục gốc");
            //             return $this->reEdit($id, $dataSet);
            //         }
            //     }
            // }
            $this->model->update($dataSet, $id);
            Session::addFlash('success', "Đã cập nhật thành công danh mục:".  $dataSet['name']);
            return Helper::redirect('/admin/menus/list');
        }
        Helper::redirect("/admin/menus/edit/$id");
    }
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = intval($_POST['id']);
            $menu = $this->model->show($id);
        
            #Kiểm tra nếu menu trả về Null => Lỗi
            if (is_null($menu)) {
                return json([
                    'error' => true,
                    'message' => 'ID không tồn tại'
                ]);
            }


            $result = $this->model->delete($id);
            if ($result) {
                return json([
                    'error' => false,
                    'message' => 'Xóa thành công'
                ]);
            }

            return json([
                'error' => true,
                'message' => 'Xóa lỗi vui lòng thử lại sau'
            ]);
        }

        Session::addFlash('error', 'Phương thức không chính xác');
        return Helper::redirect('/admin/menus/list');
    }
        
    public function editActive($id = -1, $stt = -1)
    {

            if ($id == -1 || $stt == -1) {
                Session::addFlash('error', "Không nhận được dữ liệu danh mục");
                return Helper::redirect('/admin/menus/list');
            }
            $status = ($stt == 1) ? 0 : 1;
            $data = ['active' => $status];
            $this->model->update($data, $id);

            Session::addFlash('success', 'Update thành công');
            return Helper::redirect('/admin/menus/list');
        

    }
}