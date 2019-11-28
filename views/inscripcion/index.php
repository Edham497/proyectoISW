<body class="col sc pdgT60">
    <div class="container">
        <div class="ham-title mrg20 pdg10 mt40 ">Inscripcion</div>
    </div>
    <form action="<?php echo constant('URL');?>API/admin/inscripcion" method="POST" class="formulario pdg10">
        
        <div class="ham-subtitle cold-blue m0 mt20">Informacion del Niño</div>
            <span class="">
                <input class="balloon" name="nomNiño" id="search" autocomplete="off" type="text" /><label for="phone">Nombre</label>
            </span>
            <span class="">
                <input class="balloon" name="apPatNiño" id="search" autocomplete="off" type="text" /><label for="phone">Ap. Paterno</label>
            </span>
            <span class="">
                <input class="balloon" name="apMatNiño" id="search" autocomplete="off" type="text" /><label for="phone">Ap. Materno</label>
            </span>
            <span class="">
                <input class="balloon" name="grado" id="search" autocomplete="off" type="text" /><label for="phone">Grado</label>
            </span>
            <span class="row">
                <span class="mrg10">
                <input class="balloon pdg10 pdgL0" name="dia" id="search" autocomplete="off" type="number" placeholder="Dia"/><label for="phone">Dia</label>
                </span>
                <span class="mrg10">
                <input class="balloon pdg10 pdgL0" name="mes" id="search" autocomplete="off" type="number" placeholder="Mes"/><label for="phone">Mes</label>
                </span>
                <span class="mrg10">
                <input class="balloon pdg10 pdgL0" name="anio" id="search" autocomplete="off" type="number" placeholder="Año"/><label for="phone">Año</label>
                </span>
            </span>
            <span class="">
                <input class="balloon" name="direccion" id="search" autocomplete="off" type="text" /><label for="phone">Direccion</label>
            </span>
        <div class="ham-subtitle cold-dark m0 mt20">Informacion del Tutor</div>
            <span class="">
                <input class="balloon" name="nomTut" id="search" autocomplete="off" type="text" /><label for="phone">Nombre</label>
            </span>
            <span class="">
                <input class="balloon" name="apPatTut" id="search" autocomplete="off" type="text" /><label for="phone">Ap. Paterno</label>
            </span>
            <span class="">
                <input class="balloon" name="apMatTut" id="search" autocomplete="off" type="text" /><label for="phone">Ap. Materno</label>
            </span>
            <span class="">
                <input class="balloon" name="email" id="search" autocomplete="off" type="email" /><label for="phone">Correo</label>
            </span>
            <span class="">
                <input class="balloon" name="pass" id="search" autocomplete="off" type="password" /><label for="phone">Contraseña</label>
            </span>
            <span class="">
                <input class="balloon" name="telefono" id="search" autocomplete="off" type="text" /><label for="phone">telefono</label>
            </span>
        <div class="ham-subtitle cold-dark m0 mt20">Informacion del Autorizado 1</div>
            <span class="">
                <input class="balloon" name="nomAut1" id="search" autocomplete="off" type="text" /><label for="phone">Nombre</label>
            </span>
            <span class="">
                <input class="balloon" name="apPatAut1" id="search" autocomplete="off" type="text" /><label for="phone">Ap. Paterno</label>
            </span>
            <span class="">
                <input class="balloon" name="apMatAut1" id="search" autocomplete="off" type="text" /><label for="phone">Ap. Materno</label>
            </span>
            <span class="">
                <input class="balloon" name="telefonoAut1" id="search" autocomplete="off" type="text" /><label for="phone">telefono</label>
            </span>
        <div class="ham-subtitle cold-dark m0 mt20">Informacion del Autoriazado 2</div>
        <span class="">
                <input class="balloon" name="nomAut2" id="search" autocomplete="off" type="text" /><label for="phone">Nombre</label>
            </span>
            <span class="">
                <input class="balloon" name="apPatAut2" id="search" autocomplete="off" type="text" /><label for="phone">Ap. Paterno</label>
            </span>
            <span class="">
                <input class="balloon" name="apMatAut2" id="search" autocomplete="off" type="text" /><label for="phone">Ap. Materno</label>
            </span>
            <span class="">
                <input class="balloon" name="telefonoAut2" id="search" autocomplete="off" type="text" /><label for="phone">telefono</label>
            </span>
            <button class="ham-btn ham-blue pdgH20 fullW mgV50 display5">Terminar Inscripcion</button>
    </form>
    <script>
        document.querySelector('.ham-btn').addEventListener('click', (e)=>{
            e.preventDefault()
            location.href = '/proyectoISW/'
        })
    </script>
</body>