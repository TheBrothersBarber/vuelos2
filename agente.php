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
            <h1><blockquote>USUARIO DE AGENTE</blockquote></h1>
            <nav class="navbar">
                <ul>
                    <li><a href="" target="_self"></a></li>
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
                            <input type="text" name="Id" maxlength="10" size="5" id="Id" value="" required>
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
                                <option value="">Seleccione el estado</option>
                                <option value="CHIHUAHUA">Chihuahua</option>
                                <option value="DURANGO">Durango</option>
                                <option value="JALISCO">Jalisco</option>
                                <option value="NUEVOLEON">Nuevo León</option>
                                <option value="MEXICO">México</option>
                                <option value="QUERETARO">Querétaro</option>
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
                            <input type="radio" name="tipodepago" value="efectivo" checked> Efectivo
                            <br>
                            <input type="radio" name="tipodepago" value="tcredito"> Tarjeta de Crédito
                            <br>
                            <input type="radio" name="tipodepago" value="cheque"> Transferencia Electrónica
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
                            <button type="button" id="BotonElimina" class="submit-button">Eliminar viajes</button>
                            <button type="button" id="BotonActualiza" class="submit-button">Modificar viajes</button>
                        </td>
                    </tr>
                </table>
            </form>
            <div id="mensaje" style="display: none; color: red; text-align: center;"></div>
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

document.getElementById('BotonElimina').onclick = function() {
  mensaje.style.display = 'block';
};

document.getElementById('BotonActualiza').onclick = function() {
  mensaje.style.display = 'block';
};
</script>
</body>
</html>
