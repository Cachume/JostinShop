<?php
    session_start();
    if(isset($_SESSION['id'])){
        if($_SESSION['admin']!=1){
            header("location: ../index.php");
        }
    }else{
        header("location: ../login.php");
    }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cantidad']) && ctype_digit($_POST['cantidad']) && isset($_POST['p']) && ctype_digit($_POST['p']) && isset($_POST['c']) && ctype_digit($_POST['c'])) {
        include_once("../libs/database.php");
        $sysdb= new Database();
        $cantidad = intval($_POST['cantidad']);
        $p = intval($_POST['p']);
        $c = intval($_POST['c']);
        $producto = $sysdb->getProducto($p);
        if(!$producto){
            echo "No hay productos con ese id."; 
            header("location:../catalogo.php?p=$c");
            exit();
        }else{
            var_dump($producto);
            echo "<br>";
            $cantidad_producto = intval($producto['stock']);
            if($cantidad <= $cantidad_producto and $cantidad !== 0){
                $compra_producto = $sysdb->buyProducto($p,$_SESSION['id'],$cantidad);
                if(!$compra_producto){
                    header("location:../producto.php?c=$c&p=$p&error=Error Completando la compra, intente mas tarde.");
                    // var_dump($compra_producto);
                    // exit();
                }else{
                    header("location:../catalogo.php?success=Producto agregado correctamente al carrito.");
                }
            }else{
                header("location:../producto.php?c=$c&p=$p&error=Cantidad solicitada no disponible");
            }
        }

        //echo "Cantidad agregada al carrito: " . $cantidad . ", p: " . $p . ", c: " . $c;
    } else {
        header("location:../catalogo.php");
        exit();
    }
} else {
    header("location:catalogo.php");
    exit();
}
?>