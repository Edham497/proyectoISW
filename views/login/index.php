<body class="col sc pdgT100">
    <form class="formulario col sc pdg20" action="<?php echo constant('URL')?>login/start" method="POST">
        <div class=" fullW display4">Inicio de Sesion</div>
        <span>
            <input class="balloon fullW" name="usrname" autocomplete="off" type="text" /><label for="phone">Usuario</label>
        </span>
        <span>
            <input class="balloon fullW" name="pass" autocomplete="off" type="password" /><label for="phone">Contraseña</label>
        </span>
        <!-- <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Usuario</div>
            <input type="text" class="ham-fblue fs20 ham-input brn boxshwblue" name="usrname" autocomplete="off" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Contraseña</div>
            <input type="password" class="fs20 ham-input brn boxshwblue" name="pass" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div> -->
        <a href="<?php echo constant('URL');?>login/pass_recovery" class="ham-fblue pdg20 fwB">¿Olvido su Contraseña?</a>
        <button class="ham-btn cold-blue pdgH20 fullW maxW500 display5" type="submit">Iniciar Sesion</button>
    </form>

    <script>
        function elemFocused(element) {
            element.classList.add('ham-blue')
            element.style.outline = 'none'
        }

        function elemBlurred(element) {
            element.classList.remove('ham-blue')
        }
    </script>
</body>