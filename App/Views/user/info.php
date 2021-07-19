<?php if(isset($takeIn)) {    
 ?>
 <!DOCTYPE html>
<!-- <html lang="en"> -->
<head>
    <?php include __VIEW__ .'/head.php'; ?>
</head>

<body class="animsition">
	
	<!-- header -->
	<?php include __VIEW__ .'/header.php'; ?>
 <?php   
}
    
?>
<div class="container m-tb-20 ">
    <div class="row">
        <div class="col-md-3 col-sm-12 bg-info h-full p-1 rounded">
            <ul>
                <li class="mb-1 hov-btn3 p-3">                    
                    <a href="/member/info/order" class="text-white">Đơn hàng</a>
                </li>
                <li class="mb-1 hov-btn3 p-3">
                    <a href="/member/info/orderComplete" class="text-white">Đơn hàng đã hoàn tất</a>
                </li>
                <li class="mb-1 hov-btn3 p-3">
                    <a href="/user/login" class="text-white">Thông tin tài khoản</a>
                </li>
                <li class="mb-1 hov-btn3 p-3" onclick="login('maitram0291@gmail.com')">
                    <span  href="" class="text-white pointer">Đăng xuất</span>
                </li>                
                <li class="mb-1 hov-btn3 p-3">
                    <a href="/page/lien-he.html" class="text-white">Liên hệ nhanh</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-12 text-thin">
            <h3 class="m-tb-10"><?=$title?></h3>
            <p>
                Họ tên: <?= $data['name'] ?>
            </p>
            <p class="">
                Email: <?= $data['email'] ?>
            </p>
            <p class="">
                Điện thoại: <?= $data['phone'] ?>
            </p>
            <p class="">
                Địa chỉ: <?= $data['address'] ?>
            </p>
            
            <p class="">
                Ngày đăng kí: <?= $data['created_at'] ?>
            </p>   
             
            <?php 
                if(isset($takeIn)) {                    
                    include __VIEW__.'/user/'.$takeIn.'.php' ;
                }
            ?>        
        </div>
        
  
    </div>
</div>

<?php if(isset($takeIn)) {    
 ?>
 
	<!-- Footer -->
	<?php include __VIEW__ .'/footer.php'; ?>


	


<!--===============================================================================================-->	
	<script src="/template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/template/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/template/vendor/bootstrap/js/popper.js"></script>
	<script src="/template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/template/vendor/select2/select2.min.js"></script>

	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});
	</script>

	<script src="/template/vendor/daterangepicker/moment.min.js"></script>
	<script src="/template/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/template/vendor/slick/slick.min.js"></script>
	<script src="/template/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="/template/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="/template/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="/template/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="/template/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="/template/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="/template/js/main.js"></script>

</body>
</html>
 <?php   
}
    
?>