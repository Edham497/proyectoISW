<div class="containerPerfil full col">
    <div class="perfil">
        <div id="editar"></div>
        <div class="img">
            <img src="<?php echo constant('userImages') . $_SESSION['usr_img'];?>" alt="">
        </div>
        <div class="titulo">Perfil de <?php echo $_SESSION['usr_name'];?></div>
        <div class="subtitulo"><?php echo $_SESSION['rolName'];?></div>
    </div>
</div>

<script>
    fetch('api/users/get/7')
    .then(res=>res.json())
    .then((json)=>{
        console.log(json)
        let perfil = $('.perfil')
        Object.keys(json).forEach((dato)=>{
            let campo = document.createElement('p')
            campo.innerText = json[dato]
            perfil.appendChild(campo)
        })
    })
</script>