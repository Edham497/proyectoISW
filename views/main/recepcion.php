<div class="recepcion row fixFlow full pd20">
    <div class="container fullW col sc pd10">
        <div class="titulo">Alumnos</div>
            <span class="maxW500">
                <input class="balloon" type="text" id="filtro">
                <label for="filtro">Buscar</label>
            </span>
        <div class="contenido fullW row wp cc" id="niños">
        </div>
    </div>
</div>
<script src="<?php echo constant('URL');?>public/js/modal.js"></script>
<script>
    let niños = $('#niños')
    fetch('api/kids/listKids')
    .then(resp=>resp.json())
    .then((json)=>{
        // console.log(json)
        json.forEach(niño =>{
            let card = document.createElement('div')
            card.classList = 'card'
            let grupo = crearWea('div', {
                classList: 'grupo',
                innerText: niño['grupofk']
            })
            card.appendChild(grupo)
            let nombre = crearWea('div', {
                classList: 'nombre',
                innerText: `${niño['nomNiño']} ${niño['apPNiño']} ${niño['apMNiño']}`
            })
            card.appendChild(nombre)
            let btn = document.createElement('div')
            btn.classList = 'NBitacora'
            let text = getDocument('views/bitacoras/newBitacora.html')
            btn.onclick = ()=>  {
                newModal('Nueva Bitacora', text[0])
                // fetch(`api/kids/getKid/${niño['idNiño']}`).then(resp=>resp.json()).then((json)=>{
                //     console.log(json)
                // })
                $('#id_niño').innerHTML = niño['idNiño']
                $('#nom_niño').innerHTML = `${niño['nomNiño']} ${niño['apPNiño']} ${niño['apMNiño']}`
                $('#subBit').addEventListener('click', (e)=>{
                    e.preventDefault()
                    console.log('Du click')
                })
            }
            card.appendChild(btn)
            let otro_btn = crearWea('div', {
                classList: 'RBitacora',
                onclick: ()=>{
                    //Aqui se registra la asistencia del morro
                    console.log('f')
                }
            })
            card.appendChild(otro_btn)
            niños.appendChild(card)
        })
    })
</script>