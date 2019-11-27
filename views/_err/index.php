<div class="full col cc material-dark pdgT60">
    <div class="ham-title fs50 c_FFF tac">Error 
        <?php echo $this->error_code; echo " - " . $this->error_name ?></div>
    <p class="mb20 tac c_FFF"><?php echo $this->error_desc; ?></p>
    <a href="/proyectoISW/">
        <div class="ham-btn">Regresar</div>
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