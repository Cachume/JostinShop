<?php
if(isset($_POST['authlogin'])){
    $errors = [];

    if (empty($_POST["useremail"])) {
        $errors[] = "El campo de correo electrónico no puede estar vacío.";
    }

    if (empty($_POST["userpass"])) {
        $errors[] = "El campo de cédula de identidad no puede estar vacío.";
    }
    var_dump($errors);
    if (empty($errors)) {
        echo "Verificando";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
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
            <form action="" method="post">
                <div class="auth-title">
                    <img src="src/login.png" alt="" srcset="">
                    <h1>Inicio de Sesión</h1>
                    <p>Hola amigo. Ingresa tus datos para Continuar!</p>
                    <?php
                    if(!empty(($errors))){
                        echo "<span class='error-form'>Error enviando el formulario revisa los campos.</span>";
                    }
                ?>
                    
                </div>
                <div class="auth-input">
                    <input type="email" name="useremail" id="" placeholder="Correo Electronico:" >
                    <span></span>
                </div>
                <div class="auth-input">
                    <input type="password" name="userpass" id="" placeholder="Contraseña:">
                    <span></span>
                </div>
                <a href="register.html">¿No tienes una Cuenta?</a>
                <button type="submit" name="authlogin">Continuar</button>
            </form>
            <div class="auth-info">
                <img src="" alt="" srcset="">
            </div>
        </div>
    </main>
</body>
</html>