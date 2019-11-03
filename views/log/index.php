<body class="of-hidden col cc">
    <form class="formulario col sc" action="<?php echo constant('URL')?>log/logIn" method="POST">
        <div class="ham-title">Iniciar Sesion</div>
        <div class="textBox pdg20">
            <div class="ham-subtitle mrg0 pdg0 pdg10 tac cold-light brn">Usuario</div>
            <input type="text" class="ham-fblue fs20 ham-input cold-lightgrey tac brn" name="usrname" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <div class="textBox pdg20">
            <div class="ham-subtitle mrg0 pdg0 pdg10 tac cold-light brn">Contraseña</div>
            <input type="password" class="fs20 ham-input cold-lightgrey tac brn" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <a href="" class="ham-fblue">¿Olvido su Contraseña?</a>
        <button class="ham-btn cold-blue pdgH20" type="submit">Iniciar Sesion</button>
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