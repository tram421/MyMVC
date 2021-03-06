<form action = '/admin/menus/store' method = 'POST'>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" name = "name" class="form-control" placeholder="Nhập tên danh mục">
                </div>
            </div>
            <div class="col-md-6">
                    <!-- select -->
                    <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name = "parent_id">
                        <option value = '0'>Danh mục cha</option>
                        
                        <?php                             
                            if (sizeof($menus) > 0) {
                                $category = new App\Helpers\Helper;
                                echo $category->menuShow_option($menus);
                            }
                        ?>
                    </select>
                    </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for=""> Mô tả ngắn </label>
            <textarea name = "description" class = "form-control"></textarea>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Vị trí</label>
                    <input type = "number" name = "order_by" class = "form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <input type = "file" name = "file" class = "form-control" id = 'file'>
                    <div id="thumb">
                    </div>
                    <input type="hidden" name="image" value="" id="url_file">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio1" name="active" checked = "" value = "1">
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio2" name="active" value = "0">
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
    </div>
</form>