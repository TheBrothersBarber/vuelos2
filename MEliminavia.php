<?php
include("ver conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id = $_POST["Id"];
    $nombre = $_POST["nombre"];
    $estado = $_POST["estado"];
    $cantidad = $_POST["cantidad"];
    $tipodepago = $_POST["tipodepago"];

    $Id = $conexion->real_escape_string($Id);
    $nombre = $conexion->real_escape_string($nombre);
    $estado = $conexion->real_escape_string($estado);
    $cantidad = $conexion->real_escape_string($cantidad);
    $tipodepago = $conexion->real_escape_string($tipodepago);

    if (!filter_var($Id, FILTER_VALIDATE_INT) || $cantidad < 1) {
        die("Datos no válidos");
    }

    $sql = "DELETE FROM viajes WHERE Id='$Id' AND Nombre='$nombre' AND estado='$estado' AND cantidad='$cantidad' AND tipodepago='$tipodepago'";

    if ($conexion->query($sql) === TRUE) {
        echo "<p>Registro eliminado correctamente</p>";
    } else {
        echo "<p>Error eliminando el registro: " . $conexion->error . "</p>";
    }
}

$sql = "SELECT * FROM viajes";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Registro</title>
    <link rel="stylesheet" href="css/A.css">
</head>
<body>
    <div class="contenedor">
        <div class="content">
            <div class="header">
                <h1><blockquote>ELIMINACION DE VIAJES</blockquote></h1>
                <nav class="navbar">
                    <ul>
                        <li><a href="admin.php" target="_self">Regresar</a></li>    
                    </ul>
                </nav>
            </div>
            <div class="contenido">
               <h2>Registros Disponibles</h2>
               <table border="1">
                   <thead>
                       <tr>
                           <th>Id del viaje</th>
                           <th>Nombre</th>
                           <th>Estado</th>
                           <th>Personas que viajan</th>
                           <th>Tipo de Pago</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php
                       if ($result->num_rows > 0) {
                           while ($row = $result->fetch_assoc()) {
                               echo "<tr>";
                               echo "<td>" . htmlspecialchars($row['Id']) . "</td>";
                               echo "<td>" . htmlspecialchars($row['Nombre']) . "</td>";
                               echo "<td>" . htmlspecialchars($row['estado']) . "</td>";
                               echo "<td>" . htmlspecialchars($row['cantidad']) . "</td>";
                               echo "<td>" . htmlspecialchars($row['tipodepago']) . "</td>";
                               echo "</tr>";
                           }
                       } else {
                           echo "<tr><td colspan='5'>No hay registros disponibles.</td></tr>";
                       }
                       ?>
                   </tbody>
               </table>

               <h2>Eliminar viaje</h2>
               <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <label for="Id">Id del viaje:</label>
                  <input type="text" name="Id" required><br><br>
                  <label for="nombre">Nombre del cliente:</label>
                  <input type="text" name="nombre" required><br><br>
                  <label for="estado">Seleccione un Estado:</label>
                  <select name="estado" required>
                      <option value="CHIHUAHUA">Chihuahua</option>
                      <option value="DURANGO">Durango</option>
                      <option value="JALISCO">Jalisco</option>
                      <option value="NUEVOLEON">Nuevo León</option>
                      <option value="MEXICO">México</option>
                      <option value="QUERETARO">Querétaro</option>
                  </select><br><br>
                  <label for="cantidad">Cantidad de personas:</label>
                  <input type="text" name="cantidad" required><br><br>
                  <label for="tipodepago">Tipo de Pago:</label><br>
                  <input type="radio" name="tipodepago" value="efectivo" checked>Efectivo<br>
                  <input type="radio" name="tipodepago" value="tcredito">Tarjeta de Crédito<br>
                  <input type="radio" name="tipodepago" value="transferencia">Transferencia Electrónica<br><br>
                  <input type="submit" value="Eliminar">
               </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$conexion->close();
?>
