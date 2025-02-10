<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="css/carrito2.css">
</head>

<body>
    <div class="contenedor">

        <header>
            <h1>Carrito de Compras</h1>
        </header>
        <main>

            <div id="items-carrito">

                <div class="item-carrito">

                    <img src="src/catalogo/Franelas.png" alt="Producto" class="imagen-item">

                    <div class="detalles-item">

                        <h2 class="nombre-item">Camiseta Clásica</h2>
                        <p class="precio-item">$10.00</p>

                        <div class="cantidad-item">

                            <button class="boton-cantidad menos">-</button>
                            <input type="text" value="1" class="entrada-cantidad">
                            <button class="boton-cantidad mas">+</button>

                        </div>

                        <button class="boton-eliminar">Eliminar</button>

                    </div>
                </div>

                <div class="item-carrito">

                    <img src="src/catalogo/Franelas.png" alt="Producto" class="imagen-item">

                    <div class="detalles-item">

                        <h2 class="nombre-item">Camiseta Clásica</h2>
                        <p class="precio-item">$10.00</p>

                        <div class="cantidad-item">

                            <button class="boton-cantidad menos">-</button>

                            <input type="text" value="1" class="entrada-cantidad">
                            
                            <button class="boton-cantidad mas">+</button>

                        </div>

                        <button class="boton-eliminar">Eliminar</button>

                    </div>

                </div>

            </div>

            <div class="datos-comprador">
                <h2>Datos del Comprador</h2>
                <form id="form-comprador">
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
                        <input type="text" id="email" value="   V-00.000.00" disabled>
                    </div>
                    <div class="campo-formulario">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" required>
                    </div>
                </form>
            </div>

            <!-- Selección de Método de Pago -->
            <div class="metodo-pago">

                <h2>Elige tu Método de Pago</h2>
                <select id="selector-pago">

                    <option value="">Selecciona una opción</option>
                    <option value="efectivo">Efectivo</option>
                    <option value="transferencia">Transferencia Bancaria</option>
                    <option value="pago_movil">Pago Móvil</option>
                    <option value="binance">Binance</option>
                    <option value="paypal">PayPal</option>

                </select>
            </div>

            
            <div id="info-pago" class="info-pago">
                <!-- Efectivo -->
                <div class="metodo-info" data-metodo="efectivo">
                    <p><strong>Pago en Efectivo:</strong> Puedes realizar el pago directamente en nuestra tienda</p>
                    <p>Dirección: Barinitas.Calle 6, Entre Carrera 5 y 6</p>
                </div>
                
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
                
                <!-- Binance -->
                <div class="metodo-info" data-metodo="binance">
                    <p><strong>Binance:</strong></p>
                    <p>Wallet: abc123def456ghi789</p>
                </div>
                
                <!-- PayPal -->
                <div class="metodo-info" data-metodo="paypal">
                    <p><strong>PayPal:</strong></p>
                    <p>Enlace: <a href="#" target="_blank">paypal.me/nombre_X</a></p>
                </div>

                <div class="campo-formulario">
                    <label for="referencia-pago">Referencia/Número de Transacción:</label>
                    <input type="text" id="referencia-pago" name="referencia-pago" required>
                </div>

                <div class="campo-formulario">
                    <label for="comprobante-pago">Subir Comprobante (imagen):</label>
                    <input type="file" id="comprobante-pago" name="comprobante-pago" accept="image/*" required>
                </div>

            </div>
            
            <div class="total-pago">
                <p>Total: <span id="precio-total" class="precio-total">$20.00</span></p>
                <button class="boton-pagar">Proceder al Pago</button>
            </div>

        </main>
    </div>


    <script src="js/carrito.js"></script>

</body>

</html>