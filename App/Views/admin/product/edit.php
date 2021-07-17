<?php 
// var_dump($data);
?>

<form action="/admin/products/update" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên Sản Phẩm</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập Tên" value = '<?= Core\Helper::decodeSafe($data['name']) ?>'>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Danh Mục</label>
                    <select name="menu_id" class="form-control">
                    <option value = '<?=$data['menu_id']?>'>
                        <?php 

                            echo $data['menu_name'];
                            
                        ?></option>
                        <option value = '0'>Danh mục cha</option>
                        <?php  
                        
                            $modelMenu = new App\Models\Admin\Menu();
                            $dataMenu = $modelMenu->get();
                            $menuShow = new App\Helpers\Helper();
                            echo $menuShow->menuShow_option($dataMenu);
                            
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Mô Tả Ngắn</label>
            <textarea name="content" class="form-control"><?= Core\Helper::decodeSafe($data['content']) ?></textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Giá Tiền</label>
                    <input type="number" name="price" class="form-control" value = "<?= $data['price']?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Giá Giảm</label>
                    <input type="number" name="price_sale" class="form-control" value = "<?= $data['price_sale']?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Chi Tiết Sản Phẩm</label>
           <textarea name="description" id="description"><?= Core\Helper::decodeSafe($data['description'])?></textarea>
        </div>
      
        <div class="form-group">
            <label for="">Ảnh Đại Diện</label>
            <input type="file" id="file" class="form-control">
            <div id="thumb">
            <a href = ''><img src="<?= $data['file'] ?>" alt=""></a>
            </div>
            <input type="hidden" name="file" value="<?= $data['file'] ?>" id="url_file">
        </div>
        <div class="">
            <label for="" class="mb-2"> Feature:</label>
            <input type="checkbox" value="1" name="feature" class="" style="width: 30px;height: 30px;" <?= ($data['feature'] == 1) ? "checked" : '' ?>>            
        </div>
        <div class="form-group">
            <label>Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="active" <?php if($data['active'] == 1) echo "checked"; ?>>
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="active" <?php if($data['active'] == 0) echo "checked"; ?>>
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <input type="hidden" name="id" value= "<?= $data['id'] ?>">
        <button type="submit" class="btn btn-primary">Cập nhật Sản Phẩm</button>
    </div>
</form>

