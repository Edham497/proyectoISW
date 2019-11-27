<div class="tutor row fixFlow full pd20">
    <div class="container fullW col sc pd10 maxW500">
        <div class="titulo">Mis niños</div>
        <div class="contenido fullW row wp cc" id="niños">
            
        </div>
    </div>
    <div class="container fullW col sc pd10">
        <div class="section fullW">
            <div class="titulo">Proximo Pago</div>
            <div class="contenido">F</div>
        </div>
        <div class="section bb fullW">
            <div class="titulo">Pagos</div>
            <div class="contenido">F</div>
            <div class="contenido">F</div>
            <div class="contenido">F</div>
            <div class="contenido">F</div>
            <div class="contenido">F</div>
            <div class="contenido">F</div>
        </div>
        <div class="section bc fullW">
            <div class="titulo">Adeudos</div>
            <div class="contenido">F</div>
        </div>
    </div>
</div>
<script>
    let niños = $('#niños')
    fetch('api/kids/listKids')
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