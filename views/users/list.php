<body class="col sc pdgT100">
    <div class="textBox fullW maxW500 pdg20 col cc">
        <div class="mrg0 pdg0 pdg10 brn">Usuario</div>
        <input type="text" class="ham-fblue fs20 ham-input brn boxshwblue" autocomplete="off" id="search">
    </div>
    <div class="container full">
        <div class="table-container">
            <table>
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
            search = document.querySelector('#search').value
            sendRequest(search)
        })
        function sendRequest(){
            let req = new XMLHttpRequest();
            req.open('POST', '/users/list2', true);

        }
    </script>
</body>