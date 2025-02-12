<?php
if(isset($_GET['c']) and isset($_GET['p'])){
    $c = $_GET['c'];
    $p = $_GET['p'];

    if(ctype_digit($c) && ctype_digit($p)){
        include_once("./libs/database.php");
        $sysdb= new Database();
        // Ambos valores son solo números
        $c = intval($c);
        $p = intval($p);
        $producto = $sysdb->getProducto($p);
        if(!$producto){
            echo "No hay productos con ese id."; 
            header("location:catalogo.php");
        }
    } else {
        echo "Los parámetros deben ser solo números.";
        header("location:catalogo.php");
    }
}else{
    echo("Error en el url");
    header("location:catalogo.php");
}
?>