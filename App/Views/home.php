		<!-- Slider -->
		<?php 
	$slideView = new App\Controllers\SlideController;
	$slideView->getSlideHTLM();
	?>


		<!-- Banner of category-->
		<?php 
		#Gọi giao diện catergory top ra: chứa danh mục, tách riêng để tái sử dụng cho các trang sản phẩm khác
		Core\Controller::loadView('categoryTop',[
			'menusData' => $menusData
			]) 
	?>


		<!-- Product -->
		<section class="bg0 p-t-0 p-b-140">
		    <div class="container">
		        <div class="p-b-10">
		        </div>

		        <div class="flex-w flex-sb-m p-b-52">
		            <!-- <div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
						Women
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
						Men
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
						Bag
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
						Shoes
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
						Watches
					</button>
				</div> -->

		            <!-- <div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div> -->

		            <!-- Search product -->
		            <!-- <div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div> -->

		            <!-- Filter -->
		            <!-- <div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

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

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div> -->
		        </div>
		        <!-- Related Products -->
		        <section class="sec-relate-product bg0 bg-light p-2">
		            <div class="container">
		                <div class="p-b-20">
		                    <h4 class="ltext-101  cl5 txt-center">
		                        Sản phẩm nổi bật
		                    </h4>
		                </div>

		                <!-- Slide2 -->
		                <div class="wrap-slick2">
		                    <div class="slick2">


		                        <?php
                        if (!is_null($feature)) {
                            foreach ($feature as $key=>$value) {
                                
                         
                    ?>

		                        <div class="item-slick2 p-1 border m-2 h-300">
		                            <!-- Block2 -->
		                            <div class="block2 align-content-center">
		                                <div class="block2-pic hov-img0 ">
		                                    <img src="<?php 
                                        if ($value['file'] == '') {
                                            echo '/template/images/no-image.jpg';
                                        }else if (file_exists(substr($value['file'],1 )) == false) {
                                            echo '/template/images/no-image.jpg';
                                        } else {
                                            echo $value['file'] ;
                                        }
                                        
                                    ?>" alt="IMG-PRODUCT" class="w-50 m-auto">

		                                    <a onclick="showMoreInfo(<?=$value['id']?>)" href="#"
		                                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
		                                        Quick View
		                                    </a>
		                                </div>

		                                <div class="block2-txt flex-w flex-t p-t-14">
		                                    <div class="block2-txt-child1 flex-col-l">
		                                        <a href="/san-pham/<?=\Core\Helper::slug($value['name'])?>-id<?=$value['id']?>.html"
		                                            class="mtext-101 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 m-auto text-center">
		                                            <?= $value['name'] ?>
		                                        </a>

		                                        <del class="stext-105 cl3 m-auto">
		                                            <?= number_format($value['price'],0,".",","); ?> đ
		                                        </del>
		                                        <span class="stext-105 cl3 color-red mtext-104 m-auto">
		                                            <?= number_format($value['price_sale'],0,".",","); ?> đ
		                                        </span>
		                                    </div>

		                                    <!-- <div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="/template/images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="/template/images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div> -->
		                                </div>
		                            </div>
		                        </div>
		                        <?php 
                       }
                        }
                    ?>



		                    </div>
		                </div>
		            </div>
		        </section>

		        <div class="line text-info">Khuyến mãi cực lớn, hàng hóa bao la. Điện thoại hotline: 0896653653 (CSKH) </div>

		        <section class="sec-relate-product p-2" style="background-color:#dfe0e6">
		            <div class="container">
		                <div class="p-b-20">
		                    <h4 class="ltext-101  cl5 txt-center">
		                        Sản phẩm mới nhất
		                    </h4>
		                </div>

		                <!-- Slide2 -->
		                <div class="wrap-slick2">
		                    <div class="slick2">


		                        <?php
                        if (!is_null($newest)) {
                            foreach ($newest as $key=>$value) {
                                
                         
                    ?>

		                        <div class="item-slick2 p-1 border m-2 h-300">
		                            <!-- Block2 -->
		                            <div class="block2 align-content-center">
		                                <div class="block2-pic hov-img0 ">
		                                    <img src="<?php 
												if ($value['file'] == '') {
													echo '/template/images/no-image.jpg';
												}else if (file_exists(substr($value['file'],1 )) == false) {
													echo '/template/images/no-image.jpg';
												} else {
													echo $value['file'] ;
												}
												
											?>" alt="IMG-PRODUCT" class="w-50 m-auto">

		                                    <a onclick="showMoreInfo(<?=$value['id']?>)" href="#"
		                                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
		                                        Quick View
		                                    </a>
		                                </div>

		                                <div class="block2-txt flex-w flex-t p-t-14">
		                                    <div class="block2-txt-child1 flex-col-l">
		                                        <a href="/san-pham/<?=\Core\Helper::slug($value['name'])?>-id<?=$value['id']?>.html"
		                                            class="mtext-101 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 m-auto text-center">
		                                            <?= $value['name'] ?>
		                                        </a>

		                                        <del class="stext-105 cl3 m-auto">
		                                            <?= number_format($value['price'],0,".",","); ?> đ
		                                        </del>
		                                        <span class="stext-105 cl3 color-red mtext-104 m-auto">
		                                            <?= number_format($value['price_sale'],0,".",","); ?> đ
		                                        </span>
		                                    </div>

		                                    <!-- <div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="/template/images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="/template/images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div> -->
		                                </div>
		                            </div>
		                        </div>
		                        <?php 
                       }
                        }
                    ?>



		                    </div>
		                </div>
		            </div>
		        </section>
		        <!-- Slide2 -->
				<section>
					<div class="wrap-slick1 boder pl-5 pr-5 h-300">
						<div class="slick1">


							<?php
						// var_dump($post);
							if (!is_null($post)) {
								foreach ($post as $key=>$value) {
						?>
							<div class="p-b-63 pr-5 pl-5 m-0">

								<div class="p-t-32">
									<h4 class="p-b-15">
										<a href="/post/id<?=$value['id']?>-slug<?=\Core\Helper::slug($value['title'])?>.html"
											class="ltext-108 cl2 hov-cl1 trans-04 text-info">
											<?= $value['title'] ?>
										</a>
									</h4>

									<p class="stext-117 cl6"><?=\Core\Helper::decodeSafe($value['short_content']) ?></p>
									<p class="stext-117 cl6">
										<?php sprintf(\Core\Helper::decodeSafe(substr($value['description'],0,200))) ?>..... </p>

									<div class="flex-w flex-sb-m p-t-18">
										<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
											<span>
												<span class="cl4">By</span> Admin
												<span class="cl12 m-l-4 m-r-6">|</span>
											</span>

											<span>
												tag: <?= $value['category'] ?>
												<span class="cl12 m-l-4 m-r-6">|</span>
											</span>

											<span>
												public: <?= $value['created_at'] ?>
											</span>
										</span>

									</div>
								</div>
							</div>
							<?php 
						}
							}
						?>



						</div>
					</div>
				</section>
		        <div class="p-b-20">
		            <h4 class="ltext-101  cl5 txt-center">
		                Sản phẩm giá sốc
		            </h4>
		        </div>

		        <!-- Slide2 -->
		        <div class="wrap-slick2">
		            <div class="slick2">


		                <?php
                        if (!is_null($saleProduct)) {
                            foreach ($saleProduct as $key=>$value) {
                                
                         
                    ?>

		                <div class="item-slick2 p-1 border m-2 h-300">
		                    <!-- Block2 -->
		                    <div class="block2 align-content-center">
		                        <div class="block2-pic hov-img0 ">
									 <img src="<?php 
                                        if ($value['file'] == '') {
                                            echo '/template/images/no-image.jpg';
                                        }else if (file_exists(substr($value['file'],1 )) == false) {
                                            echo '/template/images/no-image.jpg';
                                        } else {
                                            echo $value['file'] ;
                                        }
                                        
                                    ?>" alt="IMG-PRODUCT"class="w-50 m-auto">
		                         

		                            <a onclick="showMoreInfo(<?=$value['id']?>)" href="#"
		                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
		                                Quick View
		                            </a>
		                        </div>

		                        <div class="block2-txt flex-w flex-t p-t-14">
		                            <div class="block2-txt-child1 flex-col-l">
		                                <a href="/san-pham/<?=\Core\Helper::slug($value['name'])?>-id<?=$value['id']?>.html"
		                                    class="mtext-101 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 m-auto text-center">
		                                    <?= $value['name'] ?>
		                                </a>

		                                <del class="stext-105 cl3 m-auto">
		                                    <?= number_format($value['price'],0,".",","); ?> đ
		                                </del>
		                                <div class="stext-105 cl3 color-red mtext-104 m-auto">
		                                    <?= number_format($value['price_sale'],0,".",","); ?> đ
		                                    <span class="stext-105 cl3 text-success color-blue stext-109 ml-3">
		                                        Giảm <?= number_format($value['percent'],1) ?> %
		                                    </span>
		                                </div>


		                            </div>


		                        </div>
		                    </div>
		                </div>
		                <?php 
                       }
                        }
                    ?>



		            </div>
		        </div>
					<div class="p-b-20">
						<h4 class="ltext-101  cl5 txt-center">
							Tivi Samsung
						</h4>
					</div>
				<!-- Slide2 -->
		        <div class="wrap-slick2">
		            <div class="slick2">


		                <?php
                        if (!is_null($tiviSamsung)) {
                            foreach ($tiviSamsung as $key=>$value) {
                                
                         
                    ?>

		                <div class="item-slick2 p-1 border m-2 h-300">
		                    <!-- Block2 -->
		                    <div class="block2 align-content-center">
		                        <div class="block2-pic hov-img0 ">
									 <img src="<?php 
                                        if ($value['file'] == '') {
                                            echo '/template/images/no-image.jpg';
                                        }else if (file_exists(substr($value['file'],1 )) == false) {
                                            echo '/template/images/no-image.jpg';
                                        } else {
                                            echo $value['file'] ;
                                        }
                                        
                                    ?>" alt="IMG-PRODUCT"class="w-50 m-auto">
		                         

		                            <a onclick="showMoreInfo(<?=$value['id']?>)" href="#"
		                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
		                                Quick View
		                            </a>
		                        </div>

		                        <div class="block2-txt flex-w flex-t p-t-14">
		                            <div class="block2-txt-child1 flex-col-l">
		                                <a href="/san-pham/<?=\Core\Helper::slug($value['name'])?>-id<?=$value['id']?>.html"
		                                    class="mtext-101 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 m-auto text-center">
		                                    <?= $value['name'] ?>
		                                </a>

		                                <del class="stext-105 cl3 m-auto">
		                                    <?= number_format($value['price'],0,".",","); ?> đ
		                                </del>
		                                <div class="stext-105 cl3 color-red mtext-104 m-auto">
		                                    <?= number_format($value['price_sale'],0,".",","); ?> đ
		                                </div>


		                            </div>


		                        </div>
		                    </div>
		                </div>
		                <?php 
                       }
                        }
                    ?>



		            </div>
		        </div>

		    </div>



		</section>

		<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		    <div class="overlay-modal1 js-hide-modal1"></div>
		    <?php

		include __VIEW__.'/product/modal_product.php';
	?>
		</div>