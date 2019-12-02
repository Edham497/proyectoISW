class Modal{
    constructor(type, contenido, action){
        this.modal = crearWea('div', {
            classList: 'modal'
        })
        this.contenedor = crearWea('div', {
            classList: 'containerM'
        })
        this.contenido = crearWea('div',{
            classList: 'contenido'
        })
        this.cerrar = crearWea('div', {
            classList: 'closeModal',
            onclick: this.cerrarModal
        })
        this.contenedor.appendChild(this.cerrar)
        this.contenedor.appendChild(this.contenido)
        this.modal.appendChild(this.contenedor)
        $('body').appendChild(this.modal)
        this.createConfirmation(type, contenido, ()=>{
            this.cerrarModal()
            if(action != undefined)action()
        })
    }

    insertarContenido(contenido){
        this.contenido.innerHTML = contenido
    }
    
    cerrarModal(){
        $('.closeModal').remove()

        setTimeout(() => {
            $('.modal').remove()
        }, 500);
        
        inyectCSS($('.modal'), {
            transition: ".25s ease-in-out",
            opacity: 0
        })
    
        inyectCSS($('.containerM'), {
            transition: ".25s ease-in-out",
            width: "0"
        })
    }

    createConfirmation(type, msg, action){
        let confirm = crearWea('div', {
            classList: 'confirmation'
        })
        let aside = crearWea('div', {
            classList: `aside ${type}`
        })
        
        let msgc = crearWea('div', {
            classList: 'msg col cc',
            innerHTML: `<div class="ham-title">${msg}</div>`
        })
        let btnc = crearWea('div', {
            classList: 'ham-btn ham-blue m0',
            innerHTML: 'Continuar',
            onclick: action
        })
        confirm.appendChild(aside)
        msgc.appendChild(btnc)
        confirm.appendChild(msgc)
        this.contenido.appendChild(confirm)
    }
}