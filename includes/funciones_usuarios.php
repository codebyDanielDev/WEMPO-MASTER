<?php
//Funciones para el login de usuarios y registro de usuarios en la base de datos 
//Funcion para agregar un usuario a la base de datos

function agregarUsuario($dni, $nombre, $email, $password) {
    global $conexion;

    // Generar un hash de la contraseña para almacenarla de forma segura
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta SQL para insertar el nuevo usuario
    $query = "INSERT INTO usuarios (dni, nombre, correo, contraseña) VALUES ('$dni', '$nombre', '$email', '$hashed_password')";

    // Ejecutar la consulta y verificar si fue exitosa
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
}


//Funcion para verificar si el usuario existe en la base de datos e iniciar sesion
function loginUsuario($email, $password) {
    global $conexion;

    $query = "SELECT * FROM usuarios WHERE correo = '$email'";

    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        $hashed_password = $usuario['contraseña'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['id_usuario'] = $usuario['id'];
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function obtenerUsuarioPorId($id_usuario) {
    global $conexion;

    $query = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        return mysqli_fetch_assoc($resultado);
    } else {
        return false;
    }
}
function actualizarUsuario($id_usuario, $nombre, $apellido_paterno, $apellido_materno, $email, $dni, $fecha_nacimiento, $direccion, $ciudad, $imagen) {
    global $conexion;

    // Si la fecha de nacimiento está vacía, establece su valor en NULL
    if (empty($fecha_nacimiento)) {
        $fecha_nacimiento = 'NULL';
    } else {
        // Asegúrate de que la fecha esté entre comillas simples para que sea tratada como una cadena en la consulta SQL
        $fecha_nacimiento = "'$fecha_nacimiento'";
    }

    $actualizar_imagen = false;

    if (!empty($imagen) && $imagen['error'] === UPLOAD_ERR_OK) {
        // Obtener la extensión del archivo de imagen
        $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
        // Generar un nombre único para el archivo de imagen
        $nombre_archivo = uniqid() . '.' . $extension;
        // Ruta relativa para guardar en la base de datos
        $ruta_relativa = 'imagenes/perfil/' . $nombre_archivo;
        // Ruta absoluta para mover el archivo
        $ruta_absoluta = 'C:/xampp/htdocs/NEW_sen_proyect_ventas/' . $ruta_relativa;
        // Mover el archivo de imagen a la carpeta de imágenes
        move_uploaded_file($imagen['tmp_name'], $ruta_absoluta);
        $actualizar_imagen = true;
    }

    // Si se proporciona una imagen nueva, actualiza el campo imagen en la consulta
    if ($actualizar_imagen) {
        $query = "UPDATE usuarios SET nombre = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', correo = '$email', dni = '$dni', fecha_nacimiento = $fecha_nacimiento, direccion = '$direccion', ciudad = '$ciudad', imagen = '$ruta_relativa' WHERE id = $id_usuario";
    } else {
        $query = "UPDATE usuarios SET nombre = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', correo = '$email', dni = '$dni', fecha_nacimiento = $fecha_nacimiento, direccion = '$direccion', ciudad = '$ciudad' WHERE id = $id_usuario";
    }

    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        echo "Error al actualizar el usuario: " . mysqli_error($conexion);
        return false;
    }
}
// Función para cambiar la contraseña de un usuario, primero comprobar la contraseña anterior y despues hacer la nueva contraseaña
function cambiarContra($id_usuario, $hashed_password) {
    global $conexion;



    $query = "UPDATE usuarios SET  contraseña = '$hashed_password' WHERE id = $id_usuario";

    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        echo "Error al actualizar el usuario: " . mysqli_error($conexion);
        return false;
    }
}
