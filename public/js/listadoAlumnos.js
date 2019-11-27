function crearTerjetaAlumno(nombre, grado, id) {
    let card = document.createElement('div')
    card.className = 'cardAlumno'
    card.id = id
    let _nombre = document.createElement('div')
    _nombre.className = 'nombre'
    _nombre.innerHTML = nombre
    let _grado = document.createElement('div')
    _grado.className = 'grado'
    _grado.innerHTML = grado
    card.appendChild(_nombre)
    card.appendChild(_grado)
    return card
}

let listAlumnos = document.querySelector('.alumnos')

document.querySelector('#search').addEventListener('keyup', () => {
    clearList()
    search = document.querySelector('#search').value.trim()
    // console.log(search.length)
    if (search.length == 0)
        getNiños()
    else {
        fetch(`api/ninos/get/${search}`)
            .then(function (response) {
                return response.json();
            })
            .then(function (myJson) {
                if (myJson['Error'] || myJson['error']) {
                    dataTable.table.innerHTML = `<tr><td><h2 style='font-weight: 100'>${myJson['Error']}</h2></td></tr>`
                } else {
                        listAlumnos.appendChild(crearTerjetaAlumno(myJson.nomNiño, myJson.grado, myJson.idNiño))

                }
            })
    }
})

    function getNiños() {
        clearList()
        fetch(`api/kids/listKids`)
            .then(function (response) {
                return response.json();
            })
            .then(function (myJson) {
                myJson.forEach(niño => {
                    listAlumnos.appendChild(crearTerjetaAlumno(niño.nomNiño, niño.grado, niño.idNiño))
                })
            });
    }

    function clearList() {
        listAlumnos.innerHTML = ""
    }

    getNiños()