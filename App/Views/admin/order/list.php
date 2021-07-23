<?php 
echo '<pre>';
// var_dump($data);
echo '</pre>';

?>

<form class="input-group m-2" action="/admin/orders/search" method="GET">
    <input type="search" class="form-control form-control-sm" placeholder="Tìm kiếm theo mã đơn hàng" name="search_order">
    <div class="input-group-append mr-4">
        <button type="submit" class="btn btn-sm btn-default">
            <i class="fa fa-search"></i>
        </button>
    </div>
</form>

<div class="card card-primary card-outline card-outline-tabs">
    <?php  if(!isset($delete)) { ?>
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item pointer">
                    <a class="nav-link <?= ($_GET['query'] == 'admin/orders/manage/all') ? 'active': '' ?>" href="/admin/orders/manage/all" id="all-tab" role="tab" aria-controls="custom-tabs-four-all" aria-selected="true">Tất cả</a>
                </li>
                <li class="nav-item"  >
                    <a class="nav-link <?= ($_GET['query'] == 'admin/orders/manage/create') ? 'active': '' ?>" href="/admin/orders/manage/create" id="create-tab"  role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Create</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link <?= ($_GET['query'] == 'admin/orders/manage/confirmed') ? 'active': '' ?>" href="/admin/orders/manage/confirmed" id="confirmed-tab"  role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Confirmed</a>
                </li>
                <li class="nav-item"  >
                    <a class="nav-link <?= ($_GET['query'] == 'admin/orders/manage/shipping') ? 'active': '' ?>" href="/admin/orders/manage/shipping" id="shipping-tab" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Shipping</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link <?= ($_GET['query'] == 'admin/orders/manage/complete') ? 'active': '' ?>" href="/admin/orders/manage/complete"id="complete-tab" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Complete</a>
                </li>
            </ul>    
        </div>
    <?php } ?>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">
            <?= include __VIEW__.'/admin/order/data_in_list.php' ?>
            
            
        </div>
        
    </div>
    <!-- /.card -->
    </div>



