<div class="bitacora col fixFlow full pd20">
    <div class="titulo">Bitacoras</div>
    <div class="container fullW col sc pd10">
        <div class="titulo">Niños</div>
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
                $('#subBit').addEventListener('click', (e)=>{
                    e.preventDefault()
                    let data={
                        idN: niño['idNiño'],
                        idM: <?php echo $_SESSION['uid'];?>,
                        rep: $('#reporte').value
                    }
                    // console.log(data)
                    fetch(`api/bitacora/doBit`,{
                        method: 'POST',
                        body: JSON.stringify(data),
                        headers: {
                        'Content-Type': 'application/json'
                        }
                    })
                    setTimeout(() => {
            $('.closeModal').remove()
            $('.modal').remove()
        }, 500);
    
        inyectCSS($('.modal'), {
            transition: ".25s ease-in-out",
            opacity: 0
        })
    
        inyectCSS($('.containerM'), {
            transition: ".25s ease-in-out",
            width: "0",
            width: "0",
            height: "0",
            padding: "0"
        })
                    // .then(res=>res.json()).then(json=>console.log(json))
                })
            }
            card.appendChild(btn)
            niños.appendChild(card)
        })
    })
</script>