
<form action = '/admin/menus/update/<?= $data['id'] ?>' method = 'POST'>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" name = "name" value = "<?= Core\Helper::decodeSafe($data['name']) ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                    <!-- select -->
                    <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name = "parent_id">
                        <?php 
                        #Lấy tên danh mục cha của danh mục
                            if($data['parent_id'] == 0) {
                                echo "<option value = '0'>Danh mục cha</option>";
                            } else {
                                foreach ($menus as $key => $value) {
                                    if ($value['id'] == $data['parent_id']) {
                                        echo "<option style='font-weight: bold !important ' value = '".$data['parent_id']."'> " . $value['name'] ."</option>";                                    
                                        break;
                                    }
                                }   
                            }  
                        ?>   
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
            <label for=""><?= __IMAGE__ ?></label>
            <input type = "file" name = "file_repair" value = "" class = "form-control" onchange = "upSimple()" id = "file_repair">
            <div id="thumb1">
                <img class = "m-2" style = "width : 200px" src="<?= Core\Helper::decodeSafe($data['image']) ?>">
            </div>
            <input type="hidden" name="file" value="" id="url_file_repair">
        </div>
        <div class="form-group">
            <label for=""> Mô tả ngắn </label>
            <textarea name = "description" class = "form-control"><?= Core\Helper::decodeSafe($data['description']) ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Vị trí</label>
            <input type = "number" name = "order_by" value = <?= $data['order_by'] ?> class = "form-control">
        </div>
        <div class="form-group">
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio1" name="active" 
                <?= ($data['active'] == 1) ? "checked" : ""; ?> value = "1">
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio2" name="active" 
                <?= ($data['active'] == 0) ? "checked" : ""; ?> value = "0">
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Chỉnh sửa danh mục</button>
    </div>
</form>