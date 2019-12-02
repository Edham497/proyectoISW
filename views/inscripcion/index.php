<div class="ham-title fw300">Inscripcion</div>
<div class="container col sc fullW">
    <form action="" class="formulario fullW maxW800">
        <div class="ham-title fw300">Informacion del Niño</div>
        <span>
            <input class="balloon" type="text" id="nom_Niño">
            <label for="nom_Niño">Nombre</label>
        </span>
        <div class="grid-2">
            <span class="">
                <input class="balloon" type="text" id="app_Niño">
                <label for="app_Niño">Ap. Paterno</label>
            </span>
            <span class="">
                <input class="balloon" type="text" id="apm_Niño">
                <label for="apm_Niño">Ap. Materno</label>
            </span>
        </div>
        <span class="grid-3">
            <span>
                <input class="balloon pdg10 pdgL0" id="d" autocomplete="off" type="number" placeholder="Dia"/>
                <label for="d">Dia</label>
            </span>
            <span>
                <input class="balloon pdg10 pdgL0" id="m" autocomplete="off" type="number" placeholder="Mes"/>
                <label for="m">Mes</label>
            </span>
            <span>
                <input class="balloon pdg10 pdgL0" id="a" autocomplete="off" type="number" placeholder="Año"/>
                <label for="a">Año</label>
            </span>
        </span>
        <span>
            <input class="balloon" type="text" id="grupo">
            <label for="Grupo">Grupo</label>
        </span>
        <button type="submit" class="ham-btn ham-blue" id="sub-btn">Inscribir</button>
    </form>
</div>
<script src="public/js/components/listarWeas.js"></script>
<script src="public/js/components/modal.js"></script>

<script>
    function inscribir(data){
         fetch_POST('api/admin/inscribir', data).then(resp=>{
            new Modal('success', resp.success, ()=>setTimeout(() => location.href = '/proyectoISW/', 1000) )
        }).catch(err=> new Modal('error', 'La Inscripcion no pudo ser completada'))
    } 
    $('#sub-btn').addEventListener('click', (e)=>{
        e.preventDefault()
        let data = {
            info_niño: {
                nom: $('#nom_Niño').value,
                app: $('#app_Niño').value,
                apm: $('#apm_Niño').value,
                fnac: `${$('#a').value}-${$('#m').value}-${$('#d').value}`,
                grupo: $('#grupo').value
            }
        }
        // console.log(data)
        let ok = true
        Object.keys(data.info_niño).forEach(dato=>{
            ok = data.info_niño[dato] != ''
            // if(!ok)break
        })
        if(ok)inscribir(data)
        else new Modal('error', 'No Hay datos')
    })
</script>