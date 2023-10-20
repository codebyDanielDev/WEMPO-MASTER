<?php
include "../db_conectar/conexion.php";
include "../includes/funciones_usuarios.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validar que las contraseñas coincidan
    if ($password != $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'Las contraseñas no coinciden.']);
        exit;
    }

    // Agregar el nuevo usuario a la base de datos
    if (agregarUsuario($dni, $nombre, $email, $password)) {
        echo json_encode(['status' => 'success', 'message' => 'Usuario registrado exitosamente, ahora inicie sesión.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al registrar el usuario.']);
    }
}
?>

