<div class="container  ">
    <div class="row">
        <div class="col-10 overflow-hidden">
            <?= \Core\Helper::decodeSafe($data['description'])?>
        </div>
        
           <?php include __VIEW__.'/aside.php' ?>
 
            
 
    </div>
    <div class="container mt-5 mb-5">
        <div class="col-10">
                 <!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">


                    <?php
                        if (!is_null($feature)) {
                            foreach ($feature as $key=>$value) {
                                
                         
                    ?>

					<div class="item-slick2 p-1 border m-2">
						<!-- Block2 -->
						<div class="block2 align-content-center">
							<div class="block2-pic hov-img0 ">
								<img class = "w-50 m-auto" src="<?= $value['file'] ?>" alt="IMG-PRODUCT">

								
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l">
									<a href="/san-pham/<?=\Core\Helper::slug($value['name'])?>-id<?=$value['id']?>.html" class="mtext-101 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 m-auto text-center">
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
       
    </div>
    
   
</div>
 