<?php 
include_once("controllers/userProducto.php");
//var_dump($producto);
include_once("template/header.php");
?>
<body>
    <main class="main_producto">
        <div class="contenedor_producto">

            <div class="producto">

                <div class="imagenes-producto" style="display:none;">
                    <img src="./src/producto/" alt="Franela"
                        onclick="cambiarImagenPrincipal('./src/producto/franela.png')">
                    <img src="./src/producto/franela2.png" alt="Franela"
                        onclick="cambiarImagenPrincipal('./src/producto/franela2.png')">
                    <img src="./src/producto/franela3.png" alt="Franela"
                        onclick="cambiarImagenPrincipal('./src/producto/franela3.png')">
                </div>

                <div>
                    <img class="imagen-principal" src="./src/producto/<?php echo($producto['imagen_producto']); ?>" alt="<?php echo($producto['nombre_producto']); ?>" id="imagenPrincipal">
                </div>

                <div class="detalles-producto">
                    <h1><?php echo($producto['nombre_producto']); ?></h1>
                    <p class="precio">$<?php echo($producto['precio']); ?></p>
                    <div class="redes-sociales">
                        <span>Producto(s) Disponibles: <?php echo($producto['stock']); ?></span>
                    </div>
                    <!-- <button class="boton-comprar" hidden><p>COMPRAR POR WHATSAPP</p></button> -->
                    <form action="controllers/useraddProducto.php" method="POST" class="cantidad">
                        <input type="hidden" name="c" value="<?php echo($c);?>">
                        <input type="hidden" name="p" value="<?php echo($p);?>">
                        <input type="number" name="cantidad" value="1" min="1" max="<?php echo($producto['stock']); ?>">
                        <button class="boton-agregar-carrito">AGREGAR AL CARRITO</button>
                    </form>
                    <!-- <div class="lista-deseos">
                        <img class="corazon-like" src="./src/heart.png" alt="Añadir a la lista de deseos">
                        <span>AÑADIR A LA LISTA DE DESEOS</span>
                    </div> -->
                    <a href="https://wa.me/1234567890" class="whatsapp-button" style="width: 250px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="whatsapp-logo" alt="WhatsApp Logo">
                Contactar por WhatsApp
                </a>
                    <div class="opciones-pago" style="display:none;">
                        <img src="./src/paypal.png" alt="PayPal">
                        <img src="./src/visa.png" alt="Visa">
                        <img src="./src/mastercard.png" alt="MasterCard">
                    </div>
                </div>
            </div>
            <div class="pestanas">
                <div class="pestana activa" onclick="mostrarPestana('descripcion')">DESCRIPCIÓN</div>
                <div class="pestana" onclick="mostrarPestana('comentarios')">COMENTARIOS</div>
            </div>

            <div id="descripcion" class="contenido-pestana activa">
                <h2>DESCRIPCIÓN</h2>
                <p><?php echo($producto['descripcion_producto']); ?></p>
                <br>

                <p><strong>Horario de atención:</strong></p>
                <p>Lunes a Viernes 8:00 am a 5:30 pm</p>
                <p>Sábado: 8:00 am a 1:00 pm</p>
                <br>

                <p><strong>ENVÍO GRATIS A NIVEL NACIONAL:</strong></p>
                <p>* MRW - ZOOM - TEALCA</p>
                <p>* DOMESA (COBRO DESTINO)</p>
                <p>Delivery Gratis Barinas</p>
                <br>

                <p><strong>Métodos de Pago:</strong></p>
                <p>* Pago Móvil</p>
                <p>* Transferencias bancarias Banesco, Venezuela y Provincial</p>
                <p>* Zelle o depósitos en $ efectivo.</p>
                <br>

                <p><strong>Envíos:</strong></p>
                <p><strong>*</strong> Se despachan el mismo día cancelando antes de medio día, no atendemos urgencias, haga todas las
                    preguntas correspondientes antes de ofertar.</p>
                <p><strong>*</strong> Pregunte por la disponibilidad del Producto antes de Ofertar</p>
                <a href="https://wa.me/1234567890" class="whatsapp-button" style="width: 250px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="whatsapp-logo" alt="WhatsApp Logo">
                Contactar por WhatsApp
                </a>
            </div>
            <div id="comentarios" class="contenido-pestana" style="display:none;">
                <h2>COMENTARIOS</h2>
                <br>
                <p>Algun Comentario x</p>
            </div>
        </div>
    </main>

    <script>
        function cambiarImagenPrincipal(imagen) {
            document.getElementById('imagenPrincipal').src = imagen;
        }
        

        function mostrarPestana(pestanaId) {
            // Ocultar todo el contenido de las pestañas
            document.querySelectorAll('.contenido-pestana').forEach(function (contenidoPestana) {
                contenidoPestana.classList.remove('activa');
            });
            // Quitar la clase activa de todas las pestañas
            document.querySelectorAll('.pestana').forEach(function (pestana) {
                pestana.classList.remove('activa');
            });
            // Mostrar el contenido de la pestaña seleccionada y agregar la clase activa a la pestaña
            document.getElementById(pestanaId).classList.add('activa');
            document.querySelector('.pestana[onclick="mostrarPestana(\'' + pestanaId + '\')"]').classList.add('activa');
        }
    </script>
</body>

</html>