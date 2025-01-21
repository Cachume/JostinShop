<?php
    class Database{

        private $hostname = "localhost";
        private $username = "root";
        private $passwordb = "";
        private $dbname = "tiendamak";
        private $dbc;



        public function __CONSTRUCT(){
            try {
                $this->dbc = new mysqli("localhost","root","","tiendamak");
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

        public function __destruct(){
            $this->dbc->close();
        }

    }

// $base = new Database();
// if($base->insertCatalogo("Xbox","hola.png")){
//     echo("existe");
// }else{
//    echo("No existe");
// }

?>