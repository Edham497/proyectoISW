<body class="col sc pdgT100">
    <div class="textBox fullW maxW500 pdg20 col cc">
        <div class="mrg0 pdg0 pdg10 brn fs30" style="font-weight:300">Listado de Usuarios</div>
        <span class="maxW200">
            <input class="balloon maxW200" id="search" autocomplete="off" type="text" /><label for="phone">ID</label>
        </span>
        <!-- <input type="text" class="ham-fblue fs20 ham-input brn boxshwblue" autocomplete="off" id="search"> -->
    </div>
    <div class="container full">
        <div class="table-container">
            <table id="usuarios">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>rol</th>
                        <th>Pass</th>
                    </tr>
                </thead>
                <?php
                while ($row = $this->empleados->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['usrname'] . "</td>";
                    echo "<td>" . $row['rol'] . "</td>";
                    echo "<td>" . $row['pass'] . "</td>";
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
    <script>
        document.querySelector('#search').addEventListener('keyup', () =>{
            search = document.querySelector('#search').value.trim()
            console.log(search.length)
            if(search.length  == 0){
                fetch(`<?php echo constant('URL');?>api/users/list`)
                .then(function(response) {
                    return response.json();
                })
                .then(function(myJson) {
                    let table = document.querySelector('#usuarios');
                    table.innerHTML = `
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>rol</th>
                            <th>Pass</th>
                        </tr>
                    </thead>`
                    myJson.forEach(user =>{
                        let id = user.id
                        let usrname = user.usrname
                        let rol = user.rol
                        let pass = user.pass
                        let row = document.createElement('tr');
                        row.innerHTML = `
                        <td>${id}</td>
                        <td>${usrname}</td>
                        <td>${rol}</td>
                        <td>${pass}</td>`;
                        table.appendChild(row);
                    })
                });
            }else{
                fetch(`<?php echo constant('URL');?>api/users/get/${search}`)
                .then(function(response) {
                    return response.json();
                })
                .then(function(myJson) {
                    let id = myJson.id
                    let usrname = myJson.usrname
                    let rol = myJson.rol
                    let pass = myJson.pass
                    let row = document.createElement('tr');
                    row.innerHTML = `
                    <td>${id}</td>
                    <td>${usrname}</td>
                    <td>${rol}</td>
                    <td>${pass}</td>`;
                    let table = document.querySelector('#usuarios');
                    table.innerHTML = `
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>rol</th>
                            <th>Pass</th>
                        </tr>
                    </thead>`
                    table.appendChild(row);
                });
                
            }
        })
    </script>
</body>