<?php
include("ver conex.php");
$Id = $_POST['Id'];
$nombre = $_POST['nombre'];
$estado = $_POST['estado'];
$cantidad = $_POST['cantidad'];
$tipodepago = $_POST['tipodepago'];

if($estado == 'Seleccione el estado'){
    die('Debe seleccionar un estado');
}
if($cantidad < 1){
    die('La cantidad debe ser mayor a 0');
}

$consulta = "INSERT INTO viajes(Id, Nombre, estado, cantidad, tipodepago)
VALUES('$Id', '$nombre', '$estado', $cantidad, '$tipodepago')";

$run = mysqli_query($conexion, $consulta);

if (!$run) {
    die('Error en la consulta: ' . mysqli_error($conexion));
}

mysqli_close($conexion);

echo 'Registro agregado exitosamente';
?>

