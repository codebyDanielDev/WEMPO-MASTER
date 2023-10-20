<?php
include "../db_conectar/conexion.php";
include "../includes/funciones_admin.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];

  if (borrarCategoria($id)) {
    echo json_encode(['status' => 'success', 'message' => 'Categoría borrada exitosamente.']);
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Error al borrar la categoría.']);
  }
}
?>
