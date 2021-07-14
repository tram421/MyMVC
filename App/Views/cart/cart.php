
<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-25 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Giỏ hàng
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<a class="zmdi zmdi-close" href="<?= $_SERVER["REDIRECT_URL"] ?>"></a>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					
				<?php
					$productCart = [];
					$total = 0;
					$cart = new \App\Controllers\CartController;
					$user = new \App\Controllers\UserController;
					$product1 = new \App\Controllers\ProductController;

					if (isset($_COOKIE['username'])) {						
						$idUser = $user->getID($_COOKIE['username']);						
						$result = $cart->show($idUser);
							// dd($result->num_rows);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {								
								array_push($productCart, $row);							
							}							
						}							
					}					
					if (isset($_SESSION['carts']) && !isset($_COOKIE['username'])) {	
						$productCart_id = $_SESSION['carts'];
						foreach ($productCart_id as $key => $value) {
							$result = $product1->get($key);						
							$result['quantity']	= $value;
							array_push($productCart, $result);	
						}
						
						
					}
				
					// $getInfo = new \App\Controllers\CartController;
					// $productCart = [];
					
					foreach($productCart as $key=>$productCart) {
					// 	foreach ($value as $key1 =>$value1) {
					// 		$id = $key1;							
					// 	}
						// $productCart = $getInfo->show($value[$id]);
					


				?>
				
					<li class="header-cart-item flex-w flex-t m-b-12 bg-light hover-yellow-bg" id="row-d-<?=$productCart['id'] ?>">
							<div class="header-cart-item-img w-20">
								<img src="<?= $productCart['file'] ?>" alt="IMG">
							</div>

							<div class="w-60 p-t-8 m-r-8 header-cart-item-txt w-50">
								<a href="/san-pham/<?= Core\Helper::slug($productCart['name']) . "-id" . $productCart['id'] ?>.html" class="header-cart-item-name m-b-1 hov-cl1 trans-04">
									<?= $productCart['products_name'] ?>
								</a>
								<del class="color-red" >
									<?= number_format($productCart['price'],0,'.',',' )?> đ
								</del>
								<span class="">
									<?= number_format($productCart['price_sale'],0,'.',',' ) ?> đ
								</span>	
								<p class="fs-12">
									<?=$productCart['quantity']?> x  <?= number_format($productCart['price_sale'],0,'.',',' ) ?> đ = 
									<?= number_format((int)$productCart['quantity'] * (int)$productCart['price_sale'])?> đ
								</p>						
							</div>
							<!-- <div class=" header-cart-item-txt">
								aaa
							</div> -->
							<a class="pointer hover-red p-t-20" onclick="deleteItemCart(<?=$productCart['id']?>)">xóa</a>
				
						
						
					</li>

				<?php
				$total += $productCart['price_sale'] * $productCart['quantity'] ;
					}

				?>

					
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: <?= number_format($total,0,".",",") ?>
					</div>

					<div class="header-cart-buttons flex-w w-full float-right flex-row-reverse">
						<a href="/shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>