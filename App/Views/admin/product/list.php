<div class="row">
    <div class="col-md-12">
        <a class="btn btn-app float-right mt-2 mr-4" href = "/admin/products/trashlist">
            <span class="badge bg-danger">
                <?php 
                    $model = new App\Models\Admin\Product;
                    echo $model->get(1)->num_rows;
                ?>
            </span>
            <i class="far fa-trash-alt"></i> Trash
        </a>
        
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 table-responsive">
        <table class="table ">
            <thead>
                    <tr>
                        <th style="width: 50px">STT</th>
                        <th style="width: 50px">ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th style="width: 200px">Danh Mục</th>
                        <th style="width: 100px">Hình Ảnh</th>
                        <th style="width: 150px">Trạng Thái</th>
                        <th style="width: 200px">Ngày Cập Nhật</th>
                        <th style="width: 50px">Sửa</th>
                        <th style="width: 50px">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                
            <?php 
                
                if ($data->num_rows > 0) {
                    $html = '';
                    $i = 1;
                    
                    while ($row = $data->fetch_assoc()) {

                        $html .= '<tr>';
                        $html .= '<td>' . $i++ . '</td>';
                        $html .= '<td>' . $row['id'] . '</td>';
                        $html .= '<td>' . $row['name'] . '</td>';
                        $html .= '<td>' . $row['menu_id'] . '</td>';
                        $html .= '<td>' . '<img   style="width: 60px; height: 40px" src="'.$row['file'].'" alt="">' . '</td>';
                        $html .= '<td>' . App\Helpers\Helper::active($row['active'], $row['id'], '/admin/products/editActive/') . '</td>';
                        $html .= '<td>' . $row['updated_at'] . '</td>';
                        $html .= "<td><a href = '/admin/products/edit/".$row['id']."'><i class = 'far fa-edit'></i></a></td>";
                        $html .= '<td><a href = "#" onclick="sendRequest(\'Bạn có chắc muốn xóa sản phẩm này không?\','.$row['id'].', \'/admin/products/trash\')" ><i class = "far fa-trash-alt"></i></a></td>';
                        $html .= '</tr>';

                    }
                    
                }
                echo $html;

            ?>

                </tbody>
            </table>
    </div>

</div>
<div><?= page($sumPage, $page); ?></div>


    