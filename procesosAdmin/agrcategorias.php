<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: loginadmin.php");
    exit;
}
include "../db_conectar/conexion.php";
include "../includes/funciones_admin.php";
header('Content-Type: application/json');
// Si se envió el formulario, agregar el producto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];

  if (agregarCategoria($nombre, $descripcion)) {
    // Si se agregó el producto correctamente, redirigir a la página de productos
    echo json_encode(['status' => 'success', 'message' => 'Categoría  no agregada.']);
    exit;
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Categoría agregada exitosamente.']);
    exit;   
    // Si hubo un error al agregar el producto, mostrar un mensaje de error

  }
}

?>