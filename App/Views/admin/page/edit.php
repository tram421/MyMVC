<?php 
// var_dump($data);
?>

<form action="/admin/page/update" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên Sản Phẩm</label>
                    <input type="hidden" name='slug' value = <?= $data['slug'] ?>>
                    <input type="text" name="name" class="form-control" placeholder="Nhập Tên" value = '<?= Core\Helper::decodeSafe($data['name']) ?>'>
                </div>
            </div>
            
        </div>


       

        <div class="form-group">
            <label for="">Chi Tiết Sản Phẩm</label>
           <textarea name="description" id="description"><?= Core\Helper::decodeSafe($data['description'])?></textarea>
        </div>
      
        

    </div>

    <div class="card-footer">
        <input type="hidden" name="id" value= "<?= $data['id'] ?>">
        <button type="submit" class="btn btn-primary">Cập nhật trang</button>
    </div>
</form>

