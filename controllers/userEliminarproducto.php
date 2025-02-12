<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: ../login.php");
}
 if (isset($_GET['producto'])) {
    $valor = $_GET['producto'] ?? '';
    if (ctype_digit($valor)) { // Solo números positivos
        $producto = intval($valor);
        include_once("../libs/database.php");
        $sysdb= new Database();
        $eliminar = $sysdb->deleteCompra($producto);
        if($eliminar){
            header("location:../carrito.php?s=".urlencode("Se ha eliminado el producto exitosamente"));
        }else{
            header("location:../carrito.php?e=".urlencode("No se ha eliminado el producto"));
        }
        
    }else{
        header("location:../carrito.php");
    } 
 }else{
    header("location:../carrito.php");
 }



?>