        <?php 
            include "./template/header.php"
        ?>

        <main>
            
            <div class="tabla-productos">

                <div class="header-tabla">
                    <h2>Lista de [Producto]</h2>
                    <button id="agregarProducto" class="btn-agregar">Añadir Producto</button>
                </div>

                <table class="tabla_catalogo">

                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Imagen</td>
                            <td>Descripcion</td>
                            <td>Precio</td>
                            <td>Stock</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <tr class="tr_fila">
                            <td>Producto 1</td>
                            <td><img src="../src/producto/franela.png" alt="Producto 1" class="imagen-producto"></td>
                            <td>Producto numero uno en el mundo</td>
                            <td>$10.00</td>
                            <td>50</td>
                            <td>
                                <button class="editar" onclick="abrirModalEditar(1)"><i class="fas fa-edit"></i></button>
                                <button class="eliminar" onclick="abrirModalEliminar(1)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr class="tr_fila">
                            <td>Producto 2</td>
                            <td><img src="../src/Franelas.png" alt="Producto 2" class="imagen-producto"></td>
                            <td>Producto numero dos en el mundo</td>
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

    
    <div class="ventanatema" id="modalProducto">

        <div class="fondotema"></div>
        <form id="formProducto">

            <h2 id="tituloModal">Añadir Producto a [Producto]</h2>

            <label for="nombre">Ingrese el nombre del producto:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="imagen">Ingrese la imagen del producto:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">

            <label for="descripcion">Ingrese la descripcion del producto:</label>
            <input type="text" id="descripcion" name="descripcion" required>

            <label for="precio">Ingrese el precio del producto:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>

            <label for="stock">Ingrese la cantidad de producto:</label>
            <input type="number" id="stock" name="stock" step="1" required>

            

            <div class="botones-modal">
                <button type="submit" id="btnGuardar">Añadir</button>
                <button type="button" id="btnCancelar">Cerrar</button>
            </div>

        </form>
    </div>

    
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