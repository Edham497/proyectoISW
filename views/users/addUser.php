<body class="col sc pdgT100">
<form class="formulario col ss pdg20" action="<?php echo constant('URL')?>users/create" method="POST">
        <div class=" fullW display4">New User</div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Usuario</div>
            <input type="text" class="ham-fblue fs20 ham-input brn boxshwblue" name="usrname" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <div class="textBox fullW maxW500 pdg20">
            <div class="mrg0 pdg0 pdg10 brn">Rol</div>
            <input type="number" class="fs20 ham-input brn boxshwblue" name="rol" onfocus="elemFocused(this)" onblur="elemBlurred(this)">
        </div>
        <button class="ham-btn cold-blue pdgH20 fullW maxW500 display5" type="submit">Agregar</button>
</form>