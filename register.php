<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if (empty($_POST["useremail"])) {
        $errors[] = "El campo de correo electrónico no puede estar vacío.";
    }

    if (empty($_POST["usercdi"])) {
        $errors[] = "El campo de cédula de identidad no puede estar vacío.";
    }

    if (empty($_POST["userpass"])) {
        $errors[] = "El campo de contraseña no puede estar vacío.";
    }

    if (empty($_POST["userpassc"])) {
        $errors[] = "El campo de confirmar contraseña no puede estar vacío.";
    }
    if($_POST["userpass"] != $_POST["userpassc"]) {
        $errors[] = "Error las contraseñas no coinciden.";
    }


    if (count($errors) == 0) {
        // Procesar el formulario, todos los campos están llenos
        include_once("libs/libRegister.php");
        $registro = RegUser($_POST["useremail"],$_POST["usercdi"],$_POST["userpass"]);
        if($registro === true){      
            echo "<script>alert('Formulario enviado correctamente');</script>";
            echo "<p style='color: green;'>Formulario enviado correctamente.</p>";
            header("location:login.php?success=Te has registrado exitosamente");
            
        }else{
            foreach ($registro as $value) {
                $errors[]=$value;
            }
            var_dump($errors);
            echo "<script>alert('Error enviando el formulario');</script>";
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/auth.css">
    <title>Maak Store | Ingreso </title>
</head>
<body>
    <header>
        <div class="header-control">
            <h1>Maak Store</h1>
        </div>
    </header>
    <main class="main-auth">
        <div class="auth-container">
            <form action="" method="post" id="form">
                <div class="auth-title">
                    <img src="src/agregarn.png" alt="" srcset="">
                    <h1>Registro</h1>
                    <p>Hola amigo. Ingresa tus datos para Continuar!</p>
                    <?php
                    if(isset(($errors))){
                        echo "<span class='error-form'>Error enviando el formulario revisa los campos.</span>";
                    }
                ?>
                    
                </div>
                <div class="auth-input">
                    <input type="text" name="useremail" id="email"  placeholder="Correo Electronico:">
                    <span></span>
                </div>
                <div class="auth-input">
                    <input type="number" name="usercdi" id="cdi" placeholder="Cedula de Identidad:" >
                    <span></span>
                </div>
                <div class="auth-input">
                    <input type="password" name="userpass" id="pass" placeholder="Contraseña:" >
                    <span></span>
                </div>
                <div class="auth-input">
                    <input type="password" name="userpassc" id="passc" placeholder="Confirmar Contraseña:" >
                    <span></span>
                </div>
                <a href="login.php">Ya tengo una cuenta</a>
                <button type="submit">Continuar</button>
            </form>
            <div class="auth-info">
            <h2>¡Importante!</h2>
            <p>🔹 Usa un correo electrónico válido, recibirás un código de confirmación.</p>
            <p>🔹 La cédula de identidad debe ser un número sin puntos ni guiones.</p>
            <p>🔹 La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.</p>
            <p>🔹 Confirma tu contraseña correctamente antes de continuar.</p>
            <p>✅ Tus datos estarán seguros con nosotros.</p>
            </div>
        </div>
    </main>
    <script src="js/register.js"></script>
</body>
</html>