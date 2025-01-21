<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/catalago.css">
</head>

<body>
    <header>
     
    </header>

    <main>
        <h3 class="titulo-catalogo">Catálogo</h3>
        <div class="contenedor-catalago">
        <?php
            include_once("libs/database.php");
            $sysdb= new Database();
            $catalogo= $sysdb->getCatalogo();
            if(!$catalogo){
                echo "No hay Productos disponibles";
            }else{
                //var_dump($catalogo);
                foreach ($catalogo as $value) {
                    $id=$value['id_categoria'];
                    $nombre=$value['nombre_categoria'];
                    $imagen=$value['imagen_categoria'];
                    echo('<a href="#">');
                    echo('<div class="item">');
                    echo("<img src='./src/catalogo/$imagen' alt='Camisetas deportivas'>");
                    echo("<span>$nombre</span>");
                    echo('</div>');
                    echo('</a>');
                }
            }
        ?>

            <!-- Agregar más ítems aquí si es necesario -->
        </div>
    </main>

    <script src="js/index.js"></script>
    

</body>
</html>

