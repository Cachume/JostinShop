<?php include "template/header.php"?>


<main>
    <div class="tabla-productos">

        <div class="header-tabla">
            <h2>Historial de compras</h2>
        </div>

        <table class="tabla_catalogo">

            <thead>
                <tr>
                    <td>N°</td>
                    <td>Nombre del producto</td>
                    <td>Categoria</td>
                    <td>Imagen</td>
                    <td>Cantidad</td>
                    <td>Metodo de pago</td>
                    <td>Capture/Referencia</td>
                    <td>Precio Uitario</td>
                    <td>Precio Total</td>
                    <td>Fecha</td>
                </tr>
            </thead>

            <tbody>
                <!-- Datos de ejemplo -->
                <tr class="tr_fila">
                    <td>1</td>
                    <td>Camiseta Clásica</td>
                    <td>Franelas</td>
                    <td><img src="../src/Franelas.png" alt="Producto 1" class="imagen-producto"></td>
                    <td>3</td>
                    <td>Pago Movil</td>
                    <td><img src="" alt="00000458839" class="imagen-producto"></td>
                    <td>$10.00</td>
                    <td>$30.00</td>
                    <td>28/01/2025</td>
                </tr>

                <tr class="tr_fila">
                    <td>2</td>
                    <td>Gorra Premium</td>
                    <td>Gorras</td>
                    <td><img src="../src/Gorras.png" alt="Producto 2" class="imagen-producto"></td>
                    <td>2</td>
                    <td>Pago Movil</td>
                    <td><img src="" alt="00000458839" class="imagen-producto"></td>
                    <td>$20.00</td>
                    <td>$40.00</td>
                    <td>12/02/2025</td>
                </tr>

            </tbody>

        </table>
    </div>

</main>

</div>

<?php include "template/footer.php"?>