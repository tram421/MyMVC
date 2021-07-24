<!-- Modal1 -->


<div class="container">
    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
        <button class="how-pos3 hov3 trans-04 js-hide-modal1">

            <img src="/template/images/icons/icon-close.png" alt="CLOSE">
        </button>

        <div class="row">
            <div class="col-md-4 col-lg-5 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <!-- <div class="wrap-slick3-dots"></div> -->
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="images/product-detail-01.jpg">
                                <div class="wrap-pic-w pos-relative">
                                    <img style="width:300px; margin: auto;" src="<?php 
                                                        if (isset($product['file'])) echo $product['file'];
                                                        if (isset($product_detail['file'])) echo $product_detail['file'];
                                                        
                                                ?>" alt="IMG-PRODUCT" id='img-modal'>

                                    <!-- <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a> -->
                                </div>
                            </div>

                            <!-- <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="/template/images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div> -->

                            <!-- <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="/template/images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-7 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14" id="modal_name">
                        <?php if (isset($product_detail['name'])) {
                                        echo $product_detail['name'];
                                    }
                                    
                                ?>
                    </h4>
                    <del class="stext-301 cl2" id="modal_price"></del>
                    <span class="mtext-105 cl2 color-red mtext-104" id="modal_price_sale"></span>

                    <div class="stext-102 cl3 p-t-23" id="modal_content">
                        <?php 
                                        if (isset($product_detail['content'])) echo $product_detail['content'];
                                    ?>
                    </div>

                    <!--  -->
                    <div class="p-t-33">
                        <!-- <div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div> -->

                        <!-- <div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div> -->

                        <!-- <div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div> -->
                        <!-- </div> -->
                        <form action="/cart/add" method="post">
                            <div class="flex-w flex-l-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="" name="num-product"
                                            value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>

                                    <input type="hidden" value="<?php 
													if (isset($product_detail['id'])) {
														echo $product_detail['id'];
													}
													if (isset($product['id'])) {
														echo $product['id'];
													}											
													?>" name="product_id" id="modal_id">
                                    <button
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
                                        type='submit'>
                                        <?= __ADD_TO_CART__ ?>
                                    </button>


                                </div>
                            </div>
                        </form>

                    </div>

       
                </div>
                <?php if (isset($value['factory_info'])) { ?>
                 <div class="row factory mb-3">
                     <h3>Thông số kỹ thuật: </h3>
                        <?php
                            if(isset($value['factory_info'])) {
                                if ($value['factory_info'] != NULL) {
                                    echo \Core\Helper::decodeSafe($value['factory_info']);
                                }
                            }
                            
                         ?>
                    </div>
                    <?php } ?>
            </div>
            
        </div>
    </div>
</div>