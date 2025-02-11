<?php
session_start();
if(isset($_SESSION['id'])){
    if($_SESSION['admin']!=1){
        header("location: ../index.php");
    }
}else{
    header("location: ../login.php");
}
 if (isset($_GET['c'])) {
    $valor = $_GET['c'] ?? '';
    if (ctype_digit($valor)) { // Solo números positivos
        $catalogo = intval($valor);
        include_once("../../libs/database.php");
        $sysdb= new Database();
        $eliminar = $sysdb->deleteCatalogo($catalogo);
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