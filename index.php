<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='lineys14'";
    $sql="SELECT * from usuarios where email='maribel'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=2;
	}
 ?>


<!DOCTYPE html>
<html>
<head>
    <title>Login de usuario</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <style>
        body {
            background-color: gray;
        }

        .panel-body {
            background: url('img/ventas.png') center center no-repeat;
            background-size: cover;
            padding: 100px; 
        }

        .image-container {
            height: 150px; /* Ajusta la altura según tus necesidades */
            background: url('img/ventas.png') center center no-repeat;
            background-size: contain; /* Puedes ajustar esto según tus preferencias */
        }
    </style>
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>
</head>
<body>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading"> SISTEMA INTEGRAL DE VENTAS</div>
                    <div class="panel-body">
                        <form id="frmLogin">
                            <label>Usuario</label>
                            <input type="text" class="form-control input-sm" name="usuario" id="usuario">
                            <label>password</label>
                            <input type="password" name="password" id="password" class="form-control input-sm">
                            <p></p>
                            <span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span>
                            <?php if(!$validar): ?>
                                <a href="registro.php" class="btn btn-danger btn-sm">Registrar</a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#entrarSistema').click(function(){

            vacios = validarFormVacio('frmLogin');

            if(vacios > 0){
                alert("Debes llenar todos los campos!!");
                return false;
            }

            datos = $('#frmLogin').serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "procesos/regLogin/login.php",
                success: function(r){

                    if(r == 1){
                        window.location = "vistas/inicio.php";
                    }else{
                        alert("No se pudo acceder :(");
                    }
                }
            });
        });
    });
</script>

	