<?php if(session()->getFlashdata('_error1')) { ?>
<div class="alert alert-danger" role="alert">
    <?php echo session()->getFlashdata('_error1'); ?>
</div>
<?php } ?>

<?php if(session()->getFlashdata('_error2')) { ?>
<div class="alert alert-danger" role="alert">
    <?php echo session()->getFlashdata('_error2'); ?>
</div>
<?php } ?>