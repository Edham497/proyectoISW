<body class="col sc pdgT100">
    <form class="formulario col ss pdg20" action="<?php echo constant('URL')?>login/start" method="POST">
        <div class=" fullW display4">Inicio de Sesion</div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Usuario</div>
            <input type="text" class="ham-fblue fs20 ham-input brn boxshwblue" name="usrname" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Contraseña</div>
            <input type="password" class="fs20 ham-input brn boxshwblue" name="pass" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <a href="<?php echo constant('URL');?>login/pass_recovery" class="ham-fblue pdg20 fwB">¿Olvido su Contraseña?</a>
        <button class="ham-btn cold-blue pdgH20 fullW maxW500 display5" type="submit">Iniciar Sesion</button>
    </form>

    <script>
        // let txtbox = document.querySelector('#usrname')
        // txtbox.onfocus = ()=> {elemFocused(txtbox)}
        // txtbox.onblur = ()=> {elemBlurred(txtbox)}

        document.querySelector('.navbar').classList.add('material-normal');

        function elemFocused(element) {
            element.classList.add('ham-blue')
            element.style.outline = 'none'
        }

        function elemBlurred(element) {
            element.classList.remove('ham-blue')
        }
    </script>
</body>