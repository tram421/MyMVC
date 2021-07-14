<div class="container">
    
    <div class="card card-info m-tb-100 w-50 m-lr-auto">
        <div class="card-header">
        <h3 class="card-title"><?= __LOGIN__ ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method='POST' action='/user/check'>
            <?php include __VIEW__.'/alert.php'; ?>
            <div class="card-body">
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="inputEmail3" name = 'email' placeholder="Email">
                </div>
                </div>
                <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword3" name = 'password' placeholder="Password">
                </div>
                </div>
                
            </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="/user/signUp" class="btn btn-warning float-right m-b-10">Sign up</a>
            <button type="submit" class="btn btn-info float-right m-b-10 m-r-20">Log in</button>
        </div>
        <!-- /.card-footer -->
        </form>
    </div>
</div>

