<?php 
// var_dump($data);
?>

<form action="/admin/post/update" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên Sản Phẩm</label>
                    <input type="text" name="title" class="form-control" placeholder="Nhập Tên" value = '<?= Core\Helper::decodeSafe($data['title']) ?>'>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Danh Mục</label>
                    <select name="category" class="form-control">
                    <option value = '<?=$data['category']?>'>
                        <?php 
                            echo $data['category'];                            
                        ?></option>
                        <?= $cat ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Mô Tả Ngắn</label>
            <textarea name="short_content" class="form-control"><?= Core\Helper::decodeSafe($data['short_content']) ?></textarea>
        </div>

       

        <div class="form-group">
            <label for="">Chi Tiết Sản Phẩm</label>
           <textarea name="description" id="description"><?= Core\Helper::decodeSafe($data['description'])?></textarea>
        </div>
      
        
        <div class="">
            <label for="" class="mb-2"> Xuất bản:</label>
            <input type="checkbox" value="1" name="public" class="" style="width: 30px;height: 30px;" <?= ($data['public'] == 1) ? "checked" : '' ?>>            
        </div>

    </div>

    <div class="card-footer">
        <input type="hidden" name="id" value= "<?= $data['id'] ?>">
        <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
    </div>
</form>

