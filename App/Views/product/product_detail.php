
<body class="animsition">
	


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				<?= __HOME_PAGE__ ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
            <a href="/san-pham" class="stext-109 cl8 hov-cl1 trans-04">
				<?= __PRODUCT_PAGE__ ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="/danh-muc/<?= \Core\Helper::slug($product_detail['menu_name'])?>-id<?=$product_detail['menu_id']?>.html" class="stext-109 cl8 hov-cl1 trans-04">
				<?= $product_detail['menu_name'] ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?= $title ?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<?php include "modal_product.php"; ?>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab"><?= __MORE_INFORMATION__ ?></a>
						</li>

					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?= Core\Helper::decodeSafe($product_detail['description']) ?>
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto text-thin factory">
									<?= Core\Helper::decodeSafe($product_detail['factory_info']) ?>
								</div>
							</div>
						</div>

						
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">

			<span class="stext-107 cl6 p-lr-25">
				 <?= __CATEGORY__ . ': ' .$product_detail['menu_name'] ?>
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					<?= __RELATED_PRODUCTS__ ?>
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">


                    <?php
                        if (!is_null($relate)) {
                            foreach ($relate as $key=>$value) {
                                
                         
                    ?>

					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
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
                                        
                                    ?>" alt="IMG-PRODUCT">

							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l">
									<a href="/san-pham/<?=\Core\Helper::slug($value['name'])?>-id<?=$value['id']?>.html" class="mtext-101 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 m-auto text-center">
										<?= $value['name'] ?>
									</a>

									<del class="stext-105 cl3 m-auto">
                                        <?= number_format($value['price'],0,".",","); ?> ??
                                    </del>
                                    <span class="stext-105 cl3 color-red mtext-104 m-auto">
                                        <?= number_format($value['price_sale'],0,".",","); ?> ??
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
		

	
	