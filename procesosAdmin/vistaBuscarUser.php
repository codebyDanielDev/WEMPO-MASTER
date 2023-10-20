<?php
// Obtener el valor del campo de búsqueda
$busqueda = isset($_POST['busqueda']) ? $_POST['busqueda'] : '';

// Realizar la búsqueda en la base de datos utilizando el valor del campo de búsqueda
$usuarios = buscarUsuarios($busqueda);

// Mostrar los resultados de la búsqueda en la página
foreach ($usuarios as $usuario) {
  echo '<p>' . htmlspecialchars($usuario['nombre']) . '</p>';
  echo '<p>' . htmlspecialchars($usuario['correo_electronico']) . '</p>';
  echo '<p>' . htmlspecialchars($usuario['dni']) . '</p>';
}
?>
