<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    if(isset($_SESSION['id'])){
        if($_SESSION['admin']!=1){
            header("location: ../index.php");
        }
    }else{
        header("location: ../login.php");
    }
    if(isset($_POST['updatedolar'])){
        if(is_numeric($_POST['tasadolar'])){
            include_once "../../libs/database.php";
            $sysdb = new Database();
            $valor_dolar = floatval($_POST['tasadolar']);
            if($sysdb->updatePreciodolar($valor_dolar)){
                header("location: ../ajustes.php#dolar?s=".urldecode("Precio del dolar cambiado exitosamente"));
            }else{
                header("location: ../ajustes.php#dolar?e=".urldecode("Ha ocurrido un error al actualizar el precio del dolar, intenta mas tarde"));
            }
        }else{
            echo "no puedes ingresar letras o simbolos, solo numeros";
        }
    }else{
        header("location: ../ajustes.php");
    }
}else{
    header("location: ../ajustes.php");
}
?>