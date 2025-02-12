<?php
if(isset($_SESSION['id'])){
    if($_SESSION['admin']!=1){
        header("location: ../index.php");
    }
}else{
    header("location: ../login.php");
}
if(isset($_POST['addCatalogo'])){
    include_once("../libs/database.php");
    $sysdb= new Database();
    $nombre_catalogo=$_POST['nombrecatalogo'];
    $descripcion_catalogo=$_POST['descripcioncatalogo'];

    $fotosize=$_FILES['imagen_catalogo']['size'];
    //Se almacena el tipo de imagen
    $foto=$_FILES['imagen_catalogo']['type'];
    //Dividimos el nombre de la imagen por el separador / para acceder solo al tipo de imagen
    $typeimg= explode("/",$foto);
    if($typeimg[1]== "jpeg" or $typeimg[1] == "png" or $typeimg[1] == "jpg"){
        if($fotosize <= 2000000){
            $fecha= new Datetime();
            // echo $fecha->format('Y-m-d_H:i:s');
            $foto_temp=$_FILES['imagen_catalogo']['tmp_name'];
            $hora_actual=$fecha->format('YmdHis');
            $nombre_foto=$hora_actual."__".$_FILES['imagen_catalogo']['name'];
            echo $nombre_foto;
            if($sysdb->insertCatalogo($nombre_catalogo,$nombre_foto)){
                try {
                    move_uploaded_file($foto_temp,"../src/catalogo/".$nombre_foto);
                } catch (Exception $th) {
                    echo($th->getMessage());
                    echo "<script>alert('".$th->getMessage()."');</script>";
                    exit();
                }
                header("location:catalogo.php?s=Se ha creado exitosamente el catalogo.");
            }else {
                header("location:catalogo.php?e=No se ha podido crear el catalogo.");

            }

        }else{
            header("location:catalogo.php?e=La imagen sobrepasa los 2MB");
        }
    }else{
        header("location:catalogo.php?e=Solo se aceptan archivos tipo png/jpg");
    }
    echo("<br>".$nombre_catalogo."<br>".$imagen."<br>".$descripcion_catalogo);
    exit();
}

?>