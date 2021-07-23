<div class="card-body">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6"></div>
            <div class="col-sm-12 col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline table-responsive" role="grid"
                    aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending" style="width:30px">STT</th>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending">Mã số</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending">Họ tên</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending">Số ĐT</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" 
                                aria-label="Engine version: activate to sort column ascending">Địa chỉ</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending">Quyền hạn</th>    
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending">Ngày tạo</th> 
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending">Sửa</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending">Xem thông tin đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php  
                        if ($data->num_rows > 0){
                            $key = 0;
                            while($value = $data->fetch_assoc()) {
                        ?>
                            
                            <tr class="odd">
                                <td><?= ++$key ?></td>
                                <td class="dtr-control sorting_1" tabindex="0">MKL-<?= $value['id']?></td>
                                <td  id='name'>  <?= $value['name']?></td>
                                <td><?= $value['email']?></td>
                                <td><?= $value['phone']?></td>
                                <td><?= $value['address']?></td>
                                <td><?= $value['permision']?></td>
                                <td><?= $value['created_at']?></td>
                                <td>
                                    <a href="/admin/user/edit/<?= $value['id'] ?>" class="btn btn-success"> Sửa</a>
                                </td>
                                <td>
                                    <?php 
                                        if ($value['permision'] == 'user') {
                                            ?>
                                             <a href="/admin/user/showOrder/<?= $value['id'] ?>" class="btn btn-success"> Xem Đơn hàng</a>
                                            <?php
                                        }
                                    ?>
                                   
                                </td>
                                
                            </tr>
                            
                            
                        <?php }
                            } else {
                        ?>    
                                <tr class="odd p-5">
                                    <td colspan="11">Danh sách rỗng</td>
                                </tr>
                                
                        <?php
                            }
                         ?>


                    
                    
                    </tbody>
                </table>
            </div>
        </div>
        <div><?= page($sumPage, $page); ?></div>
        
    </div>
</div>