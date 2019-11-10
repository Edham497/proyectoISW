<body class="cold-dark pdgT60">
    <div class="container col sc pdg20">
        <div class="title fs30">Listado de Empleados</div>
        <!-- <p>Pagina Principal del sitio</p> -->
        <div class="cardContainer row cc mt30 wp fullw fixFlowC">
            <?php
            while($row = $this->empleados->fetch(PDO::FETCH_ASSOC)){
                switch($row['rolAdulto']){
                    case 2:$rol = "Maestro";break;
                    case 3:$rol = "Pediatra";break;
                }
                echo '<div class="card cold-ligh">
                        <div class="info cold-dark">
                            <div class="label">Nombre</div>
                            <div class="txt">'.$row['nomAdulto'].' '.$row['apPatAdulto'].' '.$row['apMatAdulto'].'</div>
                            <div class="label">Rol</div>
                            <div class="txt">'.$rol.'</div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>
</body>