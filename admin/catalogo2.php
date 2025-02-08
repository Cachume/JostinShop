        <?php 
            include "./template/header.php"
        ?>

        <main>
            
            <div class="tabla-catalogos">

                <div class="header-tabla">
                    <h2>Gestión de Catálogos</h2>
                    <button id="agregarCatalogo" class="btn-agregar">Agregar Catálogo</button>
                </div>

                <table class="tabla_catalogo">

                    <thead>
                        <tr>
                            <td>Nombre del Catálogo</td>
                            <td>Imagen</td>
                            <td>Número de Productos</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <tr class="tr_fila">
                            <td><a href="productos2.php">Camisas</a></td>
                            <td><img src="../src/Franelas.png" alt="Producto 1" class="imagen-producto"></td>
                            <td>158</td>
                            <td>
                                <button class="editar" onclick="abrirModalEditarCatalogo(1)"><i class="fas fa-edit"></i></button>
                                <button class="eliminar" onclick="abrirModalEliminarCatalogo(1)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr class="tr_fila">
                            <td><a href="productos2.php">Gorras</a></td>
                            <td><img src="../src/Gorras.png" alt="Producto 2" class="imagen-producto"></td>
                            <td>67</td>
                            <td>
                                <button class="editar" onclick="abrirModalEditarCatalogo(2)"><i class="fas fa-edit"></i></button>
                                <button class="eliminar" onclick="abrirModalEliminarCatalogo(2)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </main>
    </div>

    
    <div class="ventanatema" id="modalCatalogo">

        <div class="fondotema"></div>

        <form id="formCatalogo">

            <h2 id="tituloModalCatalogo">Agregar Catálogo</h2>
            <label for="nombreCatalogo">Ingrese el nombre del Catálogo:</label>
            <input type="text" id="nombreCatalogo" name="nombreCatalogo" required>

            <label for="imagenCatalogo">Ingrese la imagen del Catálogo:</label>
            <input type="file" id="imagenCatalogo" name="imagenCatalogo" required>

            <div class="botones-modal">
                <button type="submit" id="btnGuardarCatalogo">Añadir</button>
                <button type="button" id="btnCancelarCatalogo">Cerrar</button>
            </div>

        </form>
    </div>

    
    <div class="ventanatema" id="modalEliminarCatalogo">

        <div class="fondotema"></div>

        <form id="formEliminarCatalogo">

            <h2>¿Eliminar Catálogo?</h2>
            <p id="mensajeEliminarCatalogo">¿Estás seguro de que deseas eliminar este catálogo?</p>

            <div class="botones-modal">
                <button type="submit" id="btnEliminarCatalogo">Eliminar</button>
                <button type="button" id="btnCancelarEliminarCatalogo">Cancelar</button>
            </div>

        </form>
    </div>

    <?php  include "template/footer.php" ?>