<?php
session_start();
if(isset($_SESSION['id'])){
    if($_SESSION['admin']!=1){
        header("location: ../index.php");
    }
}else{
    header("location: ../login.php");
}

if(is_numeric($_POST['pedido'])){
    $pedido_id = $_POST['pedido'];
    include_once("../../libs/database.php");
    $sysdb = new Database();
    if(isset($_POST['aceptar'])){
        $aceptar=$sysdb->productoConfirmar($pedido_id);
        if($aceptar){
            header("location: ../compras.php?s=".urldecode("Se ha verificado exitosamente el pedido"));
        }else{
            header("location: ../compras.php?c=".urldecode("No se ha podido verificar el pedido"));
        }

    }elseif(isset($_POST['rechazar'])){
        $rechazar=$sysdb->productoRechazar($pedido_id);
        if($rechazar){
            header("location: ../compras.php?s=".urldecode("Se ha rechazado exitosamente el pedido"));
        }else{
            header("location: ../compras.php?c=".urldecode("No se ha podido rechazado el pedido"));
        }
    
    }else{
        header("location: ../compras.php");
    }
    
}else{
    header("location: ../compras.php");
}
?>