<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "sistemafares";

$conxion = new mysqli($server, $username, $password, $database);
if ($conxion->connect_error) {
    die("Conexión fallida: " . $conxion->connect_error);
}

$Codigo = $_POST['Codigo'];
$Nom_producto = $_POST['Nom_producto'];
$Costo = $_POST['Costo'];
$Porc_venta = $_POST['Porc_ventaje'];
$Precio_venta = $_POST['Precio_venta'];
$Stock = $_POST['Stock'];
$Fecha = $_POST['Fecha'];

$imagen = $_FILES['imagen']['name'];
$target_dir = "imagenes/";
$target_file = $target_dir . basename($imagen);

if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
} else {
    echo "Error al subir la imagen.";
    exit();
}

$stmt = $conxion->prepare("INSERT INTO inventario 
    (Codigo, Nom_producto, Costo, Porc_venta, Precio_venta, imagen, Stock, Fecha)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssddssds", $Codigo, $Nom_producto, $Costo, $Porc_venta, $Precio_venta, $imagen, $Stock, $Fecha);

if ($stmt->execute()) {
    echo "Producto guardado correctamente ✅";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conxion->close();
?>