<div class="maestro row fixFlow full pd20">
    <div class="container fullW col sc pd10">
        <div class="titulo">Mi Grupo</div>
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
            card.innerText = `${niño['nomNiño']} ${niño['apPNiño']} ${niño['apMNiño']}`
            let btn = document.createElement('div')
            btn.classList = 'NBitacora'
            let text = getDocument('views/bitacoras/newBitacora.html')
            btn.onclick = ()=> {
                newModal('Nueva Bitacora', text[0])
                // fetch(`api/kids/getKid/${niño['idNiño']}`).then(resp=>resp.json()).then((json)=>{
                //     console.log(json)
                // })
                $('#id_niño').innerHTML = niño['idNiño']
                $('#nom_niño').innerHTML = `${niño['nomNiño']} ${niño['apPNiño']} ${niño['apMNiño']}`
            }
            card.appendChild(btn)
            niños.appendChild(card)
        })
    })
</script>