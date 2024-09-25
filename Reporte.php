<?php
$servidor = "127.0.0.1:3307";
$usuario = "root";
$pass = "";
$based = "rol";

$conexion = mysqli_connect($servidor, $usuario, $pass, $based);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['delete_id'])) {
    $delete_id = mysqli_real_escape_string($conexion, $_POST['delete_id']);
    $sql = "DELETE FROM quejas WHERE id_viaje='$delete_id'";

    if (mysqli_query($conexion, $sql)) {
        echo "<p>Queja eliminada correctamente.</p>";
    } else {
        echo "Error al eliminar la queja: " . mysqli_error($conexion);
    }
}

$sql = "SELECT id_viaje, nombre, queja FROM quejas";
$result = mysqli_query($conexion, $sql);

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Quejas</title>
    <link rel="stylesheet" href="css/A.css">
</head>
<body>
<div class="contenedor">
    <div class="content">
        <div class="header">
            <h1><blockquote>LISTA DE QUEJAS</blockquote></h1>
            <nav class="navbar">
                <ul>
                    <li><a href="admin.php" target="_self">Regresar</a></li>
                </ul>
            </nav>
        </div>
        <div class="contenido">
            <h1>Quejas Registradas</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID del Viaje</th>
                        <th>Nombre</th>
                        <th>Queja</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr id='row-{$row['id_viaje']}'>
                                    <td>{$row['id_viaje']}</td>
                                    <td>{$row['nombre']}</td>
                                    <td>{$row['queja']}</td>
                                    <td>
                                        <form method='POST' style='display:inline;'>
                                            <input type='hidden' name='delete_id' value='{$row['id_viaje']}'>
                                            <button type='submit' onclick=\"return confirm('¿Estás seguro de que quieres eliminar esta queja?');\">Eliminar</button>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No hay quejas registradas.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>