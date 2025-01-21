<?php
    include_once("../controllers/adminCatalogo.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="barra-lateral">
        <h2>Maak Store</h2>
        <ul>
            <li><a href="#"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Usuarios</a></li>
            <li><a href="#"><i class="fas fa-box-open"></i> Catalogo</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i> Compras</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Ajustes</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
        </ul>
    </div>
    <div class="contenido-principal">
        <header>
            <h2>Gestión de Catalogos</h2>
            <div class="perfil-usuario">
                <img src="https://cdn-icons-png.flaticon.com/512/6073/6073873.png" width="100" alt="Foto de Usuario">
                <div>
                    <h4>Andy Palma</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>
        <main class="admin_catalogo_main">
            <table class="tabla_catalogo">
                <thead>
                    <tr>
                        <td>Nombre del Catalogo</td>
                        <td>N° de Productos</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="tr_fila">
                        <td><a href="catalogo.php?c=12">Camisetas</a></td>
                        <td><strong>3</strong></td>
                        <td class="td_acciones">
                            <a href="" class="editar"><img src="../src/editar.png" alt=""></a>
                            <a href="" class="eliminar"><img src="../src/eliminar.png" alt=""></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="nuevo_catalogo" colspan="3">
                            <button id="btncatalogo">Agregar Nuevo Catalogo</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
    <div class="ventanatema" id="ventanatema">
        <div class="fondotema" id="fondotema"></div>
        <form action="catalogo.php" method="post" enctype="multipart/form-data">
            <h2>Añadir Catalogo</h2>
            <label for="nombretema">Ingresa el nombre del catalogo:</label>
            <input type="text" name="nombrecatalogo" id="">
            <label for="descripciontema">Ingresa la descripcion del catalogo:</label>
            <textarea name="descripcioncatalogo" id="" cols="30" rows="10"></textarea>
            <label for="imagen_catalogo">Ingresa la imagen del catalogo:</label>
            <input type="file" name="imagen_catalogo" id="">
            <div class="form_botones">
                <button type="submit" name="addCatalogo">Añadir</button>
                <button class="boton_rojo" id="closev" type="button" ">Cerrar</button>
            </div>
        </form>
    </div>
    <script src="admin.js"></script>
</body>
</html>

