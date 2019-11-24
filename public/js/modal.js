function newModal(title, text){

    let modal = crearWea('div', {
        classList: 'modal'
    })

    let container = crearWea('div', {
        classList: 'container'
    })

    container.innerHTML = `
        <div class="closeModal"></div>
        <h1>${title}</h1>
        ${text?text:''}`

    modal.appendChild(container)
    $('body').appendChild(modal)

    $('.closeModal').onclick = () => {
        setTimeout(() => {
            $('.closeModal').remove()
            $('.modal').remove()
        }, 500);
    
        inyectCSS($('.modal'), {
            transition: ".25s ease-in-out",
            opacity: 0
        })
    
        inyectCSS($('.container'), {
            transition: ".25s ease-in-out",
            width: "0",
            width: "0",
            height: "0",
            padding: "0"
        })
    }
}