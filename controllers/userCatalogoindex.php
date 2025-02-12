<?php
include_once("./libs/database.php");
$sysdb= new Database();
$catalogo = $sysdb->getCatalogosshow();
if($catalogo){
    foreach ($catalogo as $value) {
        $id=$value['id_categoria'];
        $nombre=$value['nombre_categoria'];
        $imagen=$value['imagen_categoria'];      
        echo '<div class="categoria">';
        echo "<img src='src/catalogo/$imagen' alt='Franelas'>";
        echo "<h3><a href='catalogo.php?p=$id' class='link_categoria'>$nombre</a></h3>";
        echo "</div>";
    }
}   
?>
