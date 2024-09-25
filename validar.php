<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("127.0.0.1:3307","root","","rol");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
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
