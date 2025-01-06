<?php
include_once("database.php");
function RegUser(string $email, string $dni, string $uspass){
    $sysdb= new Database();
    $errors = [];

    #Verificacion de datos
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[] = "Correo electronico no valido";
    }

    if(strlen($dni) != 8){
        $errors[] = "Cedula de Identidad no valida";
    }

    if(strlen($uspass)< 8 or strlen($uspass)>16){
        $errors[] = "La contraseña debe contener minino 8 y maximo 16 caracteres";
    }

    #Verificación de datos en la base de datos
    if($sysdb->checkData("email",$email,false)){
        $errors[] = "El correo electronico se encuentra en uso";
    }

    if($sysdb->checkData("cdi",$dni,true)){
        $errors[] = "Cedula de identidad ya registrada";
    }

    if(count($errors) != 0){
        echo(count($errors));
        return $errors;
    }else{
        if($sysdb->RegisterUser($email,intval($dni),$uspass)){
            return true;
        }else{
            return false;
        }
    }
        
}
?>