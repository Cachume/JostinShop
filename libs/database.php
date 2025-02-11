<?php
    class Database{

        private $hostname = "localhost";
        private $username = "root";
        private $passwordb = "";
        private $dbname = "tiendamak";
        private $dbc;

        public function __CONSTRUCT(){
            try {
                $this->dbc = new mysqli("localhost","root","","tiendamak",3310);
            } catch (Exception $th) {
                echo($th->getMessage());
            }
        }

        public function checkData(String $colum, String $data, bool $isNumber):bool{
            $query=$this->dbc->prepare("SELECT $colum FROM clientes WHERE $colum=?");
            if($isNumber){
                $data=intval($data);
                $query->bind_param('i',$data);
            }else{
                $query->bind_param('s', $data);
            }
            $query->execute();
            $results=$query->get_result();
            if($results->num_rows > 0){
                return true;
            }else{
                return false;
            }
        }
        public function RegisterUser(String $email, int $dni, String $uspass){
            try {
                $query = $this->dbc->prepare("INSERT INTO `clientes`(`cdi`, `email`, `password`) VALUES (?,?,?)");
                $hash= password_hash($uspass, PASSWORD_BCRYPT);
                $query->bind_param('iss',$dni,$email,$hash);
                $query->execute();
                if($query->affected_rows > 0){
                    return true;
                }else{
                    return false;
                }
            } catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }
        public function iniciarSesion($correo,$contrasena){
            try {
                $query= $this->dbc->prepare("SELECT id, cdi, email, password FROM `clientes` WHERE email= ?");
                $query->bind_param('s',$correo);
                $query->execute();
                $resultado= $query->get_result();
                if($resultado->num_rows > 0){
                $datosuser=$resultado->fetch_assoc();
                if (password_verify($contrasena,$datosuser['password'])) {
                        return $datosuser;
                }else{
                        return false;
                }
                }else{
                    return false;
                }
            }catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }

        public function getCatalogo(){
            try {
                $query = $this->dbc->prepare("SELECT c.*, (SELECT COUNT(*) FROM productos p WHERE p.id_categoria= c.id_categoria) AS total_productos FROM catalogo c");
                $query->execute();
                $resultado = $query->get_result();
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    // echo("No hay datos");
                    return false;
                }
            }catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }

        public function getProductos(int $producto){
            try {
                $query = $this->dbc->prepare("SELECT * FROM productos WHERE id_categoria=?");
                $query->bind_param('i',$producto);
                $query->execute();
                $resultado = $query->get_result();
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    // echo("No hay datos");
                    return false;
                }
            }catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }

        public function insertCatalogo(string $nombre, string $imagen){
            try {
                $query= $this->dbc->prepare("INSERT INTO catalogo (nombre_categoria, imagen_categoria) VALUES (?,?)");
                $query->bind_param("ss",$nombre,$imagen);
                $query->execute();
                if($query->affected_rows > 0){
                    return true;
                }else{
                    return false;
                }
            } catch (Exception $th) {
                echo($th->getMessage());
                echo "<script>alert('".$th->getMessage()."');</script>";
                return 'E82';
            } 
        }

        public function getProducto(int $producto){
            try {
                $query = $this->dbc->prepare("SELECT * FROM productos WHERE id_producto=?");
                $query->bind_param('i',$producto);
                $query->execute();
                $resultado= $query->get_result();
                if($resultado->num_rows > 0){
                    $datosuser=$resultado->fetch_assoc();
                    return $datosuser;
                }else{
                    return false;
                }
            }catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }

        public function buyProducto(int $producto, int $usuario, int $cantidad){
            try {
                $this->dbc->begin_transaction();
                $queryUpdate=$this->dbc->prepare("UPDATE productos SET stock = stock-? WHERE id_producto=?");
                $queryUpdate->bind_param("ii",$cantidad,$producto);
                $queryUpdate->execute();

                if ($queryUpdate->affected_rows === 0) {
                    throw new Exception("Error al actualizar el inventario.");
                }

                $queryInsert=$this->dbc->prepare("INSERT INTO carrito (id_usuario, id_producto, cantidad) VALUES (?,?,?)");
                $queryInsert->bind_param("iii",$usuario,$producto,$cantidad);
                $queryInsert->execute();

                if ($queryInsert->affected_rows === 0) {
                    throw new Exception("Error al crear la compra.");
                }

                $this->dbc->commit();
                return true;
            } catch (Exception $e) {
                // Revertir la transacción en caso de error
                $this->dbc->rollback();
                echo $e->getMessage();
                return false; // Operación fallida
            }
        }

        public function insertProducto(string $nombre, string $imagen, string $descripcion,float $precio, int $stock, int $categoria){
            try {
                $query= $this->dbc->prepare("INSERT INTO productos (nombre_producto, descripcion_producto, imagen_producto, precio, stock, id_categoria) 
                VALUES (?,?,?,?,?,?)");
                $preciof = floatval($precio);
                $query->bind_param("sssdii",$nombre,$descripcion,$imagen,$preciof,$stock,$categoria);
                $query->execute();
                if($query->affected_rows > 0){
                    return true;
                }else{
                    return false;
                }
            } catch (Exception $th) {
                echo($th->getMessage());
                echo "<script>alert('".$th->getMessage()."');</script>";
                return 'E82';
            } 
        }

        public function getPreciodolar(){
            try {
                $query = $this->dbc->prepare("SELECT * FROM precio_dolar ORDER BY id DESC LIMIT 1; ");
                $query->execute();
                $resultado= $query->get_result();
                if($resultado->num_rows > 0){
                    // var_dump($resultado->fetch_assoc());
                    $dolar =$resultado->fetch_assoc();
                    return $dolar;
                }else{
                    return false;
                }
            } catch (Exception $th) {
                echo($th->getMessage());
                echo "<script>alert('".$th->getMessage()."');</script>";
                return 'E82';
            } 
        }

        public function updatePreciodolar(float $precio){
            try {
                $query = $this->dbc->prepare("INSERT INTO precio_dolar (precio) VALUES (?)");
                $query->bind_param('d', $precio);
                $query->execute();
                if($query->affected_rows > 0){
                    return true;
                }else{
                    return false;
                }
            } catch (Exception $th) {
                echo($th->getMessage());
                echo "<script>alert('".$th->getMessage()."');</script>";
                return 'E82';
            }  
        }

        public function getCarrito(int $usuario){
            try {
                $query= $this->dbc->prepare(
                    "SELECT p.nombre_producto, p.imagen_producto,p.precio,p.id_producto ,c.cantidad 
                    FROM carrito c
                    JOIN productos p ON c.id_producto = p.id_producto
                    WHERE c.id_usuario = ?;
                    ");
                $query->bind_param("i",$usuario);
                $query->execute();
                $resultado = $query->get_result();
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    // echo("No hay datos");
                    return false;
                }
            }catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }

        public function createPedido($uid,$fullname,$phone,$tusd,$tbs,$pr,$pi,$carrito_json,$pago){
            try {
                $this->dbc->begin_transaction();
                $sql="INSERT INTO pedidos (id_usuario,nombre_completo,telefono,total_bs,total_usd,pago_referencia,pago_imagen,pago_tipo)
                VALUES (?,?,?,?,?,?,?,?)";
                $pedido = $this->dbc->prepare($sql);
                $pedido->bind_param("issddsss",$uid,$fullname,$phone,$tbs,$tusd,$pr,$pi,$pago);
                $pedido->execute();
                $pedido_id=$pedido->insert_id;
                $pedido->close();

                $carrito= json_decode($carrito_json, true);
                //Insertar los productos en la tabla pedidos items
                $sql="INSERT INTO pedidos_items (id_pedidos, id_producto, cantidad, precio)
                VALUES (?,?,?,?)";
                $pedidoitem = $this->dbc->prepare($sql);
                foreach ($carrito as $item) {
                    $pedidoitem->bind_param("iiid", $pedido_id, $item['id_producto'], $item['cantidad'], $item['precio']);
                    $pedidoitem->execute();
                }
                $pedidoitem->close();
                $this->dbc->query("DELETE FROM carrito WHERE id_usuario = $uid");
                $this->dbc->commit();
                return true;
            }catch (Exception $e) {
                // Revertir transacción en caso de error
                $this->dbc->rollback();
                echo "Error al guardar el pedido: " . $e->getMessage();
                return false;
            }
        }

        public function getPedidos(){
            try {
                $query = $this->dbc->prepare("SELECT * FROM pedidos");
                $query->execute();
                $resultado = $query->get_result();
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    // echo("No hay datos");
                    return false;
                }
            }catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }

        public function getPedido($pid){
            try {
                $query = $this->dbc->prepare("SELECT p.*, u.email, u.cdi FROM pedidos p JOIN clientes u ON p.id_usuario = u.id WHERE p.id=?");
                $query->bind_param("i",$pid);
                $query->execute();
                $resultado= $query->get_result();
                if($resultado->num_rows > 0){
                    // var_dump($resultado->fetch_assoc());
                    $datos =$resultado->fetch_assoc();
                    return $datos;
                }else{
                    // echo("No hay datos");
                    return false;
                }
            }catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }

        public function getPedidosbuy($id){
            try {
                $query = $this->dbc->prepare("SELECT pi.id_producto, prod.nombre_producto, pi.cantidad, pi.precio FROM pedidos_items pi JOIN productos prod ON pi.id_producto = prod.id_producto WHERE pi.id_pedidos =
                ?");
                $query->bind_param('i',$id);
                $query->execute();
                $resultado = $query->get_result();
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    // echo("No hay datos");
                    return false;
                }
            }catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }

        public function getPedidosuser($id){
            try {
                $query = $this->dbc->prepare("SELECT * FROM pedidos WHERE id_usuario=?");
                $query->bind_param('i', $id);
                $query->execute();
                $resultado = $query->get_result();
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    // echo("No hay datos");
                    return false;
                }
            }catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }
        
        public function getContar($tabla){
            try {
                $query = $this->dbc->prepare("SELECT COUNT(*) AS total FROM clientes ");
                //$query->bind_param('s', $tabla);
                $query->execute();
                $resultado = $query->get_result();
                if($resultado->num_rows > 0){
                    $datos =$resultado->fetch_assoc();
                    return $datos;
                }else{
                    // echo("No hay datos");
                    return false;
                }
            }catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }

        public function getTotal(){
            try {
                $query = $this->dbc->prepare("SELECT total_usd FROM `pedidos` WHERE pago_estado = 'verificado'");
                //$query->bind_param('s', $tabla);
                $query->execute();
                $resultado = $query->get_result();
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    // echo("No hay datos");
                    return false;
                }
            }catch (Exception $th) {
                echo($th->getMessage());
                return 'E82';
            } 
        }
        public function productoConfirmar($id){
            try {
                $query = $this->dbc->prepare("UPDATE pedidos SET pago_estado=? WHERE id=?");
                $texto="verificado";
                $query->bind_param('si', $texto,$id);
                $query->execute();
                if($query->affected_rows > 0){
                    return true;
                }else{
                    return false;
                }
            } catch (Exception $th) {
                echo($th->getMessage());
                echo "<script>alert('".$th->getMessage()."');</script>";
                return 'E82';
            }  
        }
        public function productoRechazar($id){
            try {
                $this->dbc->begin_transaction();
                $query = $this->dbc->prepare("UPDATE pedidos SET pago_estado=? WHERE id=?");
                $texto="rechazado";
                $query->bind_param('si', $texto,$id);
                $query->execute();
                
                $pedidos = $this->dbc->prepare("SELECT id_producto, cantidad FROM pedidos_items WHERE id_pedidos = ?");
                $pedidos->bind_param('i',$id);
                $pedidos->execute();
                $resultado = $pedidos->get_result();
                //var_dump($resultado->fetch_all(MYSQLI_ASSOC));
                $dato= $resultado->fetch_all(MYSQLI_ASSOC);
                $carrito = $this->dbc->prepare("UPDATE productos SET stock=+ ? WHERE id_producto = ?");
                foreach ($dato as $value) {
                    $carrito->bind_param('ii',$value['id_producto'],$value['cantidad']);
                    $carrito->execute();
                }

                $eliminar = $this->dbc->prepare("DELETE FROM pedidos_items WHERE id_pedidos=?");
                $eliminar->bind_param('i',$id);
                $eliminar->execute();

                $this->dbc->commit();
                return true;
            }catch (Exception $e) {
                // Revertir transacción en caso de error
                $this->dbc->rollback();
                echo "Error al guardar el pedido: " . $e->getMessage();
                return false;
            }
        }

        public function modificarproducto(string $nombre, string $imagen, string $descripcion,float $precio, int $stock,int $id){
            try {
                $preciof = floatval($precio);
                if(!$imagen){
                    $modi= $this->dbc->prepare("UPDATE productos 
                    SET nombre_producto = ?, 
                        descripcion_producto = ?, 
                        precio = ?, 
                        stock = ? 
                    WHERE id_producto = ?");
                    $modi->bind_param('ssdii',$nombre,$descripcion,$preciof,$stock,$id);
                }else{
                    $modi= $this->dbc->prepare("UPDATE productos 
                    SET nombre_producto = ?, 
                        descripcion_producto = ?, 
                        imagen_producto = ?, 
                        precio = ?, 
                        stock = ? 
                    WHERE id_producto = ?");
                    $modi->bind_param('sssdii',$nombre,$descripcion,$imagen,$preciof,$stock,$id);
                }
                $modi->execute();
                if($modi->affected_rows > 0){
                    return true;
                }else{
                    return false;
                }
            } catch (Exception $th) {
                echo($th->getMessage());
                echo "<script>alert('".$th->getMessage()."');</script>";
                return 'E82';
            } 
        }

        public function deleteProducto($producto){
            try {
                $query = $this->dbc->prepare("DELETE FROM productos WHERE id_producto=?");
                $query->bind_param('i', $producto);
                $query->execute();
                if($query->affected_rows > 0){
                    return true;
                }else{
                    return false;
                }
            } catch (Exception $th) {
                echo($th->getMessage());
                echo "<script>alert('".$th->getMessage()."');</script>";
                return 'E82';
            }  

        }

        public function deleteCatalogo($catalogo){
            try {
                $query = $this->dbc->prepare("DELETE FROM catalogo WHERE id_categoria=?");
                $query->bind_param('i', $catalogo);
                $query->execute();
                if($query->affected_rows > 0){
                    return true;
                }else{
                    return false;
                }
            } catch (Exception $th) {
                echo($th->getMessage());
                echo "<script>alert('".$th->getMessage()."');</script>";
                return 'E82';
            }  

        }

        public function __destruct(){
            $this->dbc->close();
        }
    }
// $base = new Database();
// $base->getPreciodolar();
?>