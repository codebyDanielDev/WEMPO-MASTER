<?php
include "../db_conectar/conexion.php";
include "../includes/funciones_admin.php";

$categorias = obtenerTodasCategorias();

if ($categorias) {
  echo json_encode($categorias);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Error al obtener la lista de categorías.']);
}
?>

