<?php 
include "../db_conectar/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    // Obtener el ID del producto a eliminar
    $id = mysqli_real_escape_string($conexion, $_POST['id']);

    // Eliminar el producto de la base de datos
    $consulta = "DELETE FROM productos WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        // Refrescar la página
        header('Location: ../PanelAdmin.php');
   
        exit;
    } else {
        // Si ocurre un error, mostrar un mensaje de error
        echo 'Error al eliminar el producto';
    }
    
}
