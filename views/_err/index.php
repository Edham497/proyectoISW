<div class="main col cc material-dark pdgT60">
    <div class="title fs50 tac">Error 
        <?php echo $this->error_code; echo " - " . $this->error_name ?></div>
    <p class="mt20 tac"><?php echo $this->error_desc; ?></p>
    <a href="/proyectoISW/">
        <div class="ham-btn material-normal">Regresar al Inicio</div>
    </a>
</div>
<script>
    document.querySelector('.navbar').style.color='#DADADA'
    document.querySelector('.navbar').style.background ='#1D2528'
</script>
<style>
    html, body{
        overflow: hidden;
        background: #273136 !important;
    }
</style>