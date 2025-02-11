<?php
include_once("./libs/database.php");
$sysdb= new Database();
if (isset($_GET['p'])) {
    $valor = $_GET['p'] ?? ''; // Ejemplo: valor recibido por GET

    // Verificar si es un número válido
    if (ctype_digit($valor)) { // Solo números positivos
        $producto = (int)$valor;
        $catalogo= $sysdb->getProductos($producto);
        if(!$catalogo){
            echo "No hay Productos disponibles";
        }else{
         //var_dump($catalogo);
            foreach ($catalogo as $value) {
            if($value['stock']>0){
                $id=$value['id_producto'];
                $nombre=$value['nombre_producto'];
                $imagen=$value['imagen_producto'];
                $catalogo = $value['id_categoria'];
                echo("<a href='producto.php?c=$catalogo&p=$id'>");
                echo('<div class="item">');
                echo("<img src='./src/producto/$imagen' alt='Camisetas deportivas'>");
                echo("<span>$nombre</span>");
                echo('</div>');
                echo('</a>');
                }
            }
        }
    } else {
        header("location:catalogo.php");
    }
}else{   
    $catalogo= $sysdb->getCatalogo();    
    if(!$catalogo){
        echo "No hay Productos disponibles";
    }else{
     //var_dump($catalogo);
        foreach ($catalogo as $value) {
        $id=$value['id_categoria'];
        $nombre=$value['nombre_categoria'];
        $imagen=$value['imagen_categoria'];
        echo('<a href="catalogo.php?p='.$id.'">');
        echo('<div class="item">');
        echo("<img src='./src/catalogo/$imagen' alt='Camisetas deportivas'>");
        echo("<span>$nombre</span>");
        echo('</div>');
        echo('</a>');
        }
    }
}
?>