
<?php 
	session_start();
	require_once "../php/conexion.php";
	$conexion=conexion();
	
?>
<div class="row">
	<div class="col-sm-12">
	<h2>Registro</h2><table class="table  table-condensed table-bordered">
		<caption>
			<br><br>
		</caption>
		
		<?php	$consulta = "select min(fecha)from t_persona";//fecha inicial
$result1=mysqli_query($conexion,$consulta);//fecha inicial
while($mostrar=mysqli_fetch_array($result1)){
    $fecha1 = $mostrar['min(fecha)'];
   
}
if($fecha1!=""){



 ?>
<table class="table  table-condensed table-bordered">
		<caption>
			<button class="btn" data-toggle="modal" style="background-color: #6d24e394;color:white" data-target="#modalNuevo">
				Agregar nuevo 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			<br><br>
		</caption>
			<tr>
				<td>N_cuenta</td>
				<td>Nombre</td>
				<td>Carrera</td>
				<td>Correo</td>
				<td>Aceptar</td>
				<td>Eliminar</td>
			</tr>

			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT id,no_cuenta, nombre, carrera, correo
						from mytable where id='$idp'";
					}else{
						$sql="SELECT id,nombre,apellido,email,telefono 
						from t_persona where id>1";
					}
				}else{
					$sql="SELECT id,nombre,apellido,email,telefono 
						from t_persona where id>1";
				}

				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4];
			 ?>

			<tr>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				<td>
					<button class="btn  btn-info glyphicon glyphicon-ok" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
						
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>
<?php
}else{
	?>
	<div >
	<img src="../recursos/imagenes/baseline_post_add_white_48dp.png" style="margin-left: 45%" alt="">
	<h2 class="text-center">Aun no tienes ningun registro 😢 </h2>
	<button class="btn" data-toggle="modal" style="background-color: #6d24e394;color:white" data-target="#modalNuevoc">
				Crear 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
	</div>
	<?php
}
?>
