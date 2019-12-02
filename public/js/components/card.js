class CardNiño{
    constructor(data){
        this.card = crearWea('div', {
            id: data['idNiño'],
            classList: 'card'
        })

        this.card.appendChild(crearWea('div',{
            classList: 'nombre',
            innerHTML: `${data['nom']} ${data['app']} ${data['apm']}`
        }))

        let fecha = data['fn'].split('-')
        switch(fecha[1]){
            case '01':fecha[1] = 'Enero';break;
            case '02':fecha[1] = 'Febrero';break;
            case '03':fecha[1] = 'Marzo';break;
            case '04':fecha[1] = 'Abril';break;
            case '05':fecha[1] = 'Mayo';break;
            case '06':fecha[1] = 'Junio';break;
            case '07':fecha[1] = 'Julio';break;
            case '08':fecha[1] = 'Agosto';break;
            case '09':fecha[1] = 'Septiembre';break;
            case '10':fecha[1] = 'Octubre';break;
            case '11':fecha[1] = 'Noviembre';break;
            case '12':fecha[1] = 'Diciembre';break;
        }

        this.card.appendChild(crearWea('div',{
            classList: 'fnacimiento',
            innerHTML: `${fecha[2]} de ${fecha[1]} de ${fecha[0]}`
        }))
        
        this.card.appendChild(crearWea('div',{
            classList: 'grupo',
            innerHTML: `${data['grupo']}`
        }))
        this.card.appendChild(crearWea('img',{
            classList: 'imgn',
            src: `public/img/guardarias.jpg`
        }))
        this.card.appendChild(crearWea('div',{
            classList: 'ac',
            innerHTML: `${data['activo']}`
        }))

        return this.card;
    }
}