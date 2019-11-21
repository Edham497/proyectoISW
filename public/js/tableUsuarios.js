let t_Usuarios = new table()

fetch(`api/users/describe`)
    .then((response) => {
        return response.json();
    })
    .then((myJson) => {
        let data = []
        myJson.forEach(e => {
            data[data.length] = e.Field
        })
        t_Usuarios.setHeaders(data)
    })

document.querySelector('#search').addEventListener('keyup', () => {
    search = document.querySelector('#search').value.trim()
    // console.log(search.length)
    var i = 1
    if (search.length == 0) {
        fetch(`api/users/list`)
            .then(function (response) {
                return response.json();
            })
            .then(function (myJson) {
                t_Usuarios.cleanTable()
                myJson.forEach(user => {
                    // let arr = []
                    // Object.keys(user).forEach(o =>{
                    //     arr[arr.length] = user[o]
                    // })
                    // t_Usuarios.addRow(arr)
                    t_Usuarios.addRow(Object.values(user))
                    /*const but = document.createElement('button')
                    but.type = 'button'
                    but.innerText = 'Entrada '+(i++)
                    document.body.appendChild(but);
                    but.addEventListener("click",() => {
                        window.alert("Boton "+(i));
                    })*/
                })
            });
    }
    else {
        fetch(`api/users/get/${search}`)
            .then(function (response) {
                return response.json();
            })
            .then(function (myJson) {
                if(myJson['Error'] || myJson['error']){
                    t_Usuarios.table.innerHTML = `<tr><td><h2 style='font-weight: 100'>${myJson['Error']}</h2></td></tr>`
                }else{
                    t_Usuarios.cleanTable()
                    t_Usuarios.addRow(Object.values(myJson))
                }
            })
        }
})