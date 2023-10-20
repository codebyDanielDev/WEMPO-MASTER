<?php
session_start();
include '../db_conectar/conexion.php';
include "../includes/funciones_admin.php";

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: login_admin.php");
    exit;
}

header('Content-Type: application/json');
// Si se envió el formulario, agregar el producto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria_id'];

    $imagen = $_FILES['imagen'];

    if (agregar_producto($nombre, $descripcion, $precio, $modelo, $marca, $stock, $imagen, $categoria)) {
        // Si se agregó el producto correctamente, redirigir a la página de productos
        echo json_encode(['status' => 'success', 'message' => 'Producto agregado correctamente.']);

    } else {
        echo json_encode(['status' => 'error', 'message' => 'Producto no agregado.']);
        exit;
    }
}

?>
