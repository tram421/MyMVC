<form action="/admin/post/create" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" placeholder="Nhập Tên" value = ''>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Danh Mục</label>
                    <select name="category" class="form-control">
                        <?php $cat = \App\Controllers\Admin\PostController::showCategory(); echo $cat; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Mô Tả Ngắn</label>
            <textarea name="short_content" class="form-control"></textarea>
        </div>


        <div class="form-group">
            <label for="">Chi Tiết Sản Phẩm</label>
           <textarea name="description" id="description"></textarea>
        </div>
        <div class="">
            <label for="" class="mb-2"> Xuất bản</label>
            <input type="checkbox" value="1" name="public" class="" style="width: 30px;height: 30px;" checked>            
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Đăng bài</button>
    </div>
</form>

