<div class="row m-3">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $countOrder ?></h3>

                <p>Số đơn hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $countUser ?></h3>

                <p>Số user</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-12">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= number_format($totalIncome, 0, '.', ',') ?>đ</h3>

                <p>Tổng giá trị sản phẩm đã bán ra</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?=  $countProducts ?></h3>

                <p>số lượng sản phẩm hiện có</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="card-footer">
    <div class="row">
        <div class="col-sm-4 col-6">
            <div class="description-block border-right">
                <h1 class="mb-3 text-success text-uppercase font-weight-bold"><?= (!is_null($countOrderCreat)) ? sizeof($countOrderCreat) : 0 ?></h1>
                <span class="text-success text-uppercase">Đơn hàng đang chờ xác nhận</span>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 col-6">
            <div class="description-block border-right">
                <h2 class="mb-3 text-warning text-uppercase font-weight-bold"><?= (!is_null($countOrderConfirm)) ? sizeof($countOrderConfirm) : 0 ?></h2>
                <span class="text-warning text-uppercase">Đơn hàng đang chờ đóng gói</span>
            </div>
        </div>
        <div class="col-sm-4 col-6">
            <div class="description-block border-right">
                <h2 class="mb-3 text-dark text-uppercase font-weight-bold"><?= (!is_null($countOrderShipping)) ? sizeof($countOrderShipping) : 0 ?></h2>
                <span class="text-dark text-uppercase">Đơn hàng đang  vận chuyển</span>
            </div>
        </div>
        
    </div>
    <!-- /.row -->
</div>
<div class="card">
    <?php 
        // var_dump($log);
    ?>
    <div class="card-header border-0">
        <h3 class="card-title">LOG</h3>
        <div class="card-tools">
            <form action="/admin/main/search" method='GET'>
                <div class="input-group" >
                    
                <select name="filter" class="btn btn-light">
                    <option value="0" <?php if(isset($_GET['filter'])){ if($_GET['filter'] == 0) echo 'selected'; }  ?>>Lọc theo mã user</option>
                    <option value="1" <?php if(isset($_GET['filter'])){ if($_GET['filter'] == 1) echo 'selected'; }  ?>>Lọc theo hành động</option> 
                </select>
                <input class="form-control form-control-sidebar" type="search" value="<?= (isset($_GET['input'])) ? $_GET['input'] : '' ?>" aria-label="Search" name='input'>
               
                <button class="btn btn-warning" type='submit'>
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
                <tr>
                    <th  style = "width: 10px">STT</th>
                    <th  style = "width: 30px">ID User</th>
                    <th  style = "width: 150px">User Name</th>
                    <th style = "width: 500px">Hành động</th>
                    <th style = "width: 200px">Thời điểm</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!is_null($log)) {
                        if (sizeof($log) > 0) {
                            $i = 0;
                            foreach($log as $key=>$value) {

                            
                ?>
                <tr>
                    <td><?= ++$i ?></td>
                    <td><?= $value['user'] ?></td>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['action'] ?></td>
                    <td><?= $value['created_at'] ?></td>
                    
                </tr>
                <?php }
                        }
                } 
                ?>
            </tbody>
        </table>
        <div><?= page($sumPage, $page); ?></div>
    </div>
</div>