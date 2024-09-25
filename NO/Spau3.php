<?php
include("ver conex.php");


$sql = "SELECT Id, Nombre, Usuario, Contraseña, Id_cargo FROM usuarios";
$result = $conexion->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] == "add") {
        $Id = $_POST["Id"];
        $Nombre = $_POST["Nombre"];
        $usuario = $_POST["Usuario"];
        $contraseña = $_POST["Contraseña"];
        $Id_cargo = $_POST["Id_cargo"];


        $insert_sql = "INSERT INTO usuarios (Id, Nombre, Usuario, Contraseña, Id_cargo) VALUES ('$Id', '$Nombre', '$usuario', '$contraseña', '$Id_cargo')";

        if ($conexion->query($insert_sql) === TRUE) {
            echo "Nuevo usuario agregado correctamente";
        } else {
            echo "Error agregando el nuevo usuario: " . $conexion->error;
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
            <h1><blockquote>AGREGAR SOLO USUARIOS TIPO CLIENTE</blockquote></h1>
            <nav class="navbar">
                <ul>
                   <li><a href="agente.php" target="_self">Regresar</a></li>
                   <li><a href="" target="_self"></a></li>    
                </ul>
            </nav>
        </div>
        <div class="contenido">
            <h2>Agregar Nuevo Usuario</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <input type='hidden' name='action' value='add'>
              Id: <input type="text" name="Id" required><br><br>
              Nombre: <input type="text" name="Nombre" required><br><br>
              Nombre de usuario: <input type="text" name="Usuario" required><br><br>
              Contraseña: <input type="password" name="Contraseña" required><br><br>
              Id tipo de cargo: <input type="text" name="Id_cargo" required><br><br>
              <input type="submit" value="Agregar">
            </form>
            <h2>Usuarios Registrados</h2>
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Id de cargo</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Id"] . "</td><td>" . $row["Nombre"] . "</td><td>" . $row["Usuario"] . "</td><td>" . $row["Id_cargo"] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay usuarios registrados</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>