<?php
session_start();
if(isset($_SESSION['id'])){
    if($_SESSION['admin']!=1){
        header("location: ../index.php");
    }
}else{
    header("location: ../login.php");
}
 if (isset($_GET['u'])) {
    $valor = $_GET['u'] ?? '';
    if (ctype_digit($valor)) { // Solo números positivos
        $usuario = intval($valor);
        include_once("../../libs/database.php");
        $sysdb= new Database();
        $eliminar = $sysdb->removeAdmin($usuario);
        if($eliminar){
            header("location:../usuarios.php?s=".urlencode("El usuario se ha eliminado como administrador"));
        }else{
            header("location:../usuarios.php?e=".urlencode("No se ha podido quitar el rol administrador al usuario"));
        }
        
    }else{
        header("location:../usuarios.php");
    } 
 }else{
    header("location:../usuarios.php");
 }



?>