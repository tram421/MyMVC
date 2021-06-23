
<div class="card">
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">STT</th>
                    <th style="width: 10px">id</th>
                    <th>Tên danh mục</th>
                    <th>Hình ảnh</th>
                    <th style="width: 100px">Sắp Xếp</th>
                    <th style="width: 170px">Trạng Thái</th>
                    <th style="width: 200px">Ngày Cập Nhật</th>
                    <th style="width: 50px">Sửa</th>
                    <th style="width: 50px">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                        $getCategory = new App\Helpers\Helper;
                        echo $getCategory->menuShow($menus);
                    ?>
                </tr>
                
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
