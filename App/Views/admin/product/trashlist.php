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
                        <th style="width: 100px">Khôi phục</th>
                        <th style="width: 50px">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                
            <?php 
                
                if ($data->num_rows > 0) {
                    $html = '';
                    $i=1;
                    while ($row = $data->fetch_assoc()) {

                        $html .= '<tr>';
                        $html .= '<td>' . $i++ . '</td>';
                        $html .= '<td>' . $row['id'] . '</td>';
                        $html .= '<td>' . $row['name'] . '</td>';
                        $html .= '<td>' . $row['menu_name'] . '</td>';
                        $html .= '<td>' . '<img   style="width: 60px; height: 40px" src="'.$row['file'].'" alt="">' . '</td>';

                        $html .= '<td style = "text-align: center;"><a href = "#'.$row['id'].' " onclick="sendRequest(\'Bạn có chắc muốn khôi phục?\','
                                                                                        .$row['id']
                                                                                        .', \'/admin/products/restock\')"><i class="fas fa-sync"></i></a></td>';
                        
                        $html .= '<td><a href = "#" onclick="sendRequest(\'Xóa không thể khôi phục, bạn có chắc muốn xóa?\'
                                                                            ,'. $row['id'] .'
                                                                            , \'/admin/products/destroy\')" ><i class = "far fa-trash-alt"></i></a></td>';
                        $html .= '</tr>';

                    }
                    
                }
                echo $html;

            ?>

                </tbody>
            </table>
    </div>

</div>
<div><?= page($sumPage, $page) ?></div>


    