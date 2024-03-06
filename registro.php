<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		header("location:index.php");
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>registro</title>
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
            height: 40px; 
            background: url('img/ventas.png') center center no-repeat;
            background-size: contain; 
        }
        </style>
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>

</head>
<body>
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-5"></div>
			<div class="col-sm-5">
				<div class="panel panel-danger">
					<div class="panel-heading" style="color: white;">REGISTRAR ADMINISTRADOR</div>
					<div class="panel panel-body">
						<form id="frmRegistro">
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" name="nombre" id="nombre">
							<label>Apellido</label>
							<input type="text" class="form-control input-sm" name="apellido" id="apellido">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>password</label>
							<input type="text" class="form-control input-sm" name="password" id="password">
							<p></p>
							<div class="text-center">
                            <a href="index.php" class="btn btn-default">Regresar </a>
                            <span class="btn btn-primary" id="registro">Registrar</span>
                        </div>
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
		$('#registro').click(function(){

			vacios=validarFormVacio('frmRegistro');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/registrarUsuario.php",
				success:function(r){
					alert(r);

					if(r==1){
						alert("Agregado con exito");
					}else{
						alert("Fallo al agregar :(");
					}
				}
			});
		});
	});
</script>

