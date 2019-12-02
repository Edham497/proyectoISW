function getStats(){
    totales().then(res => {
        $('#ni').innerHTML = res.niños
        $('#nu').innerHTML = res.usuarios - 2
        $('#nt').innerHTML = res.tutores
        $('#nm').innerHTML = res.maestros
        $('#np').innerHTML = res.pediatras
        $('#na').innerHTML = res.autorizados
    })
}
getStats()
setInterval(getStats, 5000);

function init() {
    let cards = $('.cards').children
    for (let i = 0; i < cards.length; i++) {
        cards[i].addEventListener('click', () => {
            for (let j = 0; j < cards.length; j++) {
                if (j != i)
                    cards[j].classList.remove('active')

                else {
                    //Poner el titulo de la seccion al dar click
                    // $('#titulo').innerHTML = cards[j].getAttribute('content')
                    getArch(`/proyectoISW/views/${cards[j].getAttribute('content')}/admin.php`).then((data) => {
                        $('#contenido').innerHTML = data
                        window[cards[i].getAttribute('content')]()
                    })
                    //A la tarjeta que se le dio click se le da la clase 'active'
                    cards[j].classList.add('active')
                    if (window.screen.width < 720) {
                        let cc = $('.cards')
                        //Si la pantalla es movil se le agregara o quitara la clase 'close' al contenedor de las tarjetas
                        cc.classList.contains('close') ?
                            cc.classList.remove('close') : cc.classList.add('close')
                    }
                }
            }
        })
    }
    Alumnos()
}
init()

function Alumnos() {
    let asistencia = $('.asistencia')
    let inscritos = $('.inscritos')

    getAlumnos().then(alumnos => {
        alumnos.forEach(alumno => {
            // console.log(alumno)
            inscritos.appendChild(new CardNiño(alumno))
        })
    })

    $('#search').addEventListener('keyup', () => {
        inscritos.innerHTML = ''
        buscarAlumnos($('#search').value).then(alumnos => {
            alumnos.forEach(alumno => {
                // console.log(alumno)
                inscritos.appendChild(new CardNiño(alumno))
            })
        })
    })
}

function Usuarios(){
    let dataTable = new table()
    dataTable.setHeaders(['ID', 'Nombre(s)', 'Ap. Patero', 'Ap. Materno', 'Fecha de Nacimiento', 'Correo', 'Direccion', 'Telefono'])
    getUsers()
    function getUsers(){
        fetch(`api/users/list`)
            .then(function (response) {
                return response.json();
            })
            .then(function (myJson) {
                dataTable.cleanTable()
                myJson.forEach(user => dataTable.addRow(Object.values(user)))
            });
    }

    document.querySelector('#search').addEventListener('keyup', () => {
        search = document.querySelector('#search').value.trim()
        // console.log(search.length)
        if (search.length == 0) 
            getUsers()
        
        else {
            fetch(`api/users/get/${search}`)
                .then(function (response) {
                    return response.json();
                })
                .then(function (myJson) {
                    if(myJson['Error'] || myJson['error']){
                        dataTable.table.innerHTML = `<tr><td><h2 style='font-weight: 100'>${myJson['Error']}</h2></td></tr>`
                    }else{
                        dataTable.cleanTable()
                        dataTable.addRow(Object.values(myJson))
                    }
                })
            }
    })
}

function Tutores(){
    let inscritos = $('.tutoresI')

    getTutores().then(alumnos => {
        alumnos.forEach(alumno => {
            // console.log(alumno)
            inscritos.appendChild(new CardTutor(alumno))
        })
    })

    $('#search').addEventListener('keyup', () => {
        inscritos.innerHTML = ''
        buscarTutores($('#search').value).then(alumnos => {
            alumnos.forEach(alumno => {
                // console.log(alumno)
                inscritos.appendChild(new CardTutor(alumno))
            })
        })
    })
}

function Maestros(){

}