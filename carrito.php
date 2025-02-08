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
                    <!-- <div class="campo-formulario">
                        <label for="direccion">Dirección de Envío:</label>
                        <textarea id="direccion" name="direccion" required></textarea>
                    </div>
                    <div class="campo-formulario">
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" id="ciudad" name="ciudad" required>
                    </div>
                    <div class="campo-formulario">
                        <label for="codigo-postal">Código Postal:</label>
                        <input type="text" id="codigo-postal" name="codigo-postal" required>
                    </div> -->
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

            <!-- Información del Método de Pago Seleccionado -->
            <div id="info-pago" class="info-pago">
                <!-- Aquí se mostrará la información dinámica -->
            </div>

            <!-- Total y Botón de Pago -->
            <div class="total-pago">
                <p>Total: <span id="precio-total" class="precio-total">$20.00</span></p>
                <button class="boton-pagar">Proceder al Pago</button>
            </div>

        </main>
    </div>


    <script src="js/carrito.js"></script>

</body>

</html>