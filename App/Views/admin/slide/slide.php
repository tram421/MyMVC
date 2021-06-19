<?php 
    $i = 0;
    foreach ($data as $slide) {
?>
<form action = '/admin/slide/update' method = 'POST'>    

    <div class="card card-info mt-1 ml-4 mr-4">
        <div class="card-header bg-yellow">
            <h3 class="card-title">Slide <?= ++$i ?></h3>
            <a class="btn float-right text-white pt-0 pb-0 bg-red" onclick = "deleteRow(<?= $slide['id'] ?>, '/admin/slide/destroy')">X</a>    
        </div>         
        <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Image:</label>
                    <input type="file" id="file" class="form-control">
                    <div id="thumb">
                        <img class = "m-2" style = "width : 200px" src="<?= Core\Helper::decodeSafe($slide['file'])?>" alt="mekolink-slide-1">
                    </div>
                    <input type="hidden" name="id" value="<?= $slide['id'] ?>">
                    <input type="hidden" name="file" value="<?= Core\Helper::decodeSafe($slide['file'])?>" id="url_file">
                </div>
            </div>
        </div>
        <label for="">Content:</label>
        <div class="row">
            
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Main content</span>
                    </div>
                    <input type="text" class="form-control" name = "main_content" placeholder="Main content" value = "<?= Core\Helper::decodeSafe($slide['main_content'])?>">
                </div> 
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Mini content</span>
                    </div>
                    <input type="text" class="form-control" name = "mini_content" placeholder="Mini content" value = "<?= Core\Helper::decodeSafe($slide['mini_content'])?>">
                </div> 
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Button content</span>
                    </div>
                    <input type="text" class="form-control" name = "button_content" placeholder="Button content" value = "<?= Core\Helper::decodeSafe($slide['button_content'])?>">
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">Order: </label>
                <input type="number" name = "sort_by" value = "<?= $slide['sort_by'] ?>" class="form-control">
            </div>        
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name = "is_public" id="check1" <?= ($slide['is_public'] == 1) ?  "checked" : ''; ?>>
            <label class="form-check-label" for="exampleCheck1">Public</label>
        </div>
        
        <!-- /input-group -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
<?php 
    }
?>
<div id="addSlideForm">
    
</div>
<div class = 'm-3' >
    <button  onclick="addSlideForm()" type="submit" class="btn btn-info float-right text-white">Thêm slide</button>
</div>
