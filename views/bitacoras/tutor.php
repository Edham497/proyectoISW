<div class="recepcion row fixFlow full pd20">
    <div class="container fullW col sc pd10">
        <div class="titulo">Bitacoras</div>
            <span class="maxW500">
                <input class="balloon" type="text" id="filtro">
                <label for="filtro">Buscar</label>
            </span>
        <div class="contenido fullW row wp cc" id="niños">
            <div class="card">
                <span></span>
                <div>No hay bitacoras</div>
            </div>
        </div>
    </div>
</div>
<script>
    let niños = $('#niños')
    fetch('api/kids/listBits/1')
    .then(resp=>resp.json())
    .then((json)=>{
        // console.log(json)
        json.forEach(niño =>{
            let card = document.createElement('div')
            card.classList = 'card'
            card.innerHTML = json['nomNiño'] + '<br>' + json['comida'] + '<br>' + json['durmio'] + '<br>' + json['comportaminto'] + '<br>' + json['reporte'] + '<br>' + json['fecBita']
            niños.appendChild(card)
        })
    })
</script>