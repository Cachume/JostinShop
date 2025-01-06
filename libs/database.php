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
        public function RegisterUser(String $email, int $dni, String $uspass):bool{
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
                return false;
            } 
        }

        public function __destruct(){
            $this->dbc->close();
        }

    }

// $base = new Database();
// if($base->checkData("email","albertq703@gmail.com",false)){
//     echo("existe");
// }else{
//     echo("No existe");
// }

?>