<form action="/admin/products/store" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên Sản Phẩm</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập Tên " >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Danh Mục</label>
                    <select name="menu_id" class="form-control">
                        <option value = '0'>Danh mục cha </option>;
                        <?php  
                            $modelMenu = new App\Models\Admin\Menu();
                            $data = $modelMenu->get();
                            $menuShow = new App\Helpers\Helper();
                            echo $menuShow->menuShow_option($data);
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Mô Tả Ngắn</label>
            <textarea name="content" class="form-control"></textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Giá Tiền</label>
                    <input type="number" name="price" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Giá Giảm</label>
                    <input type="number" name="price_sale" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Chi Tiết Sản Phẩm</label>
           <textarea name="description" id="content"></textarea>
           <div class="form-group">
                <label for="">Thông số kỹ thuật</label>
            <textarea name="factory_info" id="factory_info" class="w-50"></textarea>
            </div>
        </div>
      
        <div class="form-group">
            <label for="">Ảnh Đại Diện</label>
            <input type="file" id="file" class="form-control">
            <div id="thumb"></div>
            <input type="hidden" name="file" value="" id="url_file" placeholder="Đường dẫn hình ảnh" class="mt-1 col-12">
            <a class="btn btn-success mt-2" onclick="addImageToProduct()">Chọn trong bộ sưu tập</a>
        </div>
        <div class="">
            <label for="" class="mb-2"> Feature: </label>
            <input type="checkbox" value="1" name="feature" class="" style="width: 30px;height: 30px;">            
        </div>
        <div class="form-group">
            <label>Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="active" checked="">
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="active">
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>
        </div>

      
        

    </div>

    <div class="card-footer">
        
        <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
    </div>
</form>
<div id="album-modal"></div>
