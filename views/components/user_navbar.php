<div class="usr_navbar">
    <div class="brand">
    </div>
    <div class="user">
        <div class="nombre"><?php echo $_SESSION['usrname']; ?></div>
        <div class="rol">Admin</div>
    </div>
    <div class="options">
        <a href="#">
            <div class="op">Home</div>
        </a>
        <a href="<?php echo constant('URL') . 'log/logOut'; ?>">
            <div class="op">Cerrar Session</div>
        </a>
    </div>
</div>
<script>
    document.querySelector('.usr_navbar').onclick = () => {
        let navbar = document.querySelector('.usr_navbar');
        navbar.classList.contains('hidden') ?
            navbar.classList.remove('hidden') :
            navbar.classList.add('hidden');
    }
</script>