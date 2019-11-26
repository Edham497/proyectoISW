<div class="container full pdV100 col sc">
    <form action="" method="post" class="formulario col sc">
        <h1 class="tac">
            <label>Iniciar Sesion</label>
            <div id="msg"></div>
        </h1>
        <span class="mt30">
            <input class="balloon" autocomplete="off" type="text" id="user" name="user">
            <label for="user">Correo</label>
        </span>
        <span class="mt30">
            <input class="balloon" autocomplete="off" type="password" id="pass" name="pass">
            <label for="pass">Contraseña</label>
        </span>
        <span class="mt20">
            <a href="#" class="fPass">¿Olvido su Contraseña?</a>
        </span>
        <button class=" btn-sub" id="enviar">Iniciar Sesion</button>
    </form>
</div>
<script>
    //87
    $ = (id)=> document.getElementById(id)
    document.getElementById('enviar').addEventListener('click', (e)=>{
        e.preventDefault()
        // fetch('api/')
        // .then((res)=>{
        //     return res.json()
        // })
        // .then((json)=>{
        //     alert(json)
        // })
        let data = {
            usr: $('user').value,
            pass: $('pass').value
        }
        // console.log(data)
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

    function createAlert(msg, Class){
        let card = $('msg')
        card.classList = []
        card.innerHTML = ''
        card.classList.add('active')
        if(Class != undefined){
            card.classList.add(Class)
        } 
        card.innerHTML = msg
    }
</script>