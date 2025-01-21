<?php
include_once("database.php");

function logUser(string $email, string $password){
    $sysdb= new Database();
    $errors = [];

    #Verificacion de datos
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[] = "Correo electronico no valido";
    }
    
    if(strlen($password)< 8 or strlen($password)>16){
        $errors[] = "La contraseña debe contener minino 8 y maximo 16 caracteres";
    }
    if(count($errors) != 0){
        //echo("ERROR");
        //echo(count($errors));
        return false;
    }else{
        $login =$sysdb->iniciarSesion($email,$password);
        var_dump($login);
        if($login != false){
            session_start();
            $_SESSION['id']=$login['id'];
            $_SESSION['cdi']=$login['cdi'];
            $_SESSION['email']=$login['email'];
            echo("Correcto");
            var_dump($login);
            return true;
        }else{
            echo("ERROR");
            return false;
        }
    }
   
}
?>