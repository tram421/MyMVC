<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Trang Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fas fa-user text-light img-circle elevation-2"></i>
        </div>
        <div class="info">
          <a href="/admin" class="d-block"><?= \App\Controllers\Admin\MainController::getNameAdmin() ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/menus/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/menus/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
              </li>
             
            </ul>
          </li>
          <!-- Sản phẩm -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/products/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/products/listDesc" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
             
            </ul>
          </li>
          <!-- Slide -->
          <li class="nav-item">
            <a href="/admin/slide" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Slide hình ảnh
              </p>
            </a>
          </li>

          <!-- Đơn hàng -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Đơn hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/orders/manage/all" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý đơn hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/orders/manage/completeOrder" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đơn hàng đã hoàn thành</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/orders/trash" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thùng rác</p>
                </a>
              </li>
           </ul>
          </li>
          <!-- Sản phẩm -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-pen-fancy"></i>
              <p>
                Bài viết
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/posts/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/posts/listDesc" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách bài viết</p>
                </a>
              </li>
             
            </ul>
          </li>
          <!-- Trang -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-pager"></i>
              <p>
                Page
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/page/gioi-thieu" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Giới thiệu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/page/lien-he" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liên hệ</p>
                </a>
              </li>
             
            </ul>
          </li>
          <!-- Trang -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/user/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
             
            </ul>
          </li>
          <!-- Mail -->
          <li class="nav-item pointer "style = "cursor:pointer">
            <a class="nav-link" href='/admin/mail/repair'>
              <i class="fas fa-envelope"></i>
              <p>
                Gửi mail
           
              </p>
            </a>          
          </li>
           <!-- Tài khoản -->
          <li class="nav-item pointer " onclick="logOut()" style = "cursor:pointer">
            <a class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                Đăng xuất
           
              </p>
            </a>          
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>