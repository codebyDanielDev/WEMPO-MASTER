<?php
    session_start();

    include "../db_conectar/conexion.php";
    include "../includes/funciones_usuarios.php";


    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        if (loginUsuario($email, $password)) {
            echo json_encode(['status' => 'success', 'message' => 'Inicio de sesión exitoso. Volver a la pagina principal.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Contraseña o usuario incorrecta.']);
            exit;
        }
    }
    ?>
  



