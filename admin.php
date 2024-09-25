<!DOCTYPE html>
<html lang="es">
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
            <h1><blockquote>USUARIO ADMINISTRADOR</blockquote></h1>
            <nav class="navbar">
                <ul>
                    <li><a href="spau.php" target="_self">Usuarios</a></li>
                    <li><a href="" target="_self"></a></li>
                    <li><a href="Reporte.php" target="_self">Reportes</a></li>
                    <li><a href="" target="_self"></a></li>
                    <li><a href="index.html" target="_self">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
        <div class="contenido">
            <form name="registradatos" method="POST" action="Pav.php" id="registradatos">
                <table id="tablareg">
                    <tr>
                        <td class="left">
                            <label for="Id">Id del viaje</label>
                        </td>
                        <td class="right">
                            <input type="text" name="Id" maxlength="10" size="5" Id="Id" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="left">
                            <label for="nombre">Nombre del cliente</label>
                        </td>
                        <td class="right">
                            <input type="text" name="nombre" maxlength="50" size="30" id="nombre" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="left">
                            <label for="estado">Seleccione un Estado</label>
                        </td>
                        <td class="right">
                            <select name="estado" size="1" id="estado" required>
                                <option>Seleccione el estado</option>
                                <option value="CHIHUAHUA">Chihuahua</option>
                                <option value="DURANGO">Durango</option>
                                <option value="JALISCO">Jalisco</option>
                                <option value="NUEVOLEON">Nuevo Leon</option>
                                <option value="MEXICO">Mexico</option>
                                <option value="QUERETARO">Queretaro</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="left">
                            <label for="cantidad">Cantidad de personas</label>
                        </td>
                        <td class="right">
                            <input type="text" name="cantidad" maxlength="10" size="5" id="cantidad" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="left">
                            <label for="tipodepago">Tipo de Pago</label>
                        </td>
                        <td class="right">
                            <input type="radio" name="tipodepago" value="efectivo" checked>Efectivo
                            <br>
                            <input type="radio" name="tipodepago" value="tcredito">Tarjeta de Credito
                            <br>
                            <input type="radio" name="tipodepago" value="cheque">Transferencia Electrónica
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center">
                            <input type="submit" value="Registro de viaje completo">
                            <input type="reset" value="Borrar formulario" id="resetButton">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center">
                            <button id="BotonElimina" class="float-left submit-button">Eliminar viajes</button>
                            <script type="text/javascript">
                                document.getElementById("BotonElimina").onclick = function () {
                                    location.href = "MEliminavia.php";
                                };
                            </script>
                            <button id="BotonActualiza" class="float-left submit-button">Modificar viajes</button>
                            <script type="text/javascript">
                                document.getElementById("BotonActualiza").onclick = function () {
                                    location.href = "Modviaj.php";
                                };
                            </script>
                        </td>
                    </tr>
                </table>
            </form>
            <div id="mensaje" style="display: none;"></div>
        </div>
    </div>
</div>

<script>
document.getElementById('registradatos').onsubmit = async function(event) {
    event.preventDefault();

    const form = event.target;
    const data = new FormData(form);

    const response = await fetch('Pav.php', {
        method: 'POST',
        body: data
    });

    const result = await response.text();
    const mensaje = document.getElementById('mensaje');
    mensaje.style.display = 'block';
    mensaje.innerHTML = result;
};

document.getElementById('resetButton').onclick = function() {
    const mensaje = document.getElementById('mensaje');
    mensaje.style.display = 'none';
    mensaje.innerHTML = '';
};
</script>
</body>
</html>
