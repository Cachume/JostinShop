        <?php 
            include "./template/header.php"
        ?>


        <main>
            <!-- Tabla de Productos -->
            <div class="tabla-productos">

                <div class="header-tabla">
                    <h2>Lista de Productos</h2>
                    <button id="agregarProducto" class="btn-agregar">Agregar Producto</button>
                </div>

                <table class="tabla_catalogo">

                    <thead>
                        <tr>
                            <td>Serial</td>
                            <td>Imagen</td>
                            <td>Nombre</td>
                            <td>Precio</td>
                            <td>Stock</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Datos de ejemplo -->
                        <tr class="tr_fila">
                            <td>001</td>
                            <td><img src="../src/Gorras.png" alt="Producto 1" class="imagen-producto"></td>
                            <td>Producto 1</td>
                            <td>$10.00</td>
                            <td>50</td>
                            <td>
                                <button class="editar" onclick="abrirModalEditar(1)"><i class="fas fa-edit"></i></button>
                                <button class="eliminar" onclick="abrirModalEliminar(1)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr class="tr_fila">
                            <td>002</td>
                            <td><img src="../src/Franelas.png" alt="Producto 2" class="imagen-producto"></td>
                            <td>Producto 2</td>
                            <td>$20.00</td>
                            <td>30</td>
                            <td>
                                <button class="editar" onclick="abrirModalEditar(2)"><i class="fas fa-edit"></i></button>
                                <button class="eliminar" onclick="abrirModalEliminar(2)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>

        </main>

    </div>

    <!-- Modal para Agregar/Editar Producto -->
    <div class="ventanatema" id="modalProducto">

        <div class="fondotema"></div>
        <form id="formProducto">

            <h2 id="tituloModal">Agregar Producto</h2>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>

            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" required>

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">

            <div class="botones-modal">
                <button type="submit" id="btnGuardar">Guardar</button>
                <button type="button" id="btnCancelar">Cancelar</button>
            </div>

        </form>
    </div>

    <!-- Modal para Eliminar Producto -->
    <div class="ventanatema" id="modalEliminar">

        <div class="fondotema"></div>

        <form id="formEliminar">

            <h2>¿Eliminar Producto?</h2>
            <p id="mensajeEliminar">¿Estás seguro de que deseas eliminar este producto?</p>

            <div class="botones-modal">
                <button type="submit" id="btnEliminar">Eliminar</button>
                <button type="button" id="btnCancelarEliminar">Cancelar</button>
            </div>
            
        </form>
    </div>

    <?php  include "template/footer.php" ?>