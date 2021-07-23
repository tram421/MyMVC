    
<div class="container m-tb-20 ">
    <div class="row">
        <div class="btn col-md-12 col-sm-12">Tổng số tiền khách hàng đã mua thành công (Không tính phí ship): <h3><?= number_format($sumCost['sum'],0,'.',',') ?>đ</h3></div>
        <div class="btn col-md-12 col-sm-12">Tổng số đơn hàng: <h3><?= ($data != NULL) ? sizeof($data) : 0 ?></h3></div>
    </div>
     
    <div class="row">

     
       <?php 
    //    var_dump($data);
            if ($data != NULL) {
                if (sizeof($data) > 0) {
                    foreach($data as $key=>$value) {

                    // var_dump($sumCost) ;
       ?>
        <div class="col-md-6 col-sm-12 text-thin">
            <h3 class="m-tb-10"><?=$title?></h3>
            <p>
                Mã đơn hàng: MKL-<?= $value['order_id'] ?>
            </p>
            <p class="">
                Tổng tiền đã trả: <?= number_format($value['total'],0,'.',',') ?>
            </p>
            <p class="">
                Đơn hàng tạo: <?= $value['order_created'] ?>
            </p>
            <p class="">
                Trạng thái: <?= $value['state'] ?>
            </p>
            <a class="btn btn-success" href="/admin/orders/search?search_order=<?= $value['order_id'] ?>">Xem chi tiết đơn hàng</a>
            <hr>
        </div>
        
            <?php  
            }
                }
            }
            ?>
             
    </div>
</div>
