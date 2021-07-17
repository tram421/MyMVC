<div class="row">
    <div class="col-md-12">

        <a class="btn btn-app float-right mt-2 mr-4" href = "/admin/post/trashlist">
            <span class="badge bg-danger">
             <?= $trashnum ?>
            </span>
            <i class="far fa-trash-alt"></i> Trash
        </a>  
        <?php if (!isset($is_trash)) {?>      
        <a class="btn btn-app mt-2 bg-success"  href = "/admin/posts/list">
            <i class="fas fa-spa"></i> Mới nhất
        </a>
        <a class="btn btn-app mt-2"  href = "/admin/posts/listDesc">
            <i class="fas fa-sort-numeric-up"></i> Cũ nhất
        </a>
        <?php } ?> 
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 table-responsive">
        <table class="table ">
            <thead>
                    <tr>
                        <th style="width: 50px">STT</th>
                        <th style="width: 50px">ID</th>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th style="width: 100px">Xuất bản</th>
                        <th style="width: 200px">Ngày Cập Nhật</th>
                        <?php if (!isset($is_trash)) {?>  
                        <th style="width: 50px">Sửa</th>
                        <?php }
                        else {?> 
                            <th style="width: 150px">Khôi phục</th>
                        <?php }
                        if (!isset($is_trash)) {
                            ?>  
                        <th style="width: 50px">Xóa</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                
            <?php 
                $html = '';
                if ($data != NULL){
                if (sizeof($data) > 0) {
                    
                    $i = 1;
                    
                    foreach ($data as $key=>$row) {
                        $html .= '<tr>';
                        $html .= '<td>' . $i++ . '</td>';
                        $html .= '<td>' . $row['id'] . '</td>';
                        $html .= '<td>' . $row['title'] . '</td>';
                        $html .= '<td>' . $row['category'] . '</td>';
                        $html .= '<td>' . App\Helpers\Helper::active($row['public'], $row['id'], '/admin/posts/editActive/', 'xuất bản') . '</td>';                        
                        $html .= '<td>' . $row['updated_at'] . '</td>';
                         if (!isset($is_trash)) {
                            $html .= "<td><a href = '/admin/post/edit/".$row['id']."'><i class = 'far fa-edit'></i></a></td>";
                         } else {
                             $html .= "<td><a href = '/admin/post/restore/".$row['id']."'><i class = 'fas fa-sync'></i></a></td>";
                         }
                        if (!isset($is_trash)) {
                            $html .= '<td><a href = "#" onclick="sendRequest(\'Bạn có chắc muốn xóa sản phẩm này không?\','.$row['id'].', \'/admin/post/trash\')" ><i class = "far fa-trash-alt"></i></a></td>';
                        }
                        $html .= '</tr>';

                    }
                    
                }}
                echo $html;

            ?>

                </tbody>
            </table>
    </div>

</div>
<div><?= page($sumPage, $page); ?></div>


    