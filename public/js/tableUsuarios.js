let dataTable = new table()
fetch(`api/users/describe`)
    .then(function (response) {
        return response.json();
    })
    .then(function (myJson) {
        dataTable.cleanTable()
        dataTable.setHeaders(myJson)
    });
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