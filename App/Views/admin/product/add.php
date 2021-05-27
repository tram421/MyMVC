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
                        <?php  if ($menus->num_rows > 0) {
                                while ($row = $menus->fetch_assoc()) { ?>
                                    <option value="<?=$row['id']?>"><?=$row['name']?></option>
                        <?php  }  } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Mô Tả Ngắn</label>
            <textarea name="description" class="form-control"></textarea>
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
           <textarea name="content" id="content"></textarea>
        </div>
      
        <div class="form-group">
            <label for="">Ảnh Đại Diện</label>
            <input type="file" id="file" class="form-control">
            <div id="thumb"></div>
            <input type="hidden" name="file" value="" id="url_file">
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

