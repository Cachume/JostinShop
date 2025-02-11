<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/producto.css">
    <link rel="stylesheet" href="css/carrito2.css">
    <link rel="stylesheet" href="css/pedidos.css">
</head>
<body>
    <header>
        <div class="header-desktop">
            <div class="header-bar">
                <span class="header-title">
                    Maak Store
                </span>
                <nav class="header-nav">
                    <a href="index.php">INICIO</a>
                    <a href="catalogo.php">CATALOGO</a>
                    
                    <a href="index.html">NOSOTROS</a>
                    <?php
                    session_start();
                        if(isset($_SESSION['id'])){
                            echo '<a href="pedidos.php">PEDIDOS</a>';
                            echo '<a href="carrito.php">CARRITO</a>';
                        }else{
                            echo '<a href="login.php">Iniciar Sesion</a>';
                        }
                    ?>
                </nav>
                <div class="header-r">
                    <a href="carrito.php">
                        <img src="src/carrito-de-compras.png" alt="" srcset="">
                    </a>
                    <?php
                        if(isset($_SESSION['id'])){
                            echo '<a href="salir.php">
                        <img src="src/lista(1).png" alt="" srcset="">
                    </a>';
                        }
                    ?> 
                </div>
            </div>        
        </div>
        <div class="header-mobile">
            <img src="src/lista(1).png" alt="" srcset="" onclick="menuShow();">
            <span class="header-title">
                Maak Store
            </span>
            <img src="src/carrito-de-compras.png" alt="" srcset="">
        </div>
        <div class="sidebar" id="sidebar">
            <!-- Contenido del menú lateral -->         
            <ul>
                <img src="src/x.png" alt="" onclick="menuShow();">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="login.php">Iniciar Sesion</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="#">Contacto</a></li>
                <!-- Agrega más enlaces según sea necesario -->
            </ul>
        </div>      
    </header>