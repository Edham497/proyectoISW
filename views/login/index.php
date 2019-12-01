<div class="container full pdV100 col sc">
    <form action="" method="post" class="formulario col sc">
        <h1 class="tac">
            <label>Iniciar Sesion</label>
            <div id="msg"></div>
        </h1>
        <span class="mt30">
            <input class="balloon" autocomplete="off" type="email" id="user" name="user" required>
            <label for="user">Correo</label>
        </span>
        <span class="mt30">
            <input class="balloon" autocomplete="off" type="password" id="pass" name="pass">
            <label for="pass">Contraseña</label>
        </span>
        <span class="mt20">
            <a href="#" class="fPass" id="fp">¿Olvido su Contraseña?</a>
        </span>
        <button class=" btn-sub" id="enviar">Iniciar Sesion</button>
    </form>
</div>
<script src="<?php echo constant('URL');?>public/js/components/modal.js"></script>
<script>
    $('#enviar').addEventListener('click', (e)=>{
        e.preventDefault()
        let data = {
            usr: $('#user').value,
            pass: $('#pass').value
        }

        fetch('api/login', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        })

        .then(res => res.json())
        .then((resp) => {
            if(resp.error){
                createAlert(resp.error)
                return;
            }
            createAlert(resp.success, 'ok')
            setTimeout(() => location.href = '/proyectoISW/', 1000);
        })
        .catch(error=> createAlert(error))
    })

    $('#fp').addEventListener('click', async()=> {
        let m = new Modal()
        getArch('/proyectoISW/views/login/pass_recovery.html').then((data)=>{
            m.insertarContenido(data)
        })
    })

    function createAlert(msg, Class){
        let card = $('#msg')
        card.classList = []
        card.innerHTML = ''
        card.classList.add('active')
        if(Class != undefined){
            card.classList.add(Class)
        } 
        card.innerHTML = msg
    }
</script>