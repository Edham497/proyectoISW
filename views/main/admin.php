<div class="admin pd20">
    <div class="cards grid-6 close mt20">
        <div class="card active" content="Alumnos">
            <div class="title">Alumnos</div>
            <div class="info" id="ni"></div>
        </div>
        <div class="card" content="Usuarios">
            <div class="title">Usuarios</div>
            <div class="info" id="nu"></div>
        </div>
        <div class="card" content="Tutores">
            <div class="title">Tutores</div>
            <div class="info" id="nt"></div>
        </div>
        <div class="card" content="Maestros">
            <div class="title">Maestros</div>
            <div class="info" id="nm"></div>
        </div>
        <div class="card" content="Pediatras">
            <div class="title">Pediatras</div>
            <div class="info" id="np"></div>
        </div>
        <div class="card" content="Autorizados">
            <div class="title">Autorizados</div>
            <div class="info" id="na"></div>
        </div>
    </div>
    <div class="container mt20" id="contenido">
        <?php include "views/alumnos/admin.php"; ?>
    </div>
</div>
<script src="<?php echo constant('URL');?>public/js/componentS/listarWeas.js"></script>
<script src="<?php echo constant('URL');?>public/js/admin/index.js"></script>
<script src="<?php echo constant('URL');?>public/js/components/card.js"></script>
<script src="<?php echo constant('URL');?>public/js/components/table.js"></script>
