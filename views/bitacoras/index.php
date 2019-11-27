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
    fetch('api/bitacora/seeBit/6')
    .then(resp=>resp.json())
    .then((json)=>{
        // console.log(json)
        json.forEach(niño =>{
            let card = document.createElement('div')
            card.classList = 'card'
            card.innerText = niño['nomNiño']
            niños.appendChild(card)
        })
    })
</script>