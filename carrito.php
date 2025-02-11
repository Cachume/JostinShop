<?php include_once("template/header.php");
if(!isset($_SESSION['id'])){
    header("location: login.php");
}
?>

<body class="carrito_body">
    <div class="contenedor">

        <header>
            <h1>Carrito de Compras</h1>
          <?php 
           if (isset($_GET['s']) || isset($_GET['e'])) {
                $class = isset($_GET['s']) ? "success" : "error";
                $message = isset($_GET['s']) ? htmlspecialchars($_GET['s']) : htmlspecialchars($_GET['e']);
                echo "<span class='$class'>$message</span>";
            }
        ?>
        </header>
        <form action="controllers/userSavepedido.php" method="post" enctype="multipart/form-data" >
            <div id="items-carrito">
            <?php
            include("./controllers/userCarrito.php");
            //var_dump($sysdb->getCarrito($_SESSION['id']))
            ?>
               

            </div>

            <div class="datos-comprador">
                <h2>Datos del Comprador</h2>
                <div id="form-comprador">
                    <div class="campo-formulario">
                        <label for="nombre">Nombres:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="campo-formulario">
                        <label for="apellido">Apellidos:</label>
                        <input type="text" id="apellido" name="apellido" required>
                    </div>
                    <div class="campo-formulario">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" value="albetrq703@gmail.com" disabled>
                    </div>
                    <div class="campo-formulario">
                        <label for="email">Cedula de Identidad:</label>
                        <input type="text" id="email" value="   V-<?php echo $_SESSION['cdi'];?>" disabled>
                    </div>
                    <div class="campo-formulario">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" required>
                    </div>
                </div>
            </div>

            <!-- Selección de Método de Pago -->
            <div class="metodo-pago">

                <h2>Elige tu Método de Pago</h2>
                <select id="selector-pago" name="pago">

                    <option value="">Selecciona una opción</option>
                    <!-- <option value="efectivo">Efectivo</option> -->
                    <option value="transferencia">Transferencia Bancaria</option>
                    <option value="pago_movil">Pago Móvil</option>
                    <!-- <option value="binance">Binance</option>
                    <option value="paypal">PayPal</option> -->

                </select>
            </div>

            
            <div id="info-pago" class="info-pago">
                <!-- Efectivo -->
                <!-- <div class="metodo-info" data-metodo="efectivo">
                    <p><strong>Pago en Efectivo:</strong> Puedes realizar el pago directamente en nuestra tienda</p>
                    <p>Dirección: Barinitas.Calle 6, Entre Carrera 5 y 6</p>
                </div> -->
                
                <!-- Transferencia Bancaria -->
                <div class="metodo-info" data-metodo="transferencia">
                    <p><strong>Transferencia Bancaria:</strong></p>
                    <p>Banco de Venezuela</p>
                    <p>Número de Cuenta: 1234567890</p>
                    <p>Tipo de Cuenta: Ahorro</p>
                    <p>Titular: Pedro</p>
                    <p>Cédula/RIF: J-12.255.112-7</p>
                </div>

                <!-- Pago Móvil -->
                <div class="metodo-info" data-metodo="pago_movil">
                    <p><strong>Pago Móvil:</strong></p>
                    <p>Banco Provincial</p>
                    <p>Número: +58 414-4512536</p>
                    <p>Cédula/RIF: V-12.345.</p>
                </div>
                
                <!-- Binance
                <div class="metodo-info" data-metodo="binance">
                    <p><strong>Binance:</strong></p>
                    <p>Wallet: abc123def456ghi789</p>
                </div>
                
                <!-- PayPal -->
                <!-- <div class="metodo-info" data-metodo="paypal">
                    <p><strong>PayPal:</strong></p>
                    <p>Enlace: <a href="#" target="_blank">paypal.me/nombre_X</a></p>
                </div> -->

                <div class="campo-formulario">
                    <label for="referencia-pago">Referencia/Número de Transacción:</label>
                    <input type="text" id="referencia-pago" name="referencia-pago" required>
                </div>

                <div class="campo-formulario">
                    <label for="comprobante-pago">Subir Comprobante (imagen):</label>
                    <input type="file" id="comprobante-pago" name="comprobante-pago" accept="image/*" required>
                </div>
                <input type="hidden" name="cart" value='<?php echo $productos_json;?>'>
                <input type="hidden" name="usd" value='<?php echo $total?>'>
                <input type="hidden" name="bs" value='<?php echo $bstotal?>'>
            </div>
            
            <div class="total-pago">
                <p>Total: <span id="precio-total" class="precio-total">$<?php echo number_format($total,2,",",".");?></span></p>
                <p>Total en Bs: <span id="precio-total" class="precio-total">Bs.<?php echo number_format($bstotal,2,",",".");?></span></p>
                <button class="boton-pagar" type="submit">Proceder al Pago</button>
            </div>

        </form>
    </div>


    <script src="js/carrito.js"></script>

</body>

</html>