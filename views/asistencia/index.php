<div class="recepcion row fixFlow full pd20">
    <div class="container fullW col sc pd10">
        <div class="titulo">Asistencia</div>
            <span class="maxW500">
                <input class="balloon" type="text" id="filtro">
                <label for="filtro">Buscar</label>
            </span>
        <div class="contenido fullW row wp cc" id="asistencia">
            <div class="card"></div>
        </div>
    </div>
</div>
<script>
    let niños = $('#asistencia')
    fetch('api/kids/getAsistA')
    .then(resp=>resp.json())
    .then((json)=>{
        // console.log(json)
        json.forEach(niño =>{
            let card = document.createElement('div')
            card.classList = 'card'
            card.appendChild(new Text('e'))
            card.appendChild(new Text(niño['nomNiño'] + ' ' + niño['fecEntrada']))
            niños.appendChild(card)
        })
    })
</script>