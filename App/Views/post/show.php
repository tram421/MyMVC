<section class="bg0 p-t-52 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
					
						<div class="p-t-32">

							<h4 class="ltext-109 cl2 p-b-28">
                                <?php //var_dump($data) ?>
								<?= \Core\Helper::decodeSafe($data['title']) ?>
							</h4>
                            <span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4">By</span> Admin  
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									Tạo ngày: <?=$data['created_at']?>
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>
                                <span>
									Chỉnh sửa: <?=$data['updated_at']?>
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>
								<span>
									category: <?=$data['category']?>
								</span>
							</span>
							<p class="stext-117 cl6 p-b-26">
                                <?= \Core\Helper::decodeSafe($data['short_content']) ?>
                            </p>

							<p class="stext-117 cl6 p-b-26">
                                <?= \Core\Helper::decodeSafe($data['description']) ?>
                            </p>
							
						</div>


					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">

						<div class="p-t-55">
							<h4 class="mtext-112 cl2 p-b-33">
								Categories
							</h4>
							<ul>
                                <?php  
                                    if (isset($cat)){
                                    foreach($cat as $key=>$value){
                                ?>
								<li class="bor18">
									<a href="/post/listCat/<?= $value['category'] ?>" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										<?= $value['category'] ?>
									</a>
								</li>

                                <?php } }?>
							</ul>
						</div>

						<div class="p-t-65">
							<h4 class="mtext-112 cl2 p-b-33">
								Sản phẩm nổi bật
							</h4>

							<ul>
                                <?php 
                                    if(isset($feature)) {
                                        if($feature != NULL) {
                                            foreach($feature as $key=>$value){
                                                
                                        
                                ?>
								<li class="flex-w flex-t p-b-30">
									<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-2 col-12">
										<img src="<?php 
                                        if ($value['file'] == '') {
                                            echo '/template/images/no-image.jpg';
                                        }else if (file_exists(substr($value['file'],1 )) == false) {
                                            echo '/template/images/no-image.jpg';
                                        } else {
                                            echo $value['file'] ;
                                        }
                                        
                                    ?>" alt="PRODUCT">
									</a>

									<div class="size-215 flex-col-t p-t-0 col-12">
										<a href="/san-pham/<?= Core\Helper::slug($value['name']) . "-id" . $value['id'] ?>.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            <?= $value['name'] ?>
                                        </a>

										 <del class="stext-105 cl3">
                                            <?= number_format($value['price'],0,".",","); ?> đ
                                        </del>
                                        <span class="stext-105 cl3 color-green mtext-104">
                                            <?= number_format($value['price_sale'],0,".",","); ?> đ
                                        </span>
									</div>
                                    <hr>
								</li>

                                <?php 
                                
                                            }
                                }
                                    }
                                ?>
								
							</ul>
						</div>


						<div class="p-t-50">
							<h4 class="mtext-112 cl2 p-b-27">
								Tags
							</h4>

							<div class="flex-w m-r--5">
                                <?php  
                                    if (isset($cat)){
                                    foreach($cat as $key=>$value){
                                ?>
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									<?= $value['category'] ?>
								</a>

								
                                <?php } }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>