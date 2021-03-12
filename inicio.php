<?php
	session_start();

	if(isset($_SESSION['user'])){

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php require_once "scripts.php";include "php/listaContactos.php"; ?>
</head>
<body>
<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="jumbotron">
					<h2>Entraste con exito</h2>
					  <a href="registrarContacto.php" class="btn btn-primary">Nuevo Contacto</a>
					  <a href="php/salir.php" class="btn btn-danger">Salir del sistema</a>
				</div>
			</div>

		</div>
		<div class="row">
			<table class="table table-bordered contacto" >
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nombres</th>
				      <th scope="col">Apellidos</th>
				      <th scope="col">Email</th>
				      <th scope="col">Télefono</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
                        foreach ($contactos as $c => $row) {
                        ?>
                        <tr>
                        	<th >
                        		<?php echo $c+1;?>
                        	</th>
                        	<td><?php echo $row[1];?></td>
						    <td><?php echo $row[2];?></td>
						     <td><?php echo $row[5];?></td>
						     <td><?php echo $row[6];?></td>
						    </tr>
                        <?php
                        }
				    ?>



				  </tbody>
				</table>
		</div>
	</div>
</body>
</html>

<?php
} else {
	header("location:index.php");
	}
 ?>
