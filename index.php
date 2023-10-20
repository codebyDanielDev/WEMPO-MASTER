<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEMPO</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css"> -->
<link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/logo.ico" />
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   
<script src="js/jquery.min.js"></script>
<!--<script src="js/bootstrap.min.js"></script> -->
<!--<script src="js/autohidingnavbar.min.js"></script>-->
<script src="js/main.js"></script>
<script src="js/carrito.js"></script>
    

</head>
<body>
    <?php include 'incfolinav/navbar.php'?>



    <main>
        <!-- Aquí va el contenido principal de la página -->
        <section>

        </section>


    </main>

    <?php include 'incfolinav/footer.php'?>

    <a href="https://wa.me/51931998025  " target="_blank" class="whatsapp-link">
  <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="Ícono de WhatsApp" class="whatsapp-icon">
</a>
<style>
    .whatsapp-link {
  display: inline-block;
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 1000;
}

.whatsapp-icon {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);
}
.section-container {
            position: relative;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 12px;
            background-color: #f1f1f1;
            color: #333;
            border: none;
            cursor: pointer;
            padding: 4px 6px;
            border-radius: 4px;
        }

        .close-btn:hover {
            background-color: #ddd;
        }
</style>
<script>
        function closeSection() {
            document.getElementById("section-to-close").style.display = "none";
        }
    </script>
</body>
</html>