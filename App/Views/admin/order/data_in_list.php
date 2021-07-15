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
                                aria-label="Browser: activate to sort column ascending">Tên Người nhận</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Điện thoại</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending">Địa chỉ</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" 
                                aria-label="Engine version: activate to sort column ascending">Phí ship</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending">Giá trị đơn hàng</th>    
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending">Tổng cộng</th>                         
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending">Trạng thái</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending">Ngày tạo</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending">Xem chi tiết</th>
                                <?php 
                                    if(isset($delete)) {
                                        if($delete != 2) {

                                ?>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending">Xóa</th>
                                <?php
                                        }}
                                ?>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php  
                         $del = 0;
                        if (isset($delete)) {
                            if ($delete == 1) {
                                $del = 1;
                            } else {
                                $del = 2 ;
                            }
                            
                        }

                        if ($data != NULL && $del!= 2 ){
                            foreach($data as $key=>$value) {
                        ?>
                            
                            <tr class="odd">
                                <td><?= ++$key ?></td>
                                <td class="dtr-control sorting_1" tabindex="0">MKL-<?= $value['id']?></td>
                                <td><?= $value['name']?></td>
                                <td><?= $value['phone']?></td>
                                <td><?= $value['address']?></td>
                                <td>
                                    <input style="width:100px" type="hidden" value="<?=$value['cost']?>" id="cost-<?=$value['id']?>">
                                    <input style="width:100px" type="number" value="<?=$value['ship']?>" id="shipcost-<?=$value['id']?>" name="ship">
                                    <button class="button btn-info button-show mt-2" style="width:100px" onclick="addShipCost(<?=$value['id']?>)">Lưu</button>
                                </td>
                                <td><?= number_format($value['cost'],0,'.',',')?> đ</td>
                                <td id="total-<?=$value['id']?>"><?php 
                                        if ($value['total'] == NULL) {
                                            echo '<span class="text-danger">' . number_format($value['cost'],0,'.',',') . 'đ</span>';
                                        } else {
                                            echo number_format($value['total'],0,'.',',') . 'đ';
                                        }                                    
                                
                                    ?>
                                </td>
                                <td>
                                    
                                    <div class="custom-control custom-radio" onclick="setState('create', <?=$value['id']?>)">
                                        <input class="custom-control-input" type="radio" id="customRadio1-<?=$value['id']?>" name="customRadio<?=$value['id']?>"
                                            <?= ($value['state'] == 'create') ? "checked" : '' ?>>
                                        <label for="customRadio1" class="custom-control-label">create</label>
                                    </div>
                                    <div class="custom-control custom-radio " onclick="setState('confirmed', <?=$value['id']?>, <?=$value['ship']?>)">
                                        <input class="custom-control-input" type="radio" id="customRadio2-<?=$value['id']?>" name="customRadio2<?=$value['id']?>"
                                            <?= ($value['state'] == 'confirmed') ? "checked" : '' ?>>
                                        <label for="customRadio2" class="custom-control-label">confirmed</label>
                                    </div>
                                    <div class="custom-control custom-radio" onclick="setState('shipping', <?=$value['id']?>)">
                                        <input class="custom-control-input" type="radio" id="customRadio2-<?=$value['id']?>" name="customRadio2<?=$value['id']?>"
                                            <?= ($value['state'] == 'shipping') ? "checked" : '' ?>>
                                        <label for="customRadio2" class="custom-control-label">shipping</label>
                                    </div>
                                    <div class="custom-control custom-radio"  onclick="setState('complete', <?=$value['id']?>)">
                                        <input class="custom-control-input" type="radio" id="customRadio2-<?=$value['id']?>" name="customRadio2<?=$value['id']?>"
                                            <?= ($value['state'] == 'complete') ? "checked" : '' ?>>
                                        <label for="customRadio2" class="custom-control-label">complete</label>
                                    </div>
                                </td>
                                <td><?= $value['created_at']?></td>
                                <td><button class="button btn-success button-show" onclick="showOrderDetail(<?=$value['id']?>)">Xem chi tiết</button></td>
                                <?php 
                                    if(isset($delete)) {
                                ?>
                                <td><button class="button btn-warning button-show" onclick="deleteOrder(<?=$value['id']?>)">X</button></td>
                                <?php
                                    }
                                ?>
                            </tr>
                            <tr class="odd hide bg-warning p-5" id="show-item-<?=$value['id']?>">
                                <td colspan="10" id="show-info-<?=$value['id']?>"></td>
                                <td class="bg-light"><button class="button btn-warning button-show" onclick="closeOrderDetail(<?=$value['id']?>)">X</button></td>
                            </tr>
                            
                            
                        <?php }
                            } else if ($del == 1){
                        ?>    
                                <tr class="odd p-5">
                                    <td colspan="11">Danh sách rỗng</td>
                                </tr>
                                
                        <?php
                            } else {
                                if ($data != NULL) {
                                foreach($data as $key=>$value) {
                         ?>


                                <tr class="odd">
                                <td><?= ++$key ?></td>
                                <td class="dtr-control sorting_1" tabindex="0">MKL-<?= $value['id']?></td>
                                <td><?= $value['name']?></td>
                                <td><?= $value['phone']?></td>
                                <td><?= $value['address']?></td>
                                <td><?=$value['ship']?></td>
                                <td><?= number_format($value['cost'],0,'.',',')?> đ</td>
                                <td id="total-<?=$value['id']?>"><?php 
                                        if ($value['total'] == NULL) {
                                            echo '<span class="text-danger">' . number_format($value['cost'],0,'.',',') . 'đ</span>';
                                        } else {
                                            echo number_format($value['total'],0,'.',',') . 'đ';
                                        } 
                                    ?>
                                </td>
                                <td>
                                   <?= $value['state']?>
                                </td>
                                <td><?= $value['created_at']?></td>
                                <td><button class="button btn-success button-show" onclick="showOrderDetail(<?=$value['id']?>)">Xem chi tiết</button></td>
                               
                            </tr>
                            <tr class="odd hide bg-warning p-5" id="show-item-<?=$value['id']?>">
                                <td colspan="10" id="show-info-<?=$value['id']?>"></td>
                                <td class="bg-light"><button class="button btn-warning button-show" onclick="closeOrderDetail(<?=$value['id']?>)">X</button></td>
                            </tr>

                         <?php       
                            }}else {
                        ?>
                                
                                <tr class="odd p-5">
                                    <td colspan="11">Danh sách rỗng</td>
                                </tr>
                        <?php   
                            }
                        }
                        ?>
                    
                    
                    </tbody>
                </table>
            </div>
        </div>
        <div><?= page($sumPage, $page); ?></div>
        
    </div>
</div>