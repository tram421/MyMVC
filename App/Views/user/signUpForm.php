
<body class="animsition">


	<!-- Content page -->
    <form method = "POST" action="/user/send-mail">
	<section class="bg0 p-tb-80">
		<div class="container">
			<div class="flex-w flex-tr">
                
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<?php include __VIEW__.'/alert.php'; ?>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							<?= $title ?>
						</h4>

                   
						<div class="bor8 m-b-20 how-pos4-parent flex-w w-full">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" 
                                value = "<?= isset($_SESSION['emailUserEmail']) ? $_SESSION['emailUserEmail'] : '' ?>"
                                placeholder="Your Email Address *" required>
						</div>
                        <div class="bor8 m-b-5 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="password *" required>
                            
                        </div>
                        <label class="text-light stext-111 m-0">**Mật khẩu ít nhất 6 kí tự</label>
                        <label class="text-light stext-111 m-0">**Mật khẩu phải có ít nhất một số từ 0-9</label>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="re_password" placeholder="rewrite password *" required>
						</div>
                        
                        <div class="flex-w w-full p-b-42 ">
                            <span class="fs-18 cl5 txt-center size-211">
                                <span class="lnr lnr-phone-handset "></span>
                            </span>
                            <label class=""><?=__PHONE__ ?>: * </label>
                            <input class="bg-light border stext-111 cl2 plh3 size-116 p-l-10" type="text" name="phone" 
                                value = "<?= (isset($_SESSION['phoneUserMail'])) ? $_SESSION['phoneUserMail'] : '' ?>"
                                placeholder="Số điện thoại" required>
                        </div>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-r-20 p-t-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-20">

                        <div class="flex-w w-full p-b-5 p-lr-40">
                            <span class="fs-18 cl5 txt-center size-211">
                                <span class="lnr lnr-map-marker"></span>
                            </span>
                            <label class=""><?=__ADDRESS__ ?>: </label>
                            
                        </div>
						<span class="fs-1 cl5 txt-center size-211"></span>

						<div class="size-212 p-t-2">
							<div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-20" type="address" name="address" placeholder="Số nhà, tên đường....">
                            </div>
                            <div class="m-b-20 how-pos4-parent">
                                <label class=""><?=__PROVINCE__ ?>: </label>
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
                    
						<button class="flex-c-m stext-101 cl0 w-50 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer m-lr-auto p-tb-10">
							<?= __SIGN_IN__ ?>
						</button>
				</div>
					

			</div>
		</div>
	</section>
    </form>
	
