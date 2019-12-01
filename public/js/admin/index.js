setInterval(() => {
    totales().then(res=>{
        $('#ni').innerHTML = res.niños
        $('#nu').innerHTML = res.usuarios-2
        $('#nt').innerHTML = res.tutores
        $('#nm').innerHTML = res.maestros
        $('#np').innerHTML = res.pediatras
        $('#na').innerHTML = res.autorizados
    })
}, 5000);

function init(){
    let cards = $('.cards').children
    for(let i = 0; i < cards.length; i++){
        cards[i].addEventListener('click', () =>{
            for(let j = 0; j < cards.length; j++){
                if(j!=i)
                    cards[j].classList.remove('active')
                
                else{
                    //Poner el titulo de la seccion al dar click
                    $('#titulo').innerHTML = cards[j].getAttribute('content')
                    //A la tarjeta que se le dio click se le da la clase 'active'
                    cards[j].classList.add('active')
                    if(window.screen.width < 720){
                        let cc = $('.cards') 
                        //Si la pantalla es movil se le agregara o quitara la clase 'close' al contenedor de las tarjetas
                        cc.classList.contains('close')?
                            cc.classList.remove('close'):cc.classList.add('close')
                    }
                }
            }
        })
    }
}
init()