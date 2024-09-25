<?php
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","rol");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contrasena='$contrasena'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['Id_cargo']==1){ //administrador
    header("location:admin.php");

}else
if($filas['Id_cargo']==2){ //Gerente 
header("location:gerente.php");
}else
if($filas['Id_cargo']==3){ //Agente
    header("location:agente.php");
}else
if($filas['Id_cargo']==4){ //cliente
    header("location:cliente.php");
}

mysqli_free_result($resultado);
mysqli_close($conexion);
