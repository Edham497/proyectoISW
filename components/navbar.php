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
                switch($_SESSION['rol']){
                    case 1:{
                        echo '<a href="' . constant('URL') . 'inscripcion"><div class="item">Inscribir</div></a>';
                        echo '<a href="' . constant('URL') . 'Bitacoras"><div class="item">Bitacoras</div></a>';
                        echo '<a href="' . constant('URL') . 'Asistencia"><div class="item">Asistencia</div></a>';
                        echo '<a href="' . constant('URL') . 'Colegiaturas"><div class="item">Colegiaturas</div></a>';
                    }break;
                    case 2:{
                        echo '<a href="' . constant('URL') . 'Bitacoras"><div class="item">Bitacoras</div></a>';
                        echo '<a href="' . constant('URL') . 'Asistencia"><div class="item">Asistencia</div></a>';
                        echo '<a href="' . constant('URL') . 'Usuarios"><div class="item">Usuarios</div></a>';
                        echo '<a href="' . constant('URL') . 'Colegiaturas"><div class="item">Colegiaturas</div></a>';
                    }break;
                    case 3:{
                        echo '<a href="' . constant('URL') . 'Bitacoras"><div class="item">Bitacoras</div></a>';
                        echo '<a href="' . constant('URL') . 'Asistencia"><div class="item">Asistencia</div></a>';
                    }break;
                    case 4:{
                        echo '<a href="' . constant('URL') . 'Bitacoras"><div class="item">Bitacoras</div></a>';
                    }break;
                    case 5:{
                        echo '<a href="' . constant('URL') . 'Bitacoras"><div class="item">Bitacoras</div></a>';
                        echo '<a href="' . constant('URL') . 'Asistencia"><div class="item">Asistencia</div></a>';
                        echo '<a href="' . constant('URL') . 'Colegiaturas"><div class="item">Colegiaturas</div></a>';
                    }break;
                }
                echo '<a href="' . constant('URL') . 'login/end"><div class="item">Cerrar Sesion</div></a>';
            }else{
                // echo '<a href="' . constant('URL') . 'instalaciones" class="item">Instalaciones</a>';
                // echo '<a href="' . constant('URL') . 'about"><div class="item">Acerca de</div></a>';
                // echo '<a href="' . constant('URL') . 'login"><div class="item">Login</div></a>';
            }
        ?>
    </div>
    <div class="user">
        <?php
            if(isset($_SESSION['usr_name'])){
                echo "<div class='usrimg loged'><img src='".constant('userImages') . $_SESSION['usr_img']."'></div>";
                echo '<a href="' . constant('URL') . '/perfil"><div class="nombre">'.$_SESSION['usr_name'].'</div></a>';
                
            }else{
                echo "<div class='usrimg'><img src='".constant('URL')."public/ico/login.png'></div>";
                echo '<a href="' . constant('URL') . 'login "><div class="item">Iniciar Sesion</div></a>';
            }
        ?>
    </div>
</div>
<script src="<?php echo constant('URL');?>public/js/utilities.js"></script>
