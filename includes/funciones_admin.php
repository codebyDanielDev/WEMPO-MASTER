<?php
function loginadmin($email, $password) {
  global $conexion;

  $query = "SELECT * FROM administradores WHERE correo = '$email'";

  $resultado = mysqli_query($conexion, $query);

  if (mysqli_num_rows($resultado) > 0) {
      $usuario = mysqli_fetch_assoc($resultado);
      $stored_password = $usuario['contraseña'];

      if ($password == $stored_password) {
          $_SESSION['id_usuario'] = $usuario['id'];
          $_SESSION['admin_logged_in'] = true; // Agrega esta línea
 
          return true;
      } else {
          return false;
      }
  } else {
      return false;
  }
}
function agregarCategoria($nombre, $descripcion) {
    include '../db_conectar/conexion.php';
    global $conexion;
    $stmt = $conexion->prepare("INSERT INTO categorias (nombre, descripcion) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $descripcion);
    $stmt->execute();
    $stmt->close();
  }
  function borrarCategoria($id) {
    include '../db_conectar/conexion.php';
    global $conexion;
  
    $consulta = "DELETE FROM categorias WHERE id = ?";
    $sentencia = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($sentencia, "i", $id);
  
    if (!mysqli_stmt_execute($sentencia)) {
      die('Error en la consulta: ' . mysqli_error($conexion));
    }
  
    mysqli_stmt_close($sentencia);
    mysqli_close($conexion);
  
    return true;
  }
  
  function obtenerTodasCategorias() {
    include '../db_conectar/conexion.php';
    global $conexion;
  
    $consulta = "SELECT * FROM categorias ORDER BY nombre ASC";
  
    $resultado = mysqli_query($conexion, $consulta);
  
    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }
  
    $categorias = array();
    while ($categoria = mysqli_fetch_assoc($resultado)) {
        $categorias[] = $categoria;
    }
  
    return $categorias;
  }
  
  function agregar_producto($nombre, $descripcion, $precio, $modelo, $marca, $stock, $imagen, $categoria_id) {
    // Conectar a la base de datos
    include '../db_conectar/conexion.php';

    // Escapar los valores para evitar inyecciones SQL
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $descripcion = mysqli_real_escape_string($conexion, $descripcion);
    $precio = mysqli_real_escape_string($conexion, $precio);
    $modelo = mysqli_real_escape_string($conexion, $modelo);
    $marca = mysqli_real_escape_string($conexion, $marca);
    $stock = mysqli_real_escape_string($conexion, $stock);
    $categoria_id = mysqli_real_escape_string($conexion, $categoria_id);

    // Guardar la imagen en el servidor y obtener la ruta de la imagen
    $ruta_imagen = '';
    if ($imagen['error'] === UPLOAD_ERR_OK) {
        $nombre_imagen = uniqid() . '_' . $imagen['name'];
        $ruta_imagen = 'imagenes/productos/' . $nombre_imagen;
        $ruta_absoluta = 'C:\xampp\htdocs\NEW_sen_proyect_ventas\\' . $ruta_imagen;
        move_uploaded_file($imagen['tmp_name'], $ruta_absoluta);
    }

    // Insertar el producto en la base de datos
    $consulta = "INSERT INTO productos (nombre, descripcion, precio, modelo, marca, stock, imagen, categoria_id) VALUES ('$nombre', '$descripcion', '$precio', '$modelo', '$marca', '$stock', '$ruta_imagen', '$categoria_id')";

    if (mysqli_query($conexion, $consulta)) {
        // Si la consulta fue exitosa, devolver true
        return true;
    } else {
        // Si hubo un error en la consulta, mostrar el mensaje de error y devolver false
        echo "Error al agregar producto: " . mysqli_error($conexion);
        return false;
    }
}
function buscarProductoT($nombre, $precioMin, $precioMax, $categoria_id) {

    global $conexion;

    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $precioMin = mysqli_real_escape_string($conexion, $precioMin);
    $precioMax = mysqli_real_escape_string($conexion, $precioMax);
    $categoria_id = mysqli_real_escape_string($conexion, $categoria_id);

    $consulta = "SELECT productos.id, productos.nombre, productos.descripcion, productos.precio, productos.imagen, categorias.nombre AS categoria_nombre FROM productos JOIN categorias ON productos.categoria_id = categorias.id WHERE productos.nombre LIKE '%$nombre%'";

    if (!empty($precioMin)) {
        $consulta .= " AND productos.precio >= $precioMin";
    }

    if (!empty($precioMax)) {
        $consulta .= " AND productos.precio <= $precioMax";
    }

    if (!empty($categoria_id)) {
        $consulta .= " AND productos.categoria_id = $categoria_id";
    }

    $consulta .= " ORDER BY productos.precio ASC";

    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }

    $productos = array();
    while ($producto = mysqli_fetch_assoc($resultado)) {
        // Verificar si la imagen está vacía
        if (empty($producto['imagen'])) {
            $producto['imagen'] = null;
        }
        $productos[] = $producto;
    }

    return $productos;
}

function obtenerTodosProductos() {
    global $conexion;
  
    $consulta = "SELECT productos.id, productos.nombre, productos.descripcion, productos.precio, productos.imagen, categorias.nombre AS categoria_nombre FROM productos JOIN categorias ON productos.categoria_id = categorias.id ORDER BY productos.nombre ASC";
  
    $resultado = mysqli_query($conexion, $consulta);
  
    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }
  
    $productos = array();
    while ($producto = mysqli_fetch_assoc($resultado)) {
        $productos[] = $producto;
    }
  
    return $productos;
}

  