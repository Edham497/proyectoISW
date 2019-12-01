<div class="recepcion full pd20">
    <div class="container full col sc ">
        <div class="ham-title fw100">Listado de Usuarios</div>
        <span class="maxW500">
            <input class="balloon" type="text" id="search" autocomplete="off">
            <label for="filtro">Buscar</label>
        </span>
        <div class="ham-btn ham-blue" id="newModal">Nuevo</div>
        <div class="container full">
        <div class="table-container">
            <table id="usuarios">

            </table>
        </div>
    </div>
    </div>
</div>

    
    <script src="<?php echo constant('URL');?>public/js/components/table.js"></script>
    <script src="<?php echo constant('URL');?>public/js/components/modal.js"></script>
    <script src="<?php echo constant('URL');?>public/js/tableUsuarios.js"></script>
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