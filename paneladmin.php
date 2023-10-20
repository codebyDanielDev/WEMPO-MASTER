<?php
session_start();
include "db_conectar/conexion.php";
include "includes/funciones_admin.php";

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
  header("Location: loginadmin.php");
  exit;
}
$admin_id = $_SESSION['id_usuario'];
$query = "SELECT * FROM administradores WHERE id = '$admin_id'";
$resultado = mysqli_query($conexion, $query);
$admin_logged_in = mysqli_fetch_assoc($resultado); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/adminindex.css" />
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <nav class="sidebar close">
    <header>
      <div class="image-text">
        <span class="image"><img src="imagenes/img/log.png" /></span>

        <div class="text logo-text">
          <span class="name">aca debe ir nombre del admin</span>
          <span class="profession">ADMIN</span>
        </div>
      </div>
      <i class="bx bx-chevron-right toggle"></i>
    </header>

    <div class="menu-bar">
      <div class="menu">
        <li class="search-box">
          <i class="bx bx-search icon"></i>
          <input type="text" placeholder="Buscar" />
        </li>

        <ul class="menu-links">
          <li class="nav-link">
            <a href="#perfil">
              <i class="bx bx-user icon"></i>
              <span class="text nav-text">Perfil</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#agregar-producto">
              <i class="bx bx-plus icon"></i>
              <span class="text nav-text">Añadir</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#buscarUserProduct">
              <i class="bx bx-search icon"></i>
              <span class="text nav-text">Buscar USER Productos</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#ver-productos">
              <i class="bx bx-show icon"></i>
              <span class="text nav-text">Ver-productosUSER</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#A-agradmin">
              <i class="bx bx-plus icon"></i>
              <span class="text nav-text">añadir admins</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#A-soporte">
              <i class="bx bx-support icon"></i>
              <span class="text nav-text">Soporte</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="bottom-content">
        <li class="">
          <a href="salir.php">
            <i class="bx bx-log-out icon"></i>
            <span class="text nav-text">Cerrar cesion</span>
          </a>
        </li>

        <li class="mode">
          <div class="sun-moon">
            <i class="bx bx-moon icon moon"></i>
            <i class="bx bx-sun icon sun"></i>
          </div>
          <span class="mode-text text">Modo oscuro</span>

          <div class="toggle-switch">
            <span class="switch"></span>
          </div>
        </li>
      </div>
    </div>
  </nav>

  <section class="perfiladmin container section section__height agregarproducto" id="perfil">
    <div class="perfiladmins">
      <h1>PERFIL ADMIN</h1>
    </div>
    <div class="contper">
      <div class="containerPERFIL">
        <h2>Bienvenido, <?php echo $admin_logged_in['nombre']; ?></h2>
        <ul>
          <form action="" method="post">
            <li><strong>Correo:</strong> <?php echo $admin_logged_in['correo']; ?></li>
            <li><strong>Nombre:</strong> <?php echo $admin_logged_in['nombre']; ?></li>
            <li><strong>Contraseña:</strong> ********</li>
            <button type="submit" name="camcontra" class="btncontra" style="font-size: 1.2rem; padding: 0.5rem; border-radius: 5px; border: none; background-color: #007bff; color: #fff; cursor: pointer;">CAMBIAR CONTRASEÑA</button>
          </form>
        </ul>
      </div>

    </div>

  </section>

  <section id="agregar-producto" class="agregarproducto">
    <div class="agregarcategoria">
      <h2>Agregar nueva categoría</h2>
      <form action="procesosAdmin/agrcategorias.php" method="post" id="agrcategoriaform">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea>
        <button type="submit" name="agregar_categoria">Agregar categoría</button>

      </form>
      <center>
        <button name="borrar_categoria" id="borrar_categoria" style="font-size: 1.2rem; padding: 0.5rem; border-radius: 5px; border: none; background-color: red; color: #fff; cursor: pointer; transition: all 0.2s ease-in-out;">Borrar categoría</button>
      </center>


      <script>
        document.getElementById("borrar_categoria").addEventListener("click", function(event) {
          event.preventDefault();

          // Obtener la lista de categorías
          fetch("procesosAdmin/obtenercategorias.php")
            .then((response) => response.json())
            .then((categorias) => {
              // Crear una tabla con las categorías y un botón de borrar para cada categoría
              let tabla = "<table style='border-collapse: collapse; margin: 20px;'><thead><tr style='background-color: #ddd;'><th style='border: 1px solid #ddd; padding: 10px;'>Nombre</th><th style='border: 1px solid #ddd; padding: 10px;'>Descripción</th><th style='border: 1px solid #ddd; padding: 10px;'>Borrar</th></tr></thead><tbody>";

              categorias.forEach((categoria) => {
                tabla += `<tr style='border: 1px solid #ddd;'><td style='border: 1px solid #ddd; padding: 10px;'>${categoria.nombre}</td><td style='border: 1px solid #ddd; padding: 10px;'>${categoria.descripcion}</td><td style='border: 1px solid #ddd; padding: 10px;'><button style='background-color: red; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;' class="borrarcategorias" data-id="${categoria.id}">Borrar</button></td></tr>`;
              });

              tabla += "</tbody></table>";

              // Mostrar la tabla en una ventana emergente
              const ventana = window.open("", "Categorías", "width=600,height=400");
              ventana.document.write(tabla);

              // Agregar un evento click en los botones de borrar para enviar la solicitud de eliminación
              ventana.document.querySelectorAll(".borrarcategorias").forEach((boton) => {
                boton.addEventListener("click", function() {
                  const id = this.getAttribute("data-id");
                  const formData = new FormData();
                  formData.append("id", id);

                  fetch("procesosAdmin/borrarcategorias.php", {
                      method: "POST",
                      body: formData,
                    })
                    .then((response) => response.json())
                    .then((data) => {
                      if (data.status === "success") {
                        alert(data.message);
                        // Recargar la página actual para actualizar la lista de categorías
                        ventana.close();
                        location.reload();
                        ventana.location.reload();

                      } else {
                        alert(data.message);
                      }
                    })
                    .catch((error) => {
                      console.error("Error:", error);
                      alert("Error.");
                    });
                });
              });
            })
            .catch((error) => {
              console.error("Error:", error);
              alert("Error.");
            });
        });
        document.getElementById("agrcategoriaform").addEventListener("submit", function(event) {
          event.preventDefault();
          const formData = new FormData(event.target);

          fetch("procesosAdmin/agrcategorias.php", {
              method: "POST",
              body: formData,
            })
            .then((response) => response.json())
            .then((data) => {
              if (data.status === "success") {
                alert(data.message);
                // También puedes reiniciar el formulario aquí si es necesario
                //window.location.href = "perfilUser.php";
              } else {
                alert(data.message);
              }
            })
            .catch((error) => {
              console.error("Error:", error);
              alert("Error.");
            });
        });
      </script>
      <h2>Agregar nueva usuario</h2>
      <p>Aca podrás agregar un nuevo usuario</p>
      <form action="" method="post">
        <button type="submit">Agregar</button>
      </form>
    </div>
    <h2>Agregar producto</h2>

    <form action="procesosAdmin/agregar_producto.php" method="post" enctype="multipart/form-data" id="agregarproductoform">
      <label for="nombre">Nombre del producto:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="descripcion">Descripción:</label>
      <textarea id="descripcion" name="descripcion"></textarea>

      <label for="precio">Precio:</label>
      <input type="text" id="precio" name="precio" required pattern="^\d{1,8}(\.\d{2})?$" title="Por favor, ingrese un precio válido con hasta 8 dígitos enteros y 2 dígitos decimales">

      <label for="modelo">Modelo:</label>
      <input type="text" id="modelo" name="modelo" required>

      <label for="marca">Marca:</label>
      <input type="text" id="marca" name="marca" required>

      <label for="stock">Stock:</label>
      <input type="number" id="stock" name="stock" required>

      <label for="imagen">Imagen:</label>
      <input type="file" name="imagen">

      <label for="categoria">Categoría:</label>
      <select name="categoria_id" id="categoria" class="form-control">
        <?php $categorias = obtenerTodasCategorias(); ?>
        <?php foreach ($categorias as $categoria) : ?>
          <option value="<?php echo $categoria['id']; ?>"><?php echo htmlspecialchars($categoria['nombre']); ?></option>
        <?php endforeach; ?>
      </select>


      <button type="submit" name="agregar_producto">Agregar producto</button>
      <script>
        document.getElementById("agregarproductoform").addEventListener("submit", function(event) {
          event.preventDefault();
          const formData = new FormData(event.target);

          fetch("procesosAdmin/agregar_producto.php", {
              method: "POST",
              body: formData,
            })
            .then((response) => response.json())
            .then((data) => {
              if (data.status === "success") {
                alert(data.message);
                // También puedes reiniciar el formulario aquí si es necesario
                //window.location.href = "perfilUser.php";
              } else {
                alert(data.message);
              }
            })
            .catch((error) => {
              console.error("Error:", error);
              alert("Error.");
            });
        });
      </script>
    </form>
    <style>
      .agregarproducto {
        position: relative;
        top: 0;
        left: 0;
        height: 100vh;
        width: 100%;
        background-color: var(--body-color);
        transition: var(--tran-05);
        max-width: 85%;
        margin: 0 auto;
        padding: 1.7rem;
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .agregarproducto h2 {
        font-size: 1rem;
        margin-bottom: 0.1rem;
      }

      .agregarproducto form {
        display: flex;
        flex-direction: column;
      }

      .agregarproducto label {
        font-size: 1.2rem;
        margin-bottom: 1rem;
      }

      .agregarproducto input[type="text"],
      .agregarproducto textarea,
      .agregarproducto select {
        font-size: 0.8rem;
        padding: 0.2rem;
        border-radius: 5px;
        border: none;
        margin-bottom: 0.1rem;
      }

      .agregarproducto input[type="file"] {
        margin-bottom: 0.1rem;
      }

      .agregarproducto button[type="submit"] {
        font-size: 1.rem;
        padding: 0.1rem;
        border-radius: 5px;
        border: none;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
      }

      .agregarproducto button[type="submit"]:hover {
        background-color: #0069d9;
      }

      .agregarcategoria {
        width: 40%;
        float: left;
      }

      .agregarcategoria {
        margin-right: 1rem;
        margin-top: 0rem;
      }
    </style>


  </section>

  <section id="buscarUserProduct" class="buscar">
    <div class="buscar-forms">
      <div class="buscar-producto">
        <h2>Buscar producto</h2>
        <form>
          <label for="buscarProducto">Nombre del producto:</label>
          <input type="text" id="buscarProducto" name="buscarProducto">
          <button type="submit" onclick="window.location.href='otra_pagina.html'">Buscar producto</button>
        </form>
      </div>
      <div class="buscar-usuario">
        <h2>Buscar usuario</h2>
        <form>
          <label for="buscarUsuario">Nombre del usuario:</label>
          <input type="text" id="buscarUsuario" name="buscarUsuario">
          <button type="submit" onclick="window.location.href='otra_pagina.html'">Buscar usuario</button>
        </form>
      </div>
    </div>
    <div id="resultados"></div>
  </section>

  <style>
    #buscarUserProduct {
      height: 100vh;
      width: 100%;
      background-color: var(--body-color);
      transition: var(--tran-05);
      padding: 7rem;
    }

    .buscar-forms {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .buscar-producto,
    .buscar-usuario {
      width: 45%;
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      margin-bottom: 2rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .buscar-producto h2,
    .buscar-usuario h2 {
      font-size: 3rem;
      margin-bottom: 2rem;
      text-align: center;
    }

    .buscar-producto form,
    .buscar-usuario form {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
    }

    .buscar-producto label,
    .buscar-usuario label {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .buscar-producto input[type="text"],
    .buscar-producto input[type="number"],
    .buscar-producto select,
    .buscar-usuario input[type="text"] {
      font-size: 1.8rem;
      padding: 1rem;
      border-radius: 5px;
      border: none;
      margin-bottom: 2rem;
      width: 100%;
      max-width: 30rem;
    }

    .buscar-producto button[type="submit"],
    .buscar-usuario button[type="submit"] {
      font-size: 2.5rem;
      padding: 1.5rem 2rem;
      border-radius: 5px;
      border: none;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      width: 100%;
      max-width: 30rem;
    }

    .buscar-producto button[type="submit"]:hover,
    .buscar-usuario button[type="submit"]:hover {
      background-color: #0069d9;
    }
  </style>



<section id="ver-productos" class="verproductos">
  <div>
    <h2>Ver productos o usuarios</h2>
    <button id="verProductosBtn">Ver productos</button>
    <button id="verUsuariosBtn">Ver usuarios</button>
  </div>
  <div id="resultadosdever">
      <!-- Aquí se mostrarán los productos o usuarios -->
    </div>
  <script>
    function cargarProductos() {
      $.ajax({
        type: 'GET',
        url: 'procesosAdmin/verProductos.php',
        dataType: 'html',
        encode: true
      })
      .done(function(data) {
        $('#resultadosdever').html(data);
      });
    }

    $('#verProductosBtn').click(function(event) {
      event.preventDefault();
      cargarProductos();
    });

    function cargarUsuarios() {
      $.ajax({
        type: 'GET',
        url: 'procesosAdmin/verUsuarios.php',
        dataType: 'html',
        encode: true
      })
      .done(function(data) {
        $('#resultadosdever').html(data);
      });
    }

    $('#verUsuariosBtn').click(function(event) {
      event.preventDefault();
      cargarUsuarios();
    });
  </script>
</section>



  <section class="agregaradmin" id="A-agradmin">
    <h2>Agregar administrador</h2>
    <form action="agregar_administrador.php" method="post" id="agregarAdminForm">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>

      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
      </div>

      <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
      </div>

      <button type="submit">Agregar</button>
    </form>
  </section>

  <section class="soporte" id="A-soporte">
    <h2>Soporte técnico</h2>
    <p>¿Tienes algún problema con tu compra? ¿Necesitas ayuda para configurar un producto?</p>
    <p>Nuestro equipo de soporte técnico está aquí para ayudarte. Completa el formulario a continuación y nos pondremos en contacto contigo lo antes posible.</p>
    <form action="" method="post" id="soporteForm">
      <div class="form-group">
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
      </div>
      <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono">
      </div>
      <div class="form-group">
        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
      </div>
      <button type="submit">Enviar mensaje</button>
    </form>
  </section>



  <script>
    const body = document.querySelector("body"),
      sidebar = body.querySelector("nav"),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");

    toggle.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    });

    searchBtn.addEventListener("click", () => {
      sidebar.classList.remove("close");
    });

    modeSwitch.addEventListener("click", () => {
      body.classList.toggle("dark");

      if (body.classList.contains("dark")) {
        modeText.innerText = "Light mode";
      } else {
        modeText.innerText = "Dark mode";
      }
    });
  </script>
</body>

</html>