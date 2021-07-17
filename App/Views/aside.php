<aside class="col-md-2 col-12 hidden-mobile border pt-2">
    <h5>Sản phẩm tiêu biểu</h5>
    <?php 
    // var_dump($feature);
    if (isset($feature)) {
        if ($feature != NULL) {
            foreach($feature as $key=>$product) {
                 ?>
                 <div class="p-b-1 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="">
                                    <img src="<?php 
                                        if ($product['file'] == '') {
                                            echo '/template/images/no-image.jpg';
                                        }
                                        if (file_exists(substr($product['file'],1 )) == false) {
                                            echo '/template/images/no-image.jpg';
                                        } else {
                                            echo $product['file'] ;
                                        }
                                        
                                    ?>" alt="IMG-PRODUCT">

                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="/san-pham/<?= Core\Helper::slug($product['name']) . "-id" . $product['id'] ?>.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            <?= $product['name'] ?>
                                        </a>
                                        <del class="stext-105 cl3">
                                            <?= number_format($product['price'],0,".",","); ?> đ
                                        </del>
                                        <div class="stext-105 cl3 color-red stext-111 ">
                                            <?= number_format($product['price_sale'],0,".",","); ?> đ
                                            <span class="color-green mtext-107">-<?= number_format($product['percent'],1,".",","); ?>%</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                 <hr>
                


                <?php 
            }
        }
    }
    ?>
</aside>