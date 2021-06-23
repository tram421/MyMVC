<div class="sec-banner bg0 p-t-50 p-b-50">
    <div class="container">
        <div class="row d-flex justify-content-start flex-wrap overflow-hidden text-center">

            

            <?php
                if ($menusData->num_rows > 0) {
                    while($row = $menusData->fetch_assoc()){					
            ?>
                <div class="col-md-2 col-sm-4 col-4 overflow-hidden">
                    <a class="text-center" href = "/danh-muc/<?= Core\Helper::slug($row['name']) . '-id' . $row['id'] ?>.html">
                        <img class = "small-img " src="<?php 
                            if ($row['image'] == '') {
                                echo '/template/images/no-image.jpg';
                            }

                            if (file_exists(substr($row['image'],1)) == false) {
                                echo '/template/images/no-image.jpg';
                            } else {
                                echo $row['image'];
                            }
                            
                        ?>" alt="">							
                        <br>
                        <span><?= $row['name'] ?></span>
                    </a>
                </div>                
            <?php
                
                }
            }
            ?>
            
            
        </div>
    </div>
</div>