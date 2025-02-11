<?php
    include_once("./libs/database.php");
    $sysdb = new Database();
    $dolar = $sysdb->getPreciodolar();
    $total = 0;
    $productos_carrito = [];
    foreach ($sysdb->getCarrito($_SESSION['id']) as $value) {
        $imagen=$value['imagen_producto'];
        $nombre=$value['nombre_producto'];
        $precio=$value['precio'];
        $cantidad=$value['cantidad'];
        echo('<div class="item-carrito">');
        echo("<img src='src/producto/$imagen' alt='Producto' class='imagen-item'>");
        echo(" <div class='detalles-item'>");
        echo("<h2 class='nombre-item'>$nombre</h2>");
        echo("<p class='precio-item'>$$precio <strong>X</strong> $cantidad =$".$precio*$cantidad."</p>");
        echo("<div class='cantidad-item' style='display:none;'>");
        echo("<button class='boton-cantidad menos'>-</button>");
        echo("<input type='text' value='1' class='entrada-cantidad'>");
        echo("<button class='boton-cantidad mas'>+</button>");
        echo("</div>");
        echo("<button class='boton-eliminar'>Eliminar</button>");
        echo("</div>");   
        echo("</div>");
        $total += $precio*$cantidad;
        $productos_carrito[] = [
            "id_producto" => $value['id_producto'],
            "cantidad" => $cantidad,
            "precio" => $precio
        ];
    }        
    $bstotal = $total*$dolar['precio'];
    $productos_json = json_encode($productos_carrito, JSON_UNESCAPED_UNICODE);
?>