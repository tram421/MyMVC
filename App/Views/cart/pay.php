


	
<body class="animsition">


	<!-- Content page -->
    <form method = "POST" action="/cart/order">
	<section class="bg0 p-tb-80">
		<div class="container">
			<div class="flex-w flex-tr">
                
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                        <?php if(isset($_COOKIE['username'])) {?>
                            <h4 class="mtext-105 cl2 txt-center p-b-30"> Thông tin giao hàng</h4>
                            <label class=""><?= __FULL_NAME__?>: <?= $customer['name']?></label>
                            <label class=""><?= __EMAIL__?>: <?= $customer['email']?></label>
                            <label class=""><?= __PHONE__?>: <?= $customer['phone']?></label>
                            <label class=""><?= __ADDRESS__?>: <?= $customer['address']?></label>
                        <?php }   ?>

                        <h4 class="mtext-105 cl2 txt-center p-b-30"> Đơn hàng</h4>
                        
                        <div>
                        <table class="table"><?= $list; ?> </table>
                        </div>
                        <label for=""> Tổng cộng: <?= number_format($totalcost, 0, '.', ',') ?> đ + ship
                    </label>
                        <label for=""> Phí ship: Liên hệ</label>
                        <p class="text-thin">Nhân viên sẽ gọi điện xác nhận đến cho quí khách ngay khi đơn hàng được xác nhận, vui lòng giữ điện thoại.
                            Kiểm tra email của bạn</p>
                        
						
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-r-20 p-t-55 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-20">
                        
                        <div class="flex-w w-full p-b-5 p-lr-40">
                            <input type="checkbox" value="otherPlace" name="otherPlace" id="Check" class="m-r-5" style="width: 30px;height: 40px;"
                                <?= (isset($_COOKIE['username'])) ? '' : 'checked onclick="return false;"'  ?>>
                            <h4 class="mtext-105 cl2 txt-center p-b-30"> <?= (isset($_COOKIE['username'])) ? 'Giao đến địa chỉ khác' : 'Thông tin người nhận hàng'  ?></h4>
                            <div class="bor8 m-b-20 how-pos4-parent flex-w w-full">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" value = "" placeholder="Họ tên người nhận *">
                            </div>                        
                            <div class="flex-w w-full p-b-42 ">
                                <span class="fs-18 cl5 txt-center size-211">
                                    <span class="lnr lnr-phone-handset "></span>
                                </span>
                                <label class="">Điện thoại: * </label>
                                <input class="bg-light border stext-111 cl2 plh3 size-116 p-l-10" type="text" name="phone" 
                                    value = ""
                                    placeholder="Số điện thoại">
                            </div>

                            <span class="fs-18 cl5 txt-center size-211">
                                <span class="lnr lnr-map-marker"></span>
                            </span>
                            <label class="">Địa chỉ: </label>
                            
                        </div>
						<span class="fs-1 cl5 txt-center size-211"></span>

						<div class="size-212 p-t-2">
							<div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-20" type="address" name="address" placeholder="Số nhà, tên đường....">
                            </div>
                            <div class="m-b-20 how-pos4-parent">
                                <label class="">Tỉnh thành: </label>
                                <select name="province" class="stext-111 cl2 size-116 p-l-20 p-r-20 bg-light border-0" id = "province">
                                    <option value="0"> <?= __CHOOSE__ ?> </option>
                                    <?php 
                                        if(!is_null($province)) {
                                            if(sizeof($province) > 0) {
                                                foreach($province as $key => $value) {
                                                    echo '<option onclick="selectedProvince('.$value['id'].')" value="'. Core\Helper::makeSafe($value['_name']) .'">'.$value['_name'].'</option>';
                                    ?>                                    
                                    <?php 
                                                }
                                            }
                                        } 
                                    ?>
                                </select>
                            </div>
                            <div class="m-b-20 how-pos4-parent">
                                <label class=""><?=__DISTRICT__ ?>: </label>
                                <select name="district" class="stext-111 cl2 size-116 p-l-20 p-r-20 bg-light border-0" id="district"> 
                                    <option value="0"> <?= __CHOOSE__ ?> </option>
                                </select>
                            </div>
                            <div class="m-b-10 how-pos4-parent">
                                <label class=""><?=__WARD__ ?>: </label>
                                <select name="ward" class="stext-111 cl2 size-116 p-l-20 p-r-20 bg-light border-0" id="ward">
                                    <option value="0"> <?= __CHOOSE__ ?> </option>
                                 </select>
                            </div>                                  
							
						</div>
                        
					</div>
                        <input type="hidden" name="data" value="<?= \Core\Helper::makeSafe($list) ?>">
                    
						<button class="flex-c-m stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer m-lr-auto p-tb-10 m-b-20" type=submit>
                            <?=__COMPLETE_ORDER__?>
						</button>
				</div>
					

			</div>
		</div>
	</section>
    </form>

</body>
</html>