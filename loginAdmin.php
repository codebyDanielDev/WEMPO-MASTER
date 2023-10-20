
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>INICIAR</title>
      <link rel="stylesheet" type="text/css" href="css/loginstyle.css" />
      <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
      ></script>
    
    </head>
    <body>
      
      <div class="container">
        <div class="forms-container">
          <div class="signin-signup">
            <form action="procesos/loginadmin.php" method="post"class="sign-in-form"id="login-form">
              <h2 class="title">INICIAR SESIÓN</h2>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="email" name="email" placeholder="Correo" />
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Contraseña" />
              </div>
                  <a href="https://wa.me/51931998025?text=Olvidé%20mi%20contraseña.">¿Te olvidaste tu contraseña?</a>
                  <button type="submit" class="btn solid"  id="login-in-btnR">INICIAR </button>  
              <p class="social-text">Regresar a la página principal</p>
              <div class="social-media">
                <a href="./" class="social-icon">
                  <i class="fas fa-arrow-left"></i>
                </a>
              </div>
            </form>
            <form action="procesos/registroUsuario.php" method="post" class="sign-up-form" id="register-form">
              <h2 class="title">¿PROBLEMAS?</h2>
              <p class="social-text">¿Tienes problemas para entrar?</p>
                <p class="social-text">Ingresa tu nombre y tu correo para ayudarte</p>
                <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Nombre" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Correo" required/>
              </div>
              <div>

              <label for="terms">Recibir <a href="https://wa.me/51931998025?text=TERMINOS%20Y%20CONDICIONES" target="_blank">ayuda.</a></label>
            </div>
            <button type="submit" class="btn solid"  id="sign-in-btnR">ENVIAR </button>
              
              <p class="social-text">Regresar a la página principal</p>
              <div class="social-media">
                <a href="./" class="social-icon">
                  <i class="fas fa-arrow-left"></i>
                </a>
              </div>
            </form>
            <script>
document.getElementById("login-form").addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(event.target);

    fetch("procesosAdmin/loginadmin.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.status === "success") {
            alert(data.message);
            // También puedes reiniciar el formulario aquí si es necesario
            window.location.href = "PanelAdmin.php";
        } else {
            alert(data.message);
        }
    })
    .catch((error) => {
        console.error("Error:", error);
        alert("Ocurrió un error inesperado.");
    });
}); 

document.getElementById("register-form").addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(event.target);

    fetch("procesos/registroUsuario.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.status === "success") {
            alert(data.message);
            const sign_in_btn = document.querySelector("#sign-in-btnR");
            const container = document.querySelector(".container");
            container.classList.remove("sign-up-mode");
            // También puedes reiniciar el formulario aquí si es necesario
        } else {
            alert(data.message);
        }
    })
    .catch((error) => {
        console.error("Error:", error);
        alert("Ocurrió un error inesperado. Puede que el usuario ya este registrado, cambie el dni o el correo.");
    });
});
</script>
          </div>
        </div>
        <div class="panels-container">

          <div class="panel left-panel">
              <div class="content"> 
                  <h3>Página de inicio para Administradores</h3>
                  <p>Dale click, y create una.</p>
                  <button class="btn transparent" id="sign-up-btn">CREAR</button>
              </div>
              <img src="./img/log.svg" class="image" alt="">
          </div>

          <div class="panel right-panel">
              <div class="content">
                  <h3>¿Quieres iniciar sesión?</h3>
                  <p>INICIAR SESIÓN</p>
                  <button class="btn transparent" id="sign-in-btn">INICIAR</button>
                  
              </div>
              <img src="./img/register.svg" class="image" alt="">
          </div>
        </div>
      </div>
      <?php //include 'incfolinav/footer.php'?>
      <script src="js/loginstyle.js"></script>
    </body>
  </html>