<?php
session_start();
include "../db_conectar/conexion.php";
include "../includes/funciones_usuarios.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_SESSION['id_usuario'];
    $usuario = obtenerUsuarioPorId($id_usuario);

    // Verificar la contraseña actual
    $password_actual = $_POST['password_actual'];
    if (!password_verify($password_actual, $usuario['contraseña'])) {
        echo json_encode(['status' => 'success', 'message' => 'Contraseña actual incorrecta']);
    }

    $nueva_password = $_POST['nueva_password'];
    $confirmar_password = $_POST['confirmar_password'];

    // Comprobar si se ingresó una nueva contraseña y si coincide con la confirmación
    if (!empty($nueva_password) && $nueva_password !== $confirmar_password) {
        echo json_encode(['status' => 'success', 'message' => 'Las contraseñas nuevas no coinciden']);
    }
    // Si se ingresó una nueva contraseña, actualizarla
    if (!empty($nueva_password)) {
        $hashed_password = password_hash($nueva_password, PASSWORD_DEFAULT);
    } else {
        $hashed_password = $usuario['contraseña'];
    }

    // Actualizar la información del usuario en la base de datos
    cambiarContra($id_usuario, $hashed_password);

    echo json_encode(['status' => 'success', 'message' => 'Contraseña actualizada exitosamente.']);


}