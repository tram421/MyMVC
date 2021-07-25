
<!DOCTYPE html>
<html lang="en">
<head>
<?php include __VIEW__.'/admin/head.php'; ?>
</head>
<body class="login-page" style="min-height: 466px;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><?= $name ?></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Vui lòng đăng nhập để tiếp tục</p>

      <?php include __VIEW__.'/alert.php'; ?>
      <form action="/admin/user/login/store" method="POST">
        <div class="input-group mb-3">
          <input type="email" name = "email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name = "password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


  
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->




<?php include __VIEW__.'/admin/footer.php'; ?>
</body>
</html>
