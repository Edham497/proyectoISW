<body class="col sc pdgT60 fullw fixFlowC">
    <form class="formulario col ss pdg20" action="<?php echo constant('URL')?>user/insert" method="POST">
        <div class=" fullW display4">Registro</div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Nombre(s)</div>
            <input type="text" class="ham-fblue fs20 ham-input brn boxshwblue" name="name" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Apellido Paterno</div>
            <input type="text" class="fs20 ham-input brn boxshwblue" name="apPat" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Apellido Materno</div>
            <input type="text" class="ham-fblue fs20 ham-input brn boxshwblue" name="apMat" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Correo</div>
            <input type="email" class="fs20 ham-input brn boxshwblue" name="email" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Contraseña</div>
            <input type="password" class="fs20 ham-input brn boxshwblue" name="pass" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Telefono</div>
            <input type="text" class="fs20 ham-input brn boxshwblue" name="telefono" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Rol        
            <select name="rol" style="background: transparent;border: none;font-size: 14px;height: 30px;padding: 5px;width: 250px;">
                <option value="2">Maestro</option>
                <option value="3">Pediatra</option>
                <option value="4">Tutor</option>
            </select>    
            </div>
        </div>
        <button class="ham-btn cold-blue pdgH20 fullW maxW500 display5" type="submit">Registrar</button>
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