<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="barra-lateral">
        <h2>Maak Store</h2>
        <ul>
            <li><a href="#"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Usuarios</a></li>
            <li><a href="catalogo.php"><i class="fas fa-box-open"></i> Catalogo</a></li>
            <li><a href="compras.php"><i class="fas fa-shopping-cart"></i> Compras</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Ajustes</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
        </ul>
    </div>
    <div class="contenido-principal">
        <header>
            <h2>Panel de Administrador</h2>
            <div class="perfil-usuario">
                <img src="https://cdn-icons-png.flaticon.com/512/6073/6073873.png" width="100" alt="Foto de Usuario">
                <div>
                    <h4>Andy Palma</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

        <main>
            <div class="tarjetas">
                <div class="tarjeta">
                    <div>
                        <h3>Usuarios Registrados</h3>
                        <p>150</p>
                    </div>
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <div class="tarjeta">
                    <div>
                        <h3>Ventas Mensuales</h3>
                        <p>$12,000</p>
                    </div>
                    <i class="fas fa-dollar-sign fa-2x"></i>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

