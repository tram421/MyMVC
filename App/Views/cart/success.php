
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Xác nhận</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>


</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto table-responsive">
        <h1 class="fw-light">Bạn đã đặt hàng thành công</h1>
        <p>Mã số đơn hàng:  MKL-<?= $id ?></p>
        <table class ="table m-tb-20">
            <?php 
                $html = '';
                $html .= '<thead class = "">
                            <tr class = "">
                                <th  class = "">STT</th>
                                <th  class = "">Tên sản phẩm</th>  
                                <th  class = "">Số lượng</th>                                
                                <th  class = "">Đơn giá</th>
                                <th  class = "">Giá</th>
                            </tr>
                        </thead>';
                $html .= '<tbody class = "col-12">';
                $html .= '<tr>';
                
                $total = 0;
                foreach($listProduct as $key => $value) {     
                    $cost = (int)$value['quantity'] * (int)$value['price_sale'];     
                    $total += $cost;  
                          
                    $html .= '<td>' . ++$key.'</td>';                      
                    $html .= '<td>' . $value['name'].'</td>';
                    $html .= '<td>' . $value['quantity'].'</td>';    
                    $html .= '<td>' . number_format($value['price_sale'], 0, '.', ',').' đ</td>';  
                    $html .= '<td>' . number_format($cost, 0, '.', ',') . ' đ</td>';
                    $html .= '<tr>';
                }
                $html .= '</tbody>';
                echo $html;
            ?>
        </table>
        <p class="text-left m-tb-20">Tổng cộng: <?= number_format($total, 0, '.', ',') ?> đ</p>
        <p class="lead text-muted">Nhân viên sẽ gọi điện xác nhận cho quí khách để thông báo phí vận chuyển và xác nhận đơn hàng, xin quí khách giữ điện thoại bên mình</p>
        <p>
          <a href="/" class="btn btn-primary my-2"><?=__RETURN_HOME_PAGE__?></a>
        </p>
      </div>
    </div>
  </section>


</main>



    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
</html>




