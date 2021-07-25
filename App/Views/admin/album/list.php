<div class="card card-primary" style="z-index:99">

    <div class="card-body">
        <div class="row">

                <!-- <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle=""> </a> -->
                <div class="float-right">
                    <div class="btn-group">
                        <a class="btn btn-default" href="?order=asc" data-sortasc=""> Cũ nhất </a>
                        <a class="btn btn-default" href="?order=desc" data-sortdesc=""> Mới nhất </a>
                        
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="m-2 col-12">
                <label for="">Tải ảnh lên</label>
                <input type="file" id="file" class="form-control">
            </div>
            <?php 
                        if ($image != NULL) {
                            foreach ($image as $key=>$value) {                            
                    ?>
            <div class="m-2 border p-2" onclick="showPic('<?= \Core\Helper::makeSafe($value )?>')">
                <a style="cursor:pointer" data-toggle="lightbox" data-title="sample 1 - white">
                    <img src="<?= $value ?>" class="img-fluid" alt="white sample"
                        style="width: 200px; height: 200px">
                </a>
            </div>


            <?php  
                    }
                        }
                    ?>


        </div>

    </div>
</div>



<div id="ekkoLightbox-567" class="ekko-lightbox modal fade in hide down" tabindex="-1" role="dialog" aria-modal="true"
    style="padding-right: 16px; display: block; ">
    <div class="modal-dialog" role="document" style="display: block; flex: 1 1 1px; max-width: 40%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id='nameFile'>sample 12 - black</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><span aria-hidden="true">×</span></button>
                
            </div>
            <div class="modal-body">
                <div class="ekko-lightbox-container" style="max-height: max-content">
                    <div class="ekko-lightbox-item fade"></div>
                    <div class="ekko-lightbox-item fade in"><img id='modal-album'
                            src="https://via.placeholder.com/1200/000000.png?text=12" class="img-fluid"
                            style="width: 100%;"></div>
                </div>
            </div>
            <div class="modal-footer hide" style="display: none;">&nbsp;</div>
        </div>
    </div>
</div>