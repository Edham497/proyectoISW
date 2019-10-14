<?php require 'views/head.php';?>
<?php require 'views/components/header.php';?>
    <div class="main col cc material-dark">
        <div class="title fs50 tac">Error <?php echo $this->error_code; echo " - ".$this->error_name?></div>
        <p class="mt20 tac"><?php echo $this->error_desc; ?></p>
        <a href="/proyectoISW/"><div class="ham-btn material-normal">Regresar</div></a>
    </div>
<?php require 'views/footer.php';?>