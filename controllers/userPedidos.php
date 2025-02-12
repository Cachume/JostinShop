<?php
include_once("libs/database.php");
$sysdb= new Database();

if(!isset($_GET['pedido'])){
    $pedidos = $sysdb->getPedidosuser($_SESSION['id']);
    if($pedidos){
    foreach ($pedidos as $value) {
        $id=$value['id'];
        $referencia = $value['pago_referencia'];
        $metodo_pago = $value['pago_tipo'];
        $fecha = $value['creado'];
        $estado = $value['pago_estado'];

    
        echo '<div class="pedido_item">';
        echo "<img src='./src/$estado.png' alt='' srcset=''>";
        echo "<span class='pedido_referencia'> Referencia: <strong>$referencia</strong></span>";
        echo "<span class='pedido_metodo'>Metodo de Pago: <strong>$metodo_pago</strong></span>";
        echo "<span class='pedido_estado'>Estado del pedido: <strong class='$estado'>$estado</strong></span>";
        echo "<a href='pedidos.php?pedido=$id' class='pedido_ver'>Mas Detalles</a>";
        echo '</div>';

    }
}
    }else{
            if (ctype_digit($_GET['pedido'])){
                $pedidourl=intval(($_GET['pedido']));
                $pedidos = $sysdb->getPedido($pedidourl);
                if($pedidos['id_usuario'] != $_SESSION['id']){
                    header("location:pedidos.php");
                }
                $pedidos_productos = $sysdb->getPedidosbuy($pedidos['id']);
                $nombre = $pedidos['nombre_completo'];
                $telefono = $pedidos['telefono'];
                $referencia = $pedidos['pago_referencia'];
                $imagen_capture = $pedidos['pago_imagen'];
                $cedula = $pedidos['cdi'];
                $correo = $pedidos['email'];
               // echo $pedidos['id_usuario'].$_SESSION['id'];
                
                //var_dump($pedidos);
    
                echo "
                <div class='compra_info'>
                    <h2>Detalles de la Compra</h2>
                    <div class='detalles-compra'>
                        <p><strong>Nombre Completo:</strong> <span id='nombres'>$nombre</span></p>
                        <p><strong>Teléfono:</strong> <span id='telefono'>$telefono</span></p>
                        <p><strong>Cédula/RIF:</strong> <span id='cedula'>$cedula</span></p>
                        <p><strong>Correo:</strong> <span id='correo'>$correo</span></p>
                        <p><strong>COMPRAS REALIZADAS:</strong></p>
                        <ul id='compras'>";
                foreach ($pedidos_productos as $compra) {
                    echo "<li>".$compra['nombre_producto']."<strong> X </strong>".$compra['cantidad']."= ".$compra['precio']*$compra['cantidad']."$</li>";
                }
                echo "</ul>
                <p><strong>Identificador de compra:</strong> <span id='referencia'>$referencia</span></p>
                <p><strong>Capture:</strong></p>
                <img id='capture' src='src/comprobantes/$imagen_capture' alt='Captura de la Compra'>
                </div>
                </div>";
    
            }else{
                header("location:../compras.php");
            }
    }