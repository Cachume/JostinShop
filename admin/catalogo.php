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
        <?php
            if (isset($_GET['s']) || isset($_GET['e'])) {
                $class = isset($_GET['s']) ? "success" : "error";
                $message = isset($_GET['s']) ? htmlspecialchars($_GET['s']) : htmlspecialchars($_GET['e']);
                echo "<span class='$class'>$message</span>";
            }
        ?>
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
                <?php
                include_once("../libs/database.php");
                $sysdb= new Database();
                $catalogo= $sysdb->getCatalogo();
                if($catalogo){
                    //var_dump($catalogo);
                    foreach ($catalogo as $value) {
                        $id=$value['id_categoria'];
                        $nombre=$value['nombre_categoria'];
                        $total=$value['total_productos'];
                        echo('<tr class="tr_fila">');
                        echo('<td><a href="productos.php?c='.$id.'">'.$nombre.'</a></td>');
                        echo("<td><strong>".$total."</strong></td>");
                        echo("<td class='td_acciones'>");
                        echo('<a href="" class="editar"><img src="../src/editar.png" alt=""></a>');
                        echo(' <a href="" class="eliminar"><img src="../src/eliminar.png" alt=""></a>');
                        echo('</td>');
                        echo('</tr>');
                    }
                }
                 ?>    
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
            <!-- <label for="descripciontema">Ingresa la descripcion del catalogo:</label>
            <textarea name="descripcioncatalogo" id="" cols="30" rows="10"></textarea> -->
            <label for="imagen_catalogo">Ingresa la imagen del catalogo:</label>
            <input type="file" name="imagen_catalogo" id="">
            <div class="form_botones">
                <button type="submit" name="addProducto">Añadir</button>
                <button class="boton_rojo" id="closev" type="button" ">Cerrar</button>
            </div>
        </form>
    </div>
    <script src="admin.js"></script>
</body>
</html>

