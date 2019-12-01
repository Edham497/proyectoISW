class CardNiño{
    constructor(data){
        this.card = crearWea('div', {
            id: data['idNiño'],
            classList: 'card'
        })

        Object.keys(data).forEach(campo=>{
            if(campo != 'idNiño'){
                this.card.appendChild(crearWea('div',{
                    classList: campo,
                    innerHTML: data[campo]
                }))
            }
            console.log(campo)
            // console.log(data[campo])
        })

        return this.card;
    }
}