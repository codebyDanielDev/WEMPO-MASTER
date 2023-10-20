<?php

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="css/adminstyles.css">

        <title>ADMIN</title>
    </head>
    <body>
        <!--=============== HEADER ===============-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">PANEL DE ADMINISTRADOR</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">ADMIN</span>
                            </a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="#about" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">About</span>
                            </a>
                        </li>

                        <li class="nav__item">
                            <a href="#skills" class="nav__link">
                                <i class='bx bx-book-alt nav__icon'></i>
                                <span class="nav__name">Skills</span>
                            </a>
                        </li>

                        <li class="nav__item">
                            <a href="#portfolio" class="nav__link">
                                <i class='bx bx-plus nav__icon'></i>
                                <span class="nav__name">Portfolio</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#about" class="nav__link">
                                <i class='bx bx-cog nav__icon'></i>
                                <span class="nav__name">Admin</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#contactme" class="nav__link">
                                <i class='bx bx-support nav__icon'></i>
                                <span class="nav__name">Soporte</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <img src="css/adminStyle/img/perfila.png" alt="" class="nav__img">
            </nav>
        </header>

        <main>
            <!--=============== HOME ===============-->
            <section class="container section section__height" id="home">
                <h1>PERFIL</h1>
                <div class="contper">
                <div class="containerPERFIL">
                <h2>Bienvenido, <?php //echo $usuario['nombre']; ?></h2>
                <ul>
                    <li><strong>Correo:</strong> <?php //echo $usuario['correo']; ?></li>
                    <li><strong>DNI:</strong> <?php //echo $usuario['dni']; ?></li>
                    <li><strong>Nombre:</strong> <?php //echo $usuario['nombre']; ?></li>
                    <li><strong>Apellido Paterno:</strong> <?php //echo $usuario['apellido_paterno']; ?></li>
                    <li><strong>Apellido Materno:</strong> <?php //echo $usuario['apellido_materno']; ?></li>
                    <li><strong>Fecha de nacimiento:</strong> <br><?php //echo $usuario['fecha_nacimiento']; ?></li>
                    <li><strong>Dirección:</strong> <?php //echo $usuario['direccion']; ?></li>
                    <li><strong>Ciudad:</strong> <?php //echo $usuario['ciudad']; ?></li>
                    <li><strong>Contraseña:</strong> ********</li>
                </ul>   
    </div>
    <div class="IMGperfil" style="display: flex; justify-content: center; align-items: center;">
    <img src="<?= htmlspecialchars($usuario['imagen']) ?>" style="max-width: 300px; max-height: 400px; width: auto; height: auto; object-fit: cover;">
    </div>
    </div>
                <style>
.section__height {
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.section__height h1 {
  font-size: 3em;
  margin-right: 1em;
  margin-top: 0; /* agrega esta línea para mover el h1 hacia arriba */
  align-self: flex-start;

}

h1 {
  font-size: 3.1rem; /* aumenta el tamaño de la fuente */
  margin-bottom: -0.1rem;
}

.contper {
  display: flex;
  justify-content: space-between;
  align-items: center;
 
}

.containerPERFIL {
  margin-right: 22rem;
  font-size: 1.4rem; /* aumenta el tamaño de la fuente */
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

li {
  margin-bottom: 0.7rem;
}

.IMGperfil {
  width: auto; /* aumenta el tamaño de la imagen */
  height: auto; /* aumenta el tamaño de la imagen */
  border-radius: 10px; /* cambia el borde redondeado */
  background-color: gray;
  margin-left: 2rem; /* agrega un margen a la izquierda */
}
                </style>
            </section>

            <!--=============== ABOUT ===============-->
            <section class="container section section__height" id="about">
                <h2 class="section__title">About</h2>
            </section>

            <!--=============== SKILLS ===============-->
            <section class="container section section__height" id="skills">
                <h2 class="section__title">Skills</h2>
            </section>

            <!--=============== PORTFOLIO ===============-->
            <section class="container section section__height" id="portfolio">
                <h2 class="section__title">Portfolio</h2>
            </section>

            <!--=============== CONTACTME ===============-->
            <section class="container section section__height" id="contactme">
                <h2 class="section__title">Contactme</h2>
            </section>
        </main>
        

        <!--=============== MAIN JS ===============-->
        <script src="js/adminstyle.js"></script>
    </body>
</html>