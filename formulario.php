<?php

$servidor="localhost";
$usuario="root";
$clave="";
$baseDeDatos="webpersonal";

$conexion=mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
if(!$conexion){echo"Error en la Conexion con el Servidor";}
?>

<?php
if (isset($_POST['enviar'])) {
    $id = rand(1,99);
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $comentarios = $_POST["comentarios"];
    $date = date("Y-m-d H:i:s");

$consulta = "INSERT INTO visitantes VALUES(null,'$nombre','$correo','$telefono','$comentarios','$date')";
mysqli_query($conexion, $consulta);
mysqli_close($conexion);
}


$destino = "jaalastuey@gmail.com";
$asunto= "Nuevo Formulario Completado Web Personal";

$nombre = $_POST['nombre'];
$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
$correo = $_POST['correo'];
$correo = filter_var($correo,FILTER_SANITIZE_EMAIL);
$telefono = $_POST['telefono'];
$telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
$comentarios = $_POST['comentarios'];
$comentarios = filter_var($comentarios, FILTER_SANITIZE_STRING);
$mensajeCompleto ="Mensaje de: " .  $nombre . "\n Correo electrónico: " . $correo . "\n Telefono: " . $telefono . "\n Comentarios:" .  $comentarios;

mail($destino,$asunto,$mensajeCompleto);

echo "<script>setTimeout(\"location.href='index.html'\", 1000)</script>";

?>


