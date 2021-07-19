<?php 

?>
<table class="table-noBlock table-bordered m-3 text-dark">
    <thead class="">
    <tr>
        <th style="width: 10px; text-align:center" class="p-tb-10">#</th>
        <th>Mã số đơn hàng</th>
        <th style="width: 200px; text-align:cente">Trạng thái đơn hàng</th>
        <th style="text-align:center">Sản phẩm</th>
    </tr>
    </thead>
    <tbody>
        <?php if($count != NULL) {
               for($i = 0; $i<sizeof($count); $i++){
                    $stt = $i + 1;
                    $id = $count[$i]['id'];
                    $index = 0;
                
        ?>
    <tr>
        <td class="p-lr-20 p-tb-10"><?=$stt?></td>
        <td>MKL-<?=$id?></td>
        <td>
        <div class="progress progress-xs m-lr-5">
            <div class="progress-bar progress-bar-danger bg-warning" style="width: 
            <?php
                $set=false;
                $state = '';
                foreach($listOrder as $key=>$value) {
                    if($listOrder[$key]['id'] == $id) {
                        $index = $key;
                        if($set == false) {
                            switch($listOrder[$key]['state']){
                                case 'create': 
                                    echo '25%';
                                    $set=true;
                                    $state = 'create';
                                    break;
                                case 'confirmed':
                                    echo '50%';
                                    $set=true;
                                    $state = 'confirmed';
                                    break;
                                case 'shipping':
                                    echo '75%';
                                    $set=true;
                                    $state = 'shipping';
                                    break; 
                                case 'complete':
                                    echo '100%';
                                    $set=true;
                                    $state = 'complete';
                                    break;      
                            }
                        }
                        
                    }
                }
            ?>"><?=$state?></div>
        </div>
        </td>
        <td>
            <table class="m-3">
                <thead>
                    <tr>
                        <td>Tên</td>
                        <td class="p-1">số lượng</td>
                        <td>Đơn giá</td>
                        <td>Thành tiền</td>
                    </tr>
                </thead>
            <?php 
                foreach($listOrder as $key=>$value) {
                    if($listOrder[$key]['id'] == $id) {
                        echo '<tr class=" hov-btn3">';
                        echo '<td class="p-3" style="text-align:center"> ' . $listOrder[$key]['name'].'</td>';
                        echo '<td style="text-align:center">' . $listOrder[$key]['quantity'].'</td>';
                        echo '<td class="p-3" style="text-align:center"> ' . number_format($listOrder[$key]['price_sale'],0,'.',',').' đ</td>';
                        echo '<td class="p-3" style="text-align:center"> ' . number_format($listOrder[$key]['price_sale']*$listOrder[$key]['quantity'],0,'.',',').' đ</td>';
                        echo '</tr>';
            ?>           
            <?php 
                    }
                }
            ?>
            </table>
             <span class="m-2 p-2">Tổng cộng: <?= number_format($listOrder[$index]['total'],0,'.',',')?> đ</span>
        </td>
    </tr>
        <?php 
            }
        }
        ?>
    </tbody>
</table>