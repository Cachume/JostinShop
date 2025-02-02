        <?php 
            include "./template/header.php"
        ?>

        <main>
            <!-- Tabla de Catálogos -->
            <div class="tabla-catalogos">

                <div class="header-tabla">
                    <h2>Lista de Catálogos</h2>
                    <button id="agregarCatalogo" class="btn-agregar">Agregar Catálogo</button>
                </div>

                <table class="tabla_catalogo">

                    <thead>
                        <tr>
                            <td>Nombre del Catálogo</td>
                            <td>Número de Productos</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Datos de ejemplo -->
                        <tr class="tr_fila">
                            <td>Camisas</td>
                            <td>158</td>
                            <td>
                                <button class="editar" onclick="abrirModalEditarCatalogo(1)"><i class="fas fa-edit"></i></button>
                                <button class="eliminar" onclick="abrirModalEliminarCatalogo(1)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr class="tr_fila">
                            <td>Gorras</td>
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

    <!-- Modal para Agregar/Editar Catálogo -->
    <div class="ventanatema" id="modalCatalogo">

        <div class="fondotema"></div>

        <form id="formCatalogo">

            <h2 id="tituloModalCatalogo">Agregar Catálogo</h2>
            <label for="nombreCatalogo">Nombre del Catálogo:</label>
            <input type="text" id="nombreCatalogo" name="nombreCatalogo" required>

            <div class="botones-modal">
                <button type="submit" id="btnGuardarCatalogo">Guardar</button>
                <button type="button" id="btnCancelarCatalogo">Cancelar</button>
            </div>

        </form>
    </div>

    <!-- Modal para Eliminar Catálogo -->
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