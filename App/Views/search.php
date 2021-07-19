<div class="container">
    <h3 class="m-2 mt-5">Kết quả tìm kiếm của từ khóa: "<?=$search?>"</h3>
<div class="row isotope-grid" style="position: relative; height: 1717.4px;">
    <?php if (isset($product)) {
            if($product != NULL) {

            foreach($product as $key=>$value) {
                
    ?>
    <div class="col-sm-6 col-md-4 col-lg-2 p-b-35 isotope-item women" style="position: absolute; left: 0%; top: 0px;">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-pic hov-img0">
                <img src="<?php 
                            if ($value['file'] == '') {
                                echo '/template/images/no-image.jpg';
                            }else if (file_exists(substr($value['file'],1 )) == false) {
                                echo '/template/images/no-image.jpg';
                            } else {
                                echo $value['file'] ;
                            }
                            
                        ?>" alt="IMG-PRODUCT">
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                    <a href="/san-pham/<?= Core\Helper::slug($value['name']) . "-id" . $value['id'] ?>.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        <?= $value['name'] ?>
                    </a>
                    <del class="stext-105 cl3">
                        <?= number_format($value['price'],0,".",","); ?> đ
                    </del>
                    <span class="stext-105 cl3 color-red mtext-104">
                        <?= number_format($value['price_sale'],0,".",","); ?> đ
                    </span>

                </div>

             
            </div>
        </div>
    </div>
<?php  

            }
}
    } 
?>
</div>
<!-- Bài post -->
<div class="row">


    <?php if (isset($post)) {
        if ($post != NULL) {
            foreach ($post as $key=>$value) {
                
        
    ?>
    <div class="p-b-63">

        <div class="p-t-32">
            <h4 class="p-b-15">
                <a href="/post/id<?=$value['id']?>-slug<?=\Core\Helper::slug($value['title'])?>.html" class="ltext-108 cl2 hov-cl1 trans-04">
                    <?= $value['title'] ?>
                </a>
            </h4>
                <p class="stext-117 cl6">
                <?= \Core\Helper::decodeSafe(substr($value['short_content'],0,200)) ?>
            </p>

            <div class="flex-w flex-sb-m p-t-18">
                <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                    <span>
                        <span class="cl4">By</span> Admin  
                        <span class="cl12 m-l-4 m-r-6">|</span>
                    </span>

                    <span>
                       category:  <?= $value['category'] ?>
                        <span class="cl12 m-l-4 m-r-6">|</span>
                    </span>
                </span>

            </div>
        </div>
    </div>
    <?php      
            }
        }
        }
    ?>


</div>
</div>