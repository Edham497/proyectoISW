<?php require 'views/head.php';?>
<?php require 'views/components/header.php';?>
    <div class="main col ss material-light pdgB100">
        <div class="title fs30">Listado de niños</div>
        <!-- <p>Pagina Principal del sitio</p> -->
        <div class="cardContainer row cc mt30 wp fullw fixFlowC">
            <?php
                for($i =0; $i < 50; $i++)
                    echo '<div class="card material-lighter">
                    <div class="info material-normal">
                        <div class="label">Nombre</div>
                        <div class="txt">Roberto Agustín Miguel Santiago Samuel Trujillo Veracruz</div>
                        <div class="label">Grupo</div>
                        <div class="txt">Maternal 3</div>
                        <div class="label">Maestro</div>
                        <div class="txt">Susana</div>
                    </div>
                </div>'; 
            ?>
        </div>
    </div>
</body>
</html>