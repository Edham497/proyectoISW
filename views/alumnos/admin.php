<div class="alumnos">
    <div class="container col sc">
        <div class="ham-title">Listado de Alumnos</div>
        <span class="maxW500">
            <input class="balloon" type="text" id="search" autocomplete="off">
            <label for="filtro">Buscar</label>
        </span>
        <div class="morros">

        </div>
    </div>
</div>
<script src="<?php echo constant('URL');?>public/js/components/listarWeas.js"></script>
<script src="<?php echo constant('URL');?>public/js/components/card.js"></script>
<script>
    function listar(){
        getAlumnos().then(alumnos=>{
            alumnos.forEach(alumno=>{
                console.log(alumno)
                $('.morros').appendChild(new CardNiño(alumno))
            })
        })
    }
    listar()

    $('#search').addEventListener('keyup', ()=>{
        $('.morros').innerHTML = ''
        buscarAlumnos($('#search').value).then(alumnos=>{
            alumnos.forEach(alumno=>{
                console.log(alumno)
                $('.morros').appendChild(new CardNiño(alumno))
            })
        })
    })
    // getAlumnos().then(alumnos=>{
    //     alumnos.forEach(alumno=>{
    //         console.log(alumno)
    //         $('.morros').appendChild(new CardNiño(alumno))
    //     })
    // })
</script>