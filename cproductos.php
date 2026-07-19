<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inventario Fares</title>

<script>
function calcularPrecio() {
    const costo = parseFloat(document.getElementById('Costo').value) || 0;
    const porcentaje = parseFloat(document.getElementById('Porc_venta').value) || 0;
    const precio = costo + (costo * porcentaje / 100);
    document.getElementById('Precio_venta').value = precio.toFixed(2);
}
</script>

</head>

<body>

<h1>Inventario - Ediciones Fares</h1>

<form action="guardar.php" method="post" enctype="multipart/form-data">

<label>Codigo:</label><br>
<input type="number" name="Codigo" id="Codigo" required><br><br>

<label>Producto:</label><br>
<input type="text" name="Nom_producto" id="Nom_producto" required><br><br>

<label>Costo:</label><br>
<input type="number" step="0.01" name="Costo" id="Costo" oninput="calcularPrecio()" required><br><br>

<label>Porcentaje de venta:</label><br>
<input type="number" name="Porc_venta" id="Porc_venta" oninput="calcularPrecio()" required><br><br>

<label>Precio de venta:</label><br>
<input type="number" step="0.01" name="Precio_venta" id="Precio_venta" readonly><br><br>

<label>Stock:</label><br>
<input type="number" name="Stock" id="Stock" required><br><br>

<label>Imagen:</label><br>
<input type="file" name="imagen" required><br><br>

<label>Fecha:</label><br>
<input type="date" name="Fecha" required><br><br>

<input type="submit" value="Guardar producto">

</form>

</body>
</html>