let t_Usuarios = new table()
getUsers()

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

function getUsers(){
    fetch(`api/users/list`)
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {
            t_Usuarios.cleanTable()
            myJson.forEach(user => t_Usuarios.addRow(Object.values(user)))
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
                    t_Usuarios.table.innerHTML = `<tr><td><h2 style='font-weight: 100'>${myJson['Error']}</h2></td></tr>`
                }else{
                    t_Usuarios.cleanTable()
                    t_Usuarios.addRow(Object.values(myJson))
                }
            })
        }
})