<?php
include("ver conex.php");

$sql = "SELECT Id, nombre, estado, cantidad, tipodepago FROM viajes";
$result = $conexion->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] == "update") {
        $Id = $_POST['Id'];
        $nombre = $_POST['nombre'];
        $estado = $_POST['estado'];
        $cantidad = $_POST['cantidad'];
        $tipodepago = $_POST['tipodepago'];

        $Id = $conexion->real_escape_string($Id);
        $nombre = $conexion->real_escape_string($nombre);
        $estado = $conexion->real_escape_string($estado);
        $cantidad = $conexion->real_escape_string($cantidad);
        $tipodepago = $conexion->real_escape_string($tipodepago);

        $update_sql = "UPDATE viajes SET nombre='$nombre', estado='$estado', cantidad='$cantidad', tipodepago='$tipodepago' WHERE Id='$Id'";

        if ($conexion->query($update_sql) === TRUE) {
            echo "Registro actualizado correctamente";
        } else {
            echo "Error actualizando el registro: " . $conexion->error;
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
            <h1><blockquote>MODIFICACIONES DE VIAJES</blockquote></h1>
            <nav class="navbar">
                <ul>
                    <li><a href="admin.php" target="_self">Regresar</a></li>    
                </ul>
            </nav>
        </div>
        <div class="contenido">
            <table>
                <tr>
                    <th>Id del viaje</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Cantidad de personas que viajan</th>
                    <th>Tipo de pago</th>
                    <th>Modificación de viajes</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["Id"] . "</td>
                                <td>" . $row["nombre"] . "</td>
                                <td>" . $row["estado"] . "</td>
                                <td>" . $row["cantidad"] . "</td>
                                <td>" . $row["tipodepago"] . "</td>
                                <td>
                                    <form method='post' action='" . $_SERVER['PHP_SELF'] . "'>
                                        <input type='hidden' name='Id' value='" . $row["Id"] . "'>
                                        <input type='hidden' name='action' value='update'>
                                        <input type='text' name='nombre' value='" . $row["nombre"] . "' required>
                                        <input type='text' name='estado' value='" . $row["estado"] . "' required>
                                        <input type='text' name='cantidad' value='" . $row["cantidad"] . "' required>
                                        <br/>
                                        <input type='text' name='tipodepago' value='" . $row["tipodepago"] . "' required>
                                        <input type='submit' value='Actualizar'>
                                    </form>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No se encontraron resultados</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
