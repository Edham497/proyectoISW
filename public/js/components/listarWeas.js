async function fetch_GET(url, param){
    let response = await fetch(`${url}/${param}`);
    let data = await response.json()
    return data;
}

async function fetch_POST(url, data){
    let response = await fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    let info = await response.JSON()
    return info
}

/** Funcion para listar niños desde la api **/
async function getAlumnos(){
    return await fetch_GET('api/admin/', 'listkids')
}
async function buscarAlumnos(param){
    return await fetch_GET('api/kids/', `searchKid/${param}`)
}
async function totalAlumnos(){
    return await fetch_GET('api/admin/nInscritos');
}
async function totales(){
    return await fetch_GET('api/admin/totales');
}