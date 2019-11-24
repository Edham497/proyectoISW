<body class="col sc pdgT100">
    <div class="textBox fullW maxW500 pdg20 col cc">
        <div class="mrg0 pdg0 pdg10 brn fs30" style="font-weight:300">Listado de Usuarios</div>
        <span class="maxW300">
            <select class="balloon maxW300" name="" id="tabla">
                <option value="idAdulto">ha</option>
            </select>
            <label for="">Tipo</label>
        </span>
        <span class="maxW300">
            <select class="balloon maxW300" name="" id="tabla">
                <option value="idAdulto">ID</option>
                <option value="nomAdulto">Nombre</option>
                <option value="apPatAdulto">Ap. Paterno</option>
                <option value="apMatAdulto">Ap. Materno</option>
                <option value="salon">Salon</option>
                <option value="fecha">Fecha</option>
            </select>
            <label for="">Filtro</label>
        </span>
        <span class="maxW200">
            <input class="balloon maxW200" id="search" autocomplete="off" type="text" />
            <label for="phone">ID</label>
        </span>
        <!-- <input type="text" class="ham-fblue fs20 ham-input brn boxshwblue" autocomplete="off" id="search"> -->
    </div>
    <div class="container full">
        <div class="table-container">
            <table id="usuarios">

            </table>
        </div>
    </div>
    <script src="<?php echo constant('URL');?>public/js/table.js"></script>
    <script src="<?php echo constant('URL');?>public/js/tableUsuarios.js"></script>
</body>