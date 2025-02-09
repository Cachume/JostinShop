<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/producto.css">
    <link rel="stylesheet" href="css/catalogo.css">
    <link rel="stylesheet" href="css/ajustes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="barra-lateral" id="barraLateral">
        <h2>Maak Store</h2>
        <ul>
            <li><a href="index.php"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
            <li><a href="usuarios.php"><i class="fas fa-users"></i> Usuarios</a></li>
            <li><a href="catalogo.php"><i class="fas fa-box-open"></i> Catálogo</a></li>
            <li><a href="compras.php"><i class="fas fa-shopping-cart"></i> Compras</a></li>
            <li><a href="ajustes.php"><i class="fas fa-cog"></i> Ajustes</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
        </ul>
    </div>
    <div class="fondo-oscuro" id="fondoOscuro"></div>
    <div class="contenido-principal">
        <header>
            <button id="botonMenu">
                <i class="fas fa-bars"></i>
            </button>
            <?php
                session_start();
                include "../libs/database.php";
                $db = New Database();
                $dolar = $db->getPreciodolar();
                //var_dump($dolar);
               // echo $dolar['precio'];
                echo "<span class='BCVdolar'> Precio del dolar:<strong> ".$dolar['precio']." Bs</strong></span>";
            ?> 
            <div class="perfil-usuario">
                <img src="https://cdn-icons-png.flaticon.com/512/6073/6073873.png" width="100" alt="Foto de Usuario">
                <div>
                    <h4><?php echo $_SESSION['email']?></h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>