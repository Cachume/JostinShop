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
                    <h1>Recuperar Contraseña</h1>
                    <p>Hola amigo. Ingresa tus datos para Recuperar tu contraseña!</p>                    
                </div>
                <div class="auth-input">
                    <input type="text" name="useremail" id="email"  placeholder="Correo Electronico:">
                    <span></span>
                </div>
                <a href="login.php">Ya tengo una cuenta</a>
                <button type="submit">Recuperar Contraseña</button>
            </form>
            <div class="auth-info">
            <h2>¡Importante!</h2>
            <p>🔹 Usa un correo electrónico válido, recibirás un código de confirmación.</p>
            <p>✅ Tus datos estarán seguros con nosotros.</p>
            </div>
        </div>
    </main>
    <script src="js/register.js"></script>
</body>
</html>