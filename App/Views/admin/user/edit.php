<?php 
// var_dump($data);
?>

<form action="/admin/user/updateUser" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên thành viên</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập Tên" value = '<?= Core\Helper::decodeSafe($data['name']) ?>'>
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value = '<?= Core\Helper::decodeSafe($data['phone']) ?>'>
                </div>

                
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Quyền hạn</label>
                    <select name="permision" class="form-control">
                    <option value = '<?=$data['permision']?>'>
                        <?php 
                            echo $data['permision'];                            
                        ?></option>
                        <?= $permision ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" value = '<?= Core\Helper::decodeSafe($data['email']) ?>'>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">                
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" value = '<?= Core\Helper::decodeSafe($data['address']) ?>'>
                </div>
            </div>
        </div>      

        <div class="">
            <label for="" class="mb-2"> Xóa</label>
            <input type="checkbox" value="1" name="is_delete" class="" style="width: 30px;height: 30px;" <?= ($data['is_delete'] == 1) ? "checked" : '' ?>>            
        </div>

    </div>

    <div class="card-footer">
        <input type="hidden" name="id" value= "<?= $data['id'] ?>">
        <button type="submit" class="btn btn-primary">Cập nhật user</button>
    </div>
</form>

