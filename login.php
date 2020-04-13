<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="estilos/estilo.css">
<link rel="stylesheet" href="estilos/animate.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <?php require_once "scripts.php"; ?>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" style="font-size:x-large;" href="index.html"><b>Bunt</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">

            <a class="nav-item nav-link" href="registro.php">Registrarse</a>
            <a class="nav-item nav-link" href="#">Nosotros</a>
        </div>
    </div>
</nav>

<body class="body_loguin">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mt-lg-0">
                <div style="margin-top: 10%;">
                    <div class="jumbotron " style="background-color:rgba(0, 0, 0, 0.49); color: seashell;">
                        <div class="row">
                            <div class="col-md-6 d-none d-sm-block " style="border-right: 1px solid white;font-size: x-large;">
                                <h2 class="animated  bounceInLeft ">Hola denuevo!</h2>
                                <br>
                                <p>Inicia sesion para poder comenzar.</p>
                                <ul>
                                    <li class="animated  bounceInDown delay-1s">Registra mas rapido</li>
                                    <li class="animated  bounceInDown delay-2s">Analiza la informacion</li>
                                    <li class="animated  bounceInDown delay-3s">Mejora el proceso</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <form>
                                    <div class="form-group">
                                        <label  style="font-size: x-large;">Correo o Usuario</label>
                                        <input type="text" class="form-control" id="correo" aria-describedby="emailHelp" name="correo" required>
                                        <small id="emailHelp" class="form-text text-muted" style="color: snow!important;">Escribe tu correo o usuario</small>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: x-large;">Contraseña</label>
                                        <input type="password" class="form-control" id="contraseña" name="contraseña" required >
                                    </div>
                                    <a href="#" style="color: orange;">ohh! olvidaste tu contraseña.</a>
                                    <button type="submit" class="btn btn-outline-light" style="margin-top: 5% ;float: right;" id="entrarSistema" name="entrarSistema">Iniciar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
   
</body>
<div class="fixed-bottom">
    <div class="text-center py-2" style="background-color: #fffafa69;">© 2020 Copyright:Carlos Serrano, Pamela Gutierrez
    </div>
</div>

</html>
<script type="text/javascript">
$(document).ready(function(){
    $('#entrarSistema').click(function(){
        if($('#correo').val()==""){
            alertify.alert("Por favor ingresa el correo ");
            return false;
        }else if($('#contraseña').val()=="" ){
            alertify.alert("Ingresa la contraseña");
            return false;
        }
        cadena="correo=" + $('#correo').val() +
                "&contraseña=" + $('#contraseña').val();
              
                $.ajax({
						type:"POST",
						url:"php/login.php",
						data:cadena,
						success:function(r){
							if(r==1){
								window.location="exito.php";
							}else{
								alertify.alert("Fallo al entrar");
							}
						}
					});
    });
});
</script>