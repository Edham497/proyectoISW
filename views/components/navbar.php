<div class="navbar sticky">
    <div class="brand">
        <div class="icon"></div>
        <a href="<?php echo constant('URL');?>"><div class="titulo">Guarderia Yocho</div></a>
        <div class="expand"></div>
    </div>
    <div class="nav" id="menu">
        <?php 
            if(App::is_session_started()){
                echo '<a href="' . constant('URL') . '"><div class="item">Inicio</div></a>';
                echo '<a href="' . constant('URL') . 'users/add"><div class="item">Add User</div></a>';
                echo '<a href="' . constant('URL') . 'login/end"><div class="item">Cerrar Sesion</div></a>';
            }else{
                echo '<a href="' . constant('URL') . 'Instalaciones"><div class="item">Instalaciones</div></a>';
                echo '<a href="' . constant('URL') . 'About"><div class="item">Acerca de</div></a>';
                echo '<a href="' . constant('URL') . 'login"><div class="item">Login</div></a>';
            }
        ?>
    </div>
</div>

<script src="<?php echo constant('URL');?>public/js/utilities.js"></script>