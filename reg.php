<?php
include("ver conex.php");

$sql = "SELECT Id, Nombre, Usuario, Contrasena, Id_cargo FROM usuarios";
$result = $conexion->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] == "update") {
        $Id = $_POST["Id"];
        $Nombre = $_POST["Nombre"];
        $usuario = $_POST["Usuario"];
        $contrasena = $_POST["Contrasena"];
        $Id_cargo = $_POST["Id_cargo"];

        $update_sql = "UPDATE usuarios SET Id_cargo='$Id_cargo', Nombre='$Nombre', Usuario='$usuario', Contrasena='$contrasena' WHERE Id='$Id'";

        if ($conexion->query($update_sql) === TRUE) {
            echo "Registro actualizado correctamente";
        } else {
            echo "Error actualizando el registro: " . $conexion->error;
        }
    } elseif (isset($_POST["action"]) && $_POST["action"] == "add") {
        $Id = $_POST["Id"];
        $Nombre = $_POST["Nombre"];
        $usuario = $_POST["Usuario"];
        $contrasena = $_POST["Contrasena"];
        $Id_cargo = $_POST["Id_cargo"];

        $insert_sql = "INSERT INTO usuarios (Id, Nombre, Usuario, Contrasena, Id_cargo) VALUES ('$Id', '$Nombre', '$usuario', '$contrasena', '$Id_cargo')";

        if ($conexion->query($insert_sql) === TRUE) {
            echo "Nuevo usuario agregado correctamente";
        } else {
            echo "Error agregando el nuevo usuario: " . $conexion->error;
        }
    } elseif (isset($_POST["action"]) && $_POST["action"] == "delete") {
        $Id = $_POST["Id"];

        $delete_sql = "DELETE FROM usuarios WHERE Id='$Id'";

        if ($conexion->query($delete_sql) === TRUE) {
            echo "Usuario eliminado correctamente";
        } else {
            echo "Error eliminando el usuario: " . $conexion->error;
        }
    }

    $result = $conexion->query($sql);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Usuarios y Modificación</title>
    <link rel="stylesheet" href="css/A.css">
</head>
<body>
<div class="contenedor">
    <div class="content">
        <div class="header">
            <h1><blockquote>Registro</blockquote></h1>
            <nav class="navbar">
                <ul>
                    <li><a href="index.html" target="_self">Regresar</a></li>    
                </ul>
            </nav>
        </div>
        <div class="contenido">

            <h2>Agregar Nuevo Usuario</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h4>Id de cargo disponible 3</h4>
                <input type='hidden' name='action' value='add'>
                Id: <input type="text" name="Id" required><br><br>
                Nombre: <input type="text" name="Nombre" required><br><br>
                Nombre de usuario: <input type="text" name="Usuario" required><br><br>
                Contraseña: <input type="password" name="Contrasena" required><br><br>
                Id tipo de cargo: <input type="text" name="Id_cargo" required><br><br>
                <input type="submit" value="Agregar">
            </form>
        </div>
    </div>
</div>
</body>
</html>