<?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    session_start();
    function validarPedido($input) {
        // 1️⃣ Validar nombre
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,50}$/", $input['nombre'])) {
            return "El nombre solo puede contener letras y espacios (2-50 caracteres).";
        }
    
        // 2️⃣ Validar apellido
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,50}$/", $input['apellido'])) {
            return "El apellido solo puede contener letras y espacios (2-50 caracteres).";
        }
    
        // 3️⃣ Validar teléfono (debe tener entre 10 y 11 dígitos)
        if (!preg_match("/^[0-9]{10,11}$/", $input['telefono'])) {
            return "El teléfono debe contener entre 10 y 11 números.";
        }
    
        // 4️⃣ Validar referencia de pago (alfanumérica, 6-20 caracteres)
        if (!preg_match("/^[a-zA-Z0-9]{6,20}$/", $input['referencia'])) {
            return "La referencia de pago debe ser alfanumérica y tener entre 6 y 20 caracteres.";
        }
    
        // 5️⃣ Validar carrito (JSON válido)
        $cart = json_decode($input['carrito'], true);
        if ($cart === null) {
            return "El carrito no tiene un formato válido.";
        }
    
        // 6️⃣ Verificar que cada producto en el carrito tenga los datos correctos
        foreach ($cart as $item) {
            if (!isset($item['id_producto']) || !is_numeric($item['id_producto'])) {
                return "Error en el carrito: ID de producto inválido.";
            }
            if (!isset($item['cantidad']) || !is_numeric($item['cantidad']) || $item['cantidad'] <= 0) {
                return "Error en el carrito: La cantidad debe ser mayor a 0.";
            }
            if (!isset($item['precio']) || !is_numeric($item['precio']) || $item['precio'] < 0) {
                return "Error en el carrito: El precio no puede ser negativo.";
            }
        }
    
        return true; // Si todo está bien
    }
    function validarImagen($image) {
        // Verificación de si se proporcionó una imagen
        if ($image['error'] === UPLOAD_ERR_NO_FILE) {
            return "No se ha subido ninguna imagen.";
        }
    
        // Validación de la imagen
        if ($image['error'] !== UPLOAD_ERR_OK) {
            return "Hubo un error al subir la imagen.";
        }
    
        // Validación del tipo de imagen (solo jpg, jpeg y png permitidos)
        $allowedTypes = ['image/jpeg', 'image/png'];
        if (!in_array($image['type'], $allowedTypes)) {
            return "Solo se permiten imágenes en formato JPG, JPEG o PNG.";
        }
    
        // Validación del tamaño de la imagen (máximo 2MB)
        if ($image['size'] > 2 * 1024 * 1024) {
            return "El tamaño de la imagen no debe exceder los 2MB.";
        }
        return true;
    }
    

    $input = [
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'telefono' => $_POST['telefono'],
        'referencia' => $_POST['referencia-pago'],
        'carrito' => $_POST['cart'],
        'metodo' => $_POST['pago']
    ];
    // var_dump($input);
    // exit();

    $validador = validarPedido($input);
    $validadorImagen = validarImagen($_FILES['comprobante-pago']);
    if ($validador === true && $validadorImagen === true) {
        include_once("../libs/database.php");
        $sysdb= new Database();
        $fecha= new Datetime();
        $fullname= $input['nombre']." ".$input['apellido'];
        $foto_temp=$_FILES['comprobante-pago']['tmp_name'];
        $hora_actual=$fecha->format('YmdHis');
        $nombre_foto=$hora_actual."__".$_FILES['comprobante-pago']['name'];
        $pedidocon = $sysdb->createPedido($_SESSION['id'],$fullname,$input['telefono'],$_POST['usd'],$_POST['bs'],$input['referencia'],$nombre_foto,$input['carrito'],$input['metodo']);
        if($pedidocon === true){
            try {
                move_uploaded_file($foto_temp,"../src/comprobantes/".$nombre_foto);
            } catch (Exception $th) {
                echo($th->getMessage());
                echo "<script>alert('".$th->getMessage()."');</script>";
                exit();
            }
            header("location:../pedidos.php?s=".urlencode("Se ha creado tu pedido con exito, Proximamente nos pondremos en contacto contigo."));
        }else{
            header("location:../pedidos.php?e=".urlencode("No se ha podido completar tu pedido, intenta mas tarde"));
        }        
    } else {
        $error = $validador !== true ? $validador : $validadorImagen;
        header("location: ../carrito.php?e=".urlencode($error));
    }
?>