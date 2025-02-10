<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/compras.css">
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

        <section class="historial-compras">
            <h2>Historial de Compras</h2>
            <table class="tabla-compras">
                <thead>
                    <tr>
                        <th>Referencia</th>
                        <th>Método de Pago</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-referencia="12345">
                        <td><a href="#" class="ver-detalle">12345</a></td>
                        <td>Tarjeta de Crédito</td>
                        <td>2023-10-01</td>
                    </tr>
                    <tr data-referencia="67890">
                        <td><a href="#" class="ver-detalle">67890</a></td>
                        <td>PayPal</td>
                        <td>2023-10-02</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <div class="ventana-modal" id="ventanaModalDetalles">
            <div class="modal-contenido">
                <span class="cerrar-modal">&times;</span>
                <h2>Detalles de la Compra</h2>
                <div class="detalles-compra">
                    <p><strong>Nombre:</strong> <span id="nombres">Deviam</span></p>
                    <p><strong>Apellido:</strong> Trusman<span id="apellidos"></span></p>
                    <p><strong>Teléfono:</strong><span id="telefono">+58 414-3512548</span></p>
                    <p><strong>Cédula/RIF:</strong><span id="cedula">J-23.245.111-7</span></p>
                    <p><strong>Correo:</strong> <span id="correo">asd@gmail.com</span></p>
                    <p><strong>COMPRAS REALIZADAS:</strong><span id="compras">
                    <ul>
                        <li>camisa</li>
                        <li>pantalones</li>
                    </ul></span></p>
                    <p><strong>Identificador de compra:</strong> <span id="referencia">12345</span></p>
                    <p><strong>Capture:</strong></p>
                    <img id="capture" src="../src/capture.png" alt="Captura de la Compra">
                </div>
            </div>
        </div>


        <script src="js/index.js"></script>
        <script src="js/compras.js"></script>
    </div>
</body>
</html>
