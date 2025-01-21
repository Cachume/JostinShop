<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Carrito de Compras</title>
</head>
<body>
<?php include_once("template/header.php");
    if(!isset($_SESSION['id'])){
        header("location:login.php");
    }

    ?>
    <main class="carrito_main">
        <div class="carrito_informacion">
            <img src="src/nocarrito.png" alt="" srcset="">
            <span>El Carrito no se encuentra Disponible</span>

        </div>
        <div class="carrito_box" id="carrito">
            <h2 class="carrito_title">Carrito de Compras</h2>
            <div class="product">
                <strong>Manzana Roja</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
              
              <div class="product">
                <strong>Leche Entera 1L</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
              
              <div class="product">
                <strong>Pan de Molde</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
              
              <div class="product">
                <strong>Arroz Blanco 1Kg</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
              
              <div class="product">
                <strong>Azúcar 500g</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
              
              <div class="product">
                <strong>Huevos (Docena)</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
              
              <div class="product">
                <strong>Queso Fresco 500g</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
              
              <div class="product">
                <strong>Pollo Entero</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
              <div class="product">
                <strong>Pollo Entero</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
              <div class="product">
                <strong>Pollo Entero</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
              <div class="product">
                <strong>Pollo Entero</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
              <div class="product">
                <strong>Pollo Entero</strong>
                <div class="product_info">
                    <span>$1.20</span>
                    <a href="" class="item_delete"><img src="./src/eliminar.png" alt="" srcset=""></a>
                </div>
              </div>
            <div class="total">
                Total: $25.00
            </div>
        </div>
            <!-- Botón de completar compra -->
            <div class="section" id="boton-compra">
                <button type="submit">Completar Compra</button>
            </div>
    </main>
</body>
</html>
