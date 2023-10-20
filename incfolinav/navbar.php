
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-navbar">
    <div class="container">
        <a class="logo logo__blanco" href="/" title="Senati">
                  <img src="https://www.senati.edu.pe/sites/all/themes/senati_theme/img/logo.svg" alt="Senati">
                </a>
        <!-- BUSCADOR 
        <input type="checkbox" id="navbar-toggle" class="d-none">
        <div class="navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="productos/index.php"></a>
                </li>
   
            </ul>
            <form class="d-flex me-4" action="productos/resultados_busqueda.php" method="post">

                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>-->
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <label class="nav-link" for="navbarDropdown">
                        <i class="bi bi-person"></i>
                    </label>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="loginregis.php">Iniciar sesión/Registrarte</a></li>
                        <li><a class="dropdown-item" href="perfilUser.php">Perfil</a></li>
                        <li><a class="dropdown-item" href="usuarios/mis_pedidos.php">HISTORIAL</a></li>
                        <li><a class="dropdown-item" href="panelAdmin.php">ADMIN</a></li>
                        <li><a class="dropdown-item" href="salir.php">CERRAR SESION</a></li>
                    </ul>

                </li>

                <!--<li class="nav-item">
                    <a class="nav-link" href="productos/carrito.php">
                        <i class="bi bi-cart"></i>
                    </a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="productos/carrito.php">
                        NOSOTROS
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
.sticky-navbar {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 1000;
}    
    .nav-item.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
</style>
</body>