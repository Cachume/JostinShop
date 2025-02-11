<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    function validateInput($input) {
        if (strlen($input['nombre']) < 3) {
            return "El nombre del producto debe tener al menos 3 caracteres.";
        }

        if (strlen($input['descripcion']) < 10) {
            return "La descripción del producto debe tener al menos 10 caracteres.";
        }

        if (!is_numeric($input['precio']) || $input['precio'] <= 0) {
            return "El precio del producto debe ser un número positivo.";
        }

        if (!is_numeric($input['stock']) || $input['stock'] < 0 || floor($input['stock']) != $input['stock']) {
            return "El stock del producto debe ser un número entero no negativo.";
        }

        return true;
    }

    function validateImage($image) {
        if ($image['error'] === UPLOAD_ERR_NO_FILE) {
            return true; // No se subió una imagen, por lo que no es obligatorio validarla.
        }

        if ($image['error'] !== UPLOAD_ERR_OK) {
            return "Hubo un error al subir la imagen.";
        }

        $allowedTypes = ['image/jpeg', 'image/png'];
        if (!in_array($image['type'], $allowedTypes)) {
            return "Solo se permiten imágenes en formato JPG, JPEG o PNG.";
        }

        if ($image['size'] > 2 * 1024 * 1024) {
            return "El tamaño de la imagen no debe exceder los 2MB.";
        }

        return true;
    }

    if (isset($_POST['addProducto'])) {
        echo "Entró a modificar producto <br>";
        
        $input = [
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'precio' => $_POST['precio'],
            'stock' => $_POST['stock'],
            'c' => $_POST['c']
        ];
        $image = $_FILES['imagen'];

        $validador = validateInput($input);
        $validadorImagen = validateImage($image);

        if ($validador === true && $validadorImagen === true) {
            include_once("../../libs/database.php");
            $sysdb = new Database();
            echo "Todo correcto";

            // Si se subió una imagen, procesarla
            $nombre_foto = null;
            if ($image['error'] !== UPLOAD_ERR_NO_FILE) {
                $fecha = new DateTime();
                $foto_temp = $_FILES['imagen']['tmp_name'];
                $hora_actual = $fecha->format('YmdHis');
                $nombre_foto = $hora_actual . "__" . $_FILES['imagen']['name'];

                try {
                    move_uploaded_file($foto_temp, "../../src/producto/" . $nombre_foto);
                } catch (Exception $th) {
                    echo($th->getMessage());
                    echo "<script>alert('" . $th->getMessage() . "');</script>";
                    exit();
                }
            }

            // Insertar el producto en la base de datos (si hay imagen, la incluye)
            if ($nombre_foto) {
                $result = $sysdb->modificarproducto($input['nombre'], $nombre_foto, $input['descripcion'], $input['precio'], $input['stock'],intval($input['c']));
            } else {
                $result = $sysdb->modificarproducto($input['nombre'], false, $input['descripcion'], $input['precio'], $input['stock'],intval($input['c']));
            }

            if ($result) {
                header("Location: ../productos.php?p=" . $input['c'] . "&s=" . urlencode("Producto Modificado Correctamente"));
            } else {
                echo "Error modificando el producto";
            }
        } else {
            $error = $validador !== true ? $validador : $validadorImagen;
            header("Location: ../productos.php?p=" . $input['c'] . "&e=" . urlencode($error));
            exit();
        }
    }
}
?>
