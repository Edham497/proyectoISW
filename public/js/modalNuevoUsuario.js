$('#newModal').addEventListener('click', ()=> {
    let m = new Modal()
    getArch(`views/bitacoras/newBitacora.html`).then((data)=>{
        m.insertarContenido(data)
    })
})