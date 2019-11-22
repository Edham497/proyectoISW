<body class="col sc pdgT100">
    <form class="formulario col sc pdg20" action="<?php echo constant('URL')?>login/start" method="POST">
        <div class=" fullW display4">Inicio de Sesion</div>
        <span class="mt50">
            <input class="balloon fullW" name="usrname" autocomplete="off" type="text" /><label for="phone">Usuario</label>
        </span>
        <span class="mt50">
            <input class="balloon fullW" name="pass" autocomplete="off" type="password" /><label for="phone">Contraseña</label>
        </span>
       
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