<body class="col sc pdt100">
    <div class="textBox fullW maxW500 pdg20 mb40 col cc">
        <h1 class="mrg0 pdg0 pd20 mb20 brn" style="font-weight:300">Listado de Usuarios</h1>
        <!-- <span class="maxW300">
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
        </span>-->
        <span class="maxW200">
            <input class="balloon maxW200" id="search" autocomplete="off" type="text" />
            <label for="phone">ID</label>
        </span>
        <div class="ham-btn ham-blue" id="newModal">Nuevo</div>
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
    <script src="<?php echo constant('URL');?>public/js/modal.js"></script>
    <script src="<?php echo constant('URL');?>public/js/modalNuevoUsuario.js"></script>
    <style>
        @media  only screen and (max-width: 650px), (min-device-width: 768px) and (max-device-width: 1024px)  {
            td:nth-of-type(1):before { content: "ID"; }
            td:nth-of-type(2):before { content: "Ap. Paterno"; }
            td:nth-of-type(3):before { content: "Ap. Materno"; }
            td:nth-of-type(4):before { content: "Nombre"; }
            td:nth-of-type(5):before { content: "Fecha de Nacimiento"; }
            td:nth-of-type(6):before { content: "Correo"; }
            td:nth-of-type(7):before { content: "Direccion"; }
            td:nth-of-type(8):before { content: "Telefono"; }
            td:nth-of-type(9):before { content: "Rol"; }
        }
    </style>
</body>