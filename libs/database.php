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
        public function __destruct(){
            $this->dbc->close();
        }
    }
// $base = new Database();
// if($base->buyProducto(1,5,4)){
//     echo("existe");
// }else{
//    echo("No existe");
// }
?>