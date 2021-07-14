<?php 
echo '<pre>';
// var_dump($data);
echo '</pre>';
/*
  array(6) {
    ["id"]=>
    string(2) "34"
    ["receiver_name"]=>
    string(25) "Nguyễn Hoàng Mai Trâm"
    ["receiver_phone"]=>
    string(10) "0123456789"
    ["receiver_address"]=>
    string(70) "5A, Phó Cơ Điều, Phường 8, Thành phố Vĩnh Long, Vĩnh Long"
    ["state"]=>
    string(6) "create"
    ["created_at"]=>
    string(19) "2021-07-12 15:24:44"
  }

*/
?>



<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="all-tab" data-toggle="pill" href="#tab-for-all" role="tab" aria-controls="custom-tabs-four-all" aria-selected="true">Tất cả</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="create-tab" data-toggle="pill" href="#tab-for-create" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Create</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="confirmed-tab" data-toggle="pill" href="#tab-for-confirmed" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Confirmed</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="shipping-tab" data-toggle="pill" href="#tab-for-shipping" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Shipping</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="complete-tab" data-toggle="pill" href="#tab-for-complete" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Complete</a>
        </li>
    </ul>
    </div>
    <div class="card-body">
    <div class="tab-content" id="custom-tabs-four-tabContent">
        <div class="tab-pane fade active show" id="tab-for-all" role="tabpanel" aria-labelledby="all-tab">
            <?php include __VIEW__.'/admin/order/data_in_list.php'; ?>
        </div>
        <div class="tab-pane fade active show" id="tab-for-create" role="tabpanel" aria-labelledby="create-tab">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
        </div>
        <div class="tab-pane fade" id="tab-for-confirmed" role="tabpanel" aria-labelledby="confirmed-tab">
            Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
        </div>
        <div class="tab-pane fade" id="tab-for-shipping" role="tabpanel" aria-labelledby="shipping-tab">
            Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
        </div>
        <div class="tab-pane fade" id="tab-for-complete" role="tabpanel" aria-labelledby="complete-tab">
            Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
        </div>
    </div>
    </div>
    <!-- /.card -->
    </div>



