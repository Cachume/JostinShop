<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
        function validateInput($input) {
            // Validación del nombre (mínimo 3 caracteres)
            if (strlen($input['nombre']) < 3) {
                return  "El nombre del producto debe tener al menos 3 caracteres.";
            }
        
            // Validación de la descripción (mínimo 10 caracteres)
            if (strlen($input['descripcion']) < 10) {
                return  "La descripción del producto debe tener al menos 10 caracteres.";
            }
        
            // Validación del precio (debe ser un número positivo)
            if (!is_numeric($input['precio']) || $input['precio'] <= 0) {
                return  "El precio del producto debe ser un número positivo.";
            }
        
            // Validación del stock (debe ser un número entero no negativo)
            if (!is_numeric($input['stock']) || $input['stock'] < 0 || floor($input['stock']) != $input['stock']) {
                return "El stock del producto debe ser un número entero no negativo.";
            }
            return true;
        }

        function validateImage($image) {
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
  
        if (isset($_POST['addProducto'])) {
            echo "entro a addProducto <br>";
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
                $sysdb= new Database();
                echo "todo correcto";
                $fecha= new Datetime();
                $foto_temp=$_FILES['imagen']['tmp_name'];
                $hora_actual=$fecha->format('YmdHis');
                $nombre_foto=$hora_actual."__".$_FILES['imagen']['name'];
                echo $nombre_foto;
                if($sysdb->insertProducto($input['nombre'],
                $nombre_foto,$input['descripcion'],
                $input['precio'],$input['stock'],$input['c'])){
                    try {
                        move_uploaded_file($foto_temp,"../../src/producto/".$nombre_foto);
                    } catch (Exception $th) {
                        echo($th->getMessage());
                        echo "<script>alert('".$th->getMessage()."');</script>";
                        exit();
                    }
                    header("Location: ../productos.php?c=" . $input['c']."&s=".urlencode( "Producto Creado Correctamente"));
                }else{
                    echo "error creando los productos";
                }
                // Aquí puedes agregar el código para continuar con la lógica si todo es correcto
            } else {
                $error = $validador !== true ? $validador : $validadorImagen;
                header("Location: ../productos.php?c=" . $input['c'] . "&e=" . urlencode($error));
                exit();
            }
        }
    }
?>