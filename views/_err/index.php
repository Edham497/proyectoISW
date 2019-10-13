<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="theme-color" content="#0a0a0a">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="mainTitle">Error 404</div>
        <p>El lugar solicitado no se ha encontrado, verifica el enlace y vuelve a intentarlo</p>
    </div>
    <a href="/proyectoISW/"><div class="btn">Regresar</div></a>
</body>
<style>
*{margin:0;box-sizing: border-box;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-weight: 100}
html, body{width: 100%; height:100vh; user-select: none;}
body{background:#0a0a0a; color:#FFF;display: grid; place-items:center;}
.mainTitle{font-size: 5em;}
.btn{font-size: 1.5em; background: #232323; padding: 10px 25px; border-radius: 5px;border: solid teal 2px; transition: .25s ease-in-out;}
.btn:hover{background: teal; color: #0a0a0a;}
.btn:active{background:gray;}
p{padding-left: 10px; color:gray;}
a{text-decoration: none; color: white}
@media (max-width:720px){.main{max-width:350px; text-align:center;}}
</style>
</html>