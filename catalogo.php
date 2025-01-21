<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/catalago.css">
</head>

<body class="body_catalogo">
    <?php
        include_once("template/header.php");
    ?>
    <main class="catalogo_main">
        <a href="catalogo.php" class="titulo-catalogo">Catálogo</a>
        <div class="contenedor-catalago">
        <?php
        include_once("controllers/userCatalogo.php");
        ?>
            <!-- Agregar más ítems aquí si es necesario -->
        </div>
    </main>

    <script src="js/index.js"></script>
    

</body>
</html>

