
<?php if (isset($_SESSION['error'])) { ?>
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i></h5>
        <?php 
            echo $_SESSION['error'];
            Core\Session::removeFlash('error');
        ?>

</div>

<?php } ?>

<?php if(isset($_SESSION['success']))  {?>
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i></h5>
    <?php 
            echo $_SESSION['success'];
            Core\Session::removeFlash('success');
    ?>
</div>
<?php }?>