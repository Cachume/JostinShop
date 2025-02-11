<?php
 if (isset($_GET['p'])) {
    $valor = $_GET['p'] ?? '';
    if (ctype_digit($valor)) { // Solo números positivos
        $producto = intval($valor);
        include_once("../../libs/database.php");
        $sysdb= new Database();
        $eliminar = $sysdb->deleteProducto($producto);
        if($eliminar){
            header("location:../catalogo.php?s=".urlencode("Se ha eliminado el producto exitosamente"));
        }else{
            header("location:../catalogo.php?e=".urlencode("No se ha eliminado el producto"));
        }
        
    }else{
        header("location:../catalogo.php");
    } 
 }else{
    header("location:../catalogo.php");
 }



?>