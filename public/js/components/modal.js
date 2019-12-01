class Modal{
    constructor(){
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
}