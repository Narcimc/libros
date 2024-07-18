<?php
if (!isset($_SESSION)) {
    session_start(); // Inicia la sesión cuando es necesario  
}

$user = htmlentities($_SESSION['user']); // Crea y usa las variables 
$rol = htmlentities($_SESSION['rol']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Narcisa Carrillo Sanchez" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <script src="https://kit.fontawesome.com/8b96afa7e9.js" crossorigin="anonymous"></script>
    <title>Inicio - Alquila fácil</title>
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
        }

        body,
        html {
            margin: 0;
            padding: 0;
        }

        header {
            background-color:  #f4e2d2;
            color: black;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 8rem;
            padding: 0 2rem;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 60px;
        }

        .logoText {
            text-align: center;
            margin-left: 1rem;
        }

        .usuario {
            display: flex;
            align-items: center;
        }

        .usuario img {
            height: 50px;
            border-radius: 100%;
            width: 50px;
            border: 1px solid black;
            margin-right: 1rem;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-top: 6rem;
        }

        nav a {
            color: black;
            text-decoration: none;
            margin: 0 35px;
            font-weight: bold;
        }

        .container {
            margin-top: 8rem; /* Para dar espacio a la barra de navegación fija */
        }

        #main-content {
            width: 100%;
            height: 1500px;
            
            
        }

        footer p {
            margin-bottom: 0;
        }
        footer{
            background-color:  #f4e2d2;
        }

        .intro {
            background-color: #17415a;
            color: white;
            padding: 50px;
            padding-top: 135px;
            text-align: center;
            margin-top: 9px;
            padding-bottom: 25px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="img/descarga.jpg" alt="logo" class="logo" />
            <div class="logoText">
                <strong><h4>Libreria Narci_Store</h4></strong>
            </div>
        </div>
        <nav id="navbar">
             <a href="#" onclick="loadContent('productos.php')">Productos</a>
             <a href="#" onclick="loadContent('carrito.php')">Carrito</a>
             <a href="#" onclick="loadContent('mostrarCokie.php')">Cookie</a>
        </nav>
        <div class="usuario">
            <figure id="usuario">
                <img src="img/perfil.jpg" alt="usuario" />
                <figcaption>Daniela Garcia</figcaption>
            </figure>
        </div>
    </header>

    <div class="container">
        <main id="main-content">
            
        </main>
    </div>
    <script>
        function loadContent(page) {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("main-content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", page, true);
        xhttp.send();
        }
    </script>
    
</body>
</html>
