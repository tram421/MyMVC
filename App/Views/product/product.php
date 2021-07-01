


<?php 
		#Gọi giao diện catergory top ra: chứa danh mục, tách riêng để tái sử dụng cho các trang sản phẩm khác
		Core\Controller::loadView('categoryTop',[
			    'menusData' => $menusData
        ]);
   
?>


<!-- Product desktop -->

<div class="container">
    <div class="row align-items-start">
        <div class="col-md-10 col-12">
            <section class="bg0 p-t-23 p-b-140">
                <div class="container">

                    <div class="flex-w flex-sb-m p-b-52">
                        

                        <div class="flex-w flex-c-m m-tb-1 w-full justify-content-start">
                            <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                                <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                                <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                                Sort By
                            </div>
                        </div>
                        
                        <!-- Search product -->
                        <div class="dis-none panel-search w-full p-t-10 p-b-15">
                            <div class="bor8 dis-flex p-l-15">
                                <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                                    <i class="zmdi zmdi-search"></i>
                                </button>

                                <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                            </div>	
                        </div>
                        
                        <!-- Filter -->
                        <div class="dis-none panel-filter w-full p-t-10 w-50 w-mobile-100">
                            <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                                <div class="p-r-15 p-b-27">

                                    <ul>
                                        <li class="p-b-6">
                                            <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                                Newness
                                            </a>
                                        </li>

                                        <li class="p-b-6">
                                            <a href="#" class="filter-link stext-106 trans-04">
                                                Price: Low to High
                                            </a>
                                        </li>

                                        <li class="p-b-6">
                                            <a href="#" class="filter-link stext-106 trans-04">
                                                Price: High to Low
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id = "itemLoadMore" >
                    <div class="row isotope-grid">

                        <?php 
                            if(!is_null($product)) {
                            foreach ($product as $product) {
                        ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
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

                                    <a onclick=" showMoreInfo(<?=$product['id']?>)" 
                                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"
                                        style = "cursor:pointer">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="/san-pham/<?= Core\Helper::slug($product['name']) . "-id" . $product['id'] ?>.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            <?= $product['name'] ?>
                                        </a>
                                        <del class="stext-105 cl3">
                                            <?= number_format($product['price'],0,".",","); ?> đ
                                        </del>
                                        <span class="stext-105 cl3 color-red mtext-104">
                                            <?= number_format($product['price_sale'],0,".",","); ?> đ
                                        </span>
                                    </div>

                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <img class="icon-heart1 dis-block trans-04" src="/template/images/icons/icon-heart-01.png" alt="ICON">
                                            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/template/images/icons/icon-heart-02.png" alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                                        
                        <?php 
                            }
                        }
                        ?> 
                        </div>
                    <!-- <div id="productLoad"></div>                      -->
                </div>
                <!-- Load more -->
                      
			        <input type="hidden" value="1" id="page">
                    <div class="flex-c-m flex-w w-full p-t-45">
                        <a onclick = "loadMoreProduct(<?=$product['menu_id']?>)" style = "cursor: pointer" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                            Load More
                        </a>
                    </div>
	        </section>
        </div>
        <!-- aside -->
        <?php include __VIEW__.'/aside.php' ?>
    </div>
    

</div>


	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>
	<?php

		include 'modal_product.php';
	?>
	</div>