<?php
$servidor = "127.0.0.1:3307";
$usuario = "root";
$pass = "";
$based = "rol";

$conexion = mysqli_connect($servidor, $usuario, $pass, $based);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_viaje = $_POST['id_viaje'];
    $nombre = $_POST['nombre'];
    $queja = $_POST['queja'];

    $id_viaje = mysqli_real_escape_string($conexion, $id_viaje);
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $queja = mysqli_real_escape_string($conexion, $queja);

    if (empty($id_viaje) || empty($nombre) || empty($queja)) {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        
        $sql = "INSERT INTO quejas (id_viaje, nombre, queja) VALUES ('$id_viaje', '$nombre', '$queja')";

        if (mysqli_query($conexion, $sql)) {
            $mensaje = "Queja enviada correctamente.";
        } else {
            $mensaje = "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }


        $_POST = array();
    }

    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRIPLAN</title>
    <link rel="stylesheet" href="css/D.css">
</head>
<body>
<div class="contenedor">
    <div class="content">
        <div class="header">
            <h1><blockquote>USUARIO CLIENTE</blockquote></h1>
            <nav class="navbar">
                <ul>
                    <li><a href="index.html" target="_self">Cerrar sesi&oacute;n</a></li>
                </ul>
            </nav>
        </div>
        <div class="contenido">
            <h1>BIENVENIDO!!!</h1>
            <h2>REPORTA CUALQUIER TIPO DE PROBLEMA</h2>

            <?php if ($mensaje): ?>
                <p><?php echo htmlspecialchars($mensaje); ?></p>
            <?php endif; ?>

            <form method="POST" action="">
                <label for="id_viaje">Id del viaje:</label>
                <input type="text" name="id_viaje" id="id_viaje" value="<?php echo isset($_POST['id_viaje']) ? htmlspecialchars($_POST['id_viaje']) : ''; ?>" required><br><br>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>" required><br><br>
                <label for="queja">Escribe tu problema:</label><br>
                <textarea name="queja" id="queja" rows="4" cols="50" required><?php echo isset($_POST['queja']) ? htmlspecialchars($_POST['queja']) : ''; ?></textarea><br><br>
                <input type="submit" value="Enviar Queja">
            </form>
        </div>
    </div>
</div>
</body>
</html>

