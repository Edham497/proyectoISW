<div class="navbar sticky">
    <div class="brand">
        <div class="expand expandMenu"></div>
        <div class="icon"></div>
        <a href="<?php echo constant('URL');?>"><div class="titulo">Guarderia M. Jackson</div></a>
    </div>
</div>

<div class="usr_navbar hidden">
    <div class="brand">
        <img src="<?php echo constant('URL');?>public/img/guardarias.jpg" alt="">
    </div>
    <div class="user">
        <div class="nombre"><?php echo $_SESSION['usr_name']; ?></div>
        <div class="rol"><?php echo $_SESSION['usr_roleName']; ?></div>
    </div>
    <div class="options">
<<<<<<< HEAD
        <a href="<?php echo constant('URL') ?>">
            <div class="op">Home</div>
=======
        <a href="<?php echo constant('URL')?>users/add">
            <div class="op">ADD USER</div>
>>>>>>> edham
        </a>
        <?php if($_SESSION['usr_role'] === 1){ ?>
            <a href="<?php echo constant('URL') . 'login/signup'; ?>">
                <div class="op">Registro</div>
            </a>
        <?php } ?>
        <a href="<?php echo constant('URL') . 'login/end'; ?>">
            <div class="op">Cerrar Session</div>
        </a>
    </div>
</div>
<script>
    document.querySelector('.expandMenu').onclick = () => {
        let navbar = document.querySelector('.usr_navbar');

        if(navbar.classList.contains('hidden')){
            navbar.classList.remove('hidden')
            navbar.style.animation = "slideIn 1 .5s ease-in-out"
            // setTimeout(() => {
            navbar.style.left = "0%"
            // }, 410);
        }
        else{
            navbar.classList.add('hidden')
            // setTimeout(() => {
            navbar.style.left = "-100%"
            // }, .510);
        }
            
    }
</script>