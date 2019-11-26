<div class="navbar sticky">
    <div class="brand">
        <!-- <div class="icon"></div> -->
        <a href="<?php echo constant('URL');?>" class="icon"></a>
        <div class="expand"></div>
    </div>
    <div class="nav" id="menu">
        <?php
        if(!session_status())
            session_start();
            if(isset($_SESSION['usr_name'])){
                echo '<a href="' . constant('URL') . '"><div class="item">Inicio</div></a>';
                echo '<a href="' . constant('URL') . 'users/add"><div class="item">Add User</div></a>';
                echo '<a href="' . constant('URL') . 'alumnos/inscribir"><div class="item">Inscribir</div></a>';
                echo '<a href="' . constant('URL') . 'login/end"><div class="item">Cerrar Sesion</div></a>';
            }else{
                echo '<a href="' . constant('URL') . 'instalaciones" class="item">Instalaciones</a>';
                // echo '<a href="' . constant('URL') . 'about"><div class="item">Acerca de</div></a>';
                // echo '<a href="' . constant('URL') . 'login"><div class="item">Login</div></a>';
            }
        ?>
    </div>
    <div class="user">
        <?php
            if(isset($_SESSION['usr_name'])){
                echo "<div class='usrimg'><img src='".constant('URL')."public/img/guardarias.jpg'></div>";
                echo '<a href="' . constant('URL') . '"><div class="item">'.$_SESSION['usr_name'].'</div></a>';
                
            }else{
                echo "<div class='usrimg'><img src='".constant('URL')."public/ico/login.png'></div>";
                echo '<a href="' . constant('URL') . 'login "><div class="item">Iniciar Sesion</div></a>';
            }
        ?>
    </div>
</div>
<script src="<?php echo constant('URL');?>public/js/utilities.js"></script>
