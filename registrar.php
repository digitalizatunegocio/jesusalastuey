<?php

$servidor="localhost";
$usuario="root";
$clave="";
$baseDeDatos="webpersonal";

$conexion=mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
if(!$conexion){echo"Error en la Conexion con el Servidor";}

if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['email']) >= 1) 
		{
	    $name = trim($_POST['name']);
	    $email = trim($_POST['email']);
	    $fecha = date("Y-m-d H:i:s");
	    $consulta = "INSERT INTO acceso(nombre, email, fecha) VALUES ('$name','$email','$fecha')";
	    $resultado = mysqli_query($conexion,$consulta);
		if ($resultado) {
	    	header("Location:web.html");exit;
	    }
    }   else {
	    	?>
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}


?>


