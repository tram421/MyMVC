<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop fix-menu-desktop">
			<!-- Topbar -->
			<!-- <div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a>
					</div>
				</div>
			</div> -->

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="/template/images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="/" title = '<?= __HOME_PAGE__ ?>'><?= __HOME_PAGE__ ?></a>
							</li>
							
							
							<li>
								<a href="/san-pham" title = '<?= __PRODUCT_PAGE__ ?>'><?= __PRODUCT_PAGE__ ?></a>
								<ul class = 'sub-menu'>
								<?php 
									$menus = \App\Helpers\Helper::menuAll();
									echo App\Helpers\Helper::menuPublic($menus);                                
								?>
								</ul>
							</li>

							<li>
								<a href="/page/gioi-thieu.html" title = '<?= __ABOUT_PAGE__ ?>'><?= __ABOUT_PAGE__ ?></a>
							</li>

							<li>
								<a href="/page/lien-he.html" title = '<?= __CONTACT_PAGE__ ?>'><?= __CONTACT_PAGE__ ?></a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div id="countItem" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php
								echo App\Controllers\CartController::countItem();

						?>
						">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
						<div class="cl2 hov-cl1 trans-04 p-l-22 p-r-11 color-black col-1 js-show-login pointer" >
							<a href="/user/login" class="color-black"><i class="fas fa-user "></i></a>
							<!-- <i class="fas fa-user "></i> -->
							<div class="w-maxcontent hover-red 
								<?php 
									if (isset($_COOKIE['username'])) {
									echo 'show';
									} else {echo 'hidden';
									}
								?>" id='signout-button' onclick="login('<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username'] ?>')">????ng xu???t</div>
							
						</div>

						<!-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a> -->
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="/template/images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<!-- <ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul> -->

			<ul class="main-menu-m">
				<li class="active-menu">
                    <a href="/" title = '<?= __HOME_PAGE__ ?>'><?= __HOME_PAGE__ ?></a>
                </li>

                <?php 
                    $menus = \App\Helpers\Helper::menuAll();
                    echo App\Helpers\Helper::menuPublic($menus);                    
                ?>

                <li>
                    <a href="/page/gioi-thieu.html" title = '<?= __ABOUT_PAGE__ ?>'><?= __ABOUT_PAGE__ ?></a>
                </li>

                <li>
                    <a href="/page/lien-he.html" title = '<?= __CONTACT_PAGE__ ?>'><?= __CONTACT_PAGE__ ?></a>
                </li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="/template/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" action="/search " method="GET">
					<button class="flex-c-m trans-04 button" type="submit"> 
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search..." value="">
				</form>
			</div>
		</div>
	</header>