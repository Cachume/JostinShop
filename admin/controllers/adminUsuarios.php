<?php
session_start();
if(isset($_SESSION['id'])){
    if($_SESSION['admin']!=1){
        header("location: ../index.php");
    }
}else{
    header("location: ../login.php");
}
    include_once("../libs/database.php");
    $sysdb= new Database();
    $catalogo= $sysdb->getUsuarios();
    if($catalogo){
        //var_dump($catalogo);
        foreach ($catalogo as $value) {
            $id=$value['id'];
            $correo=$value['email'];
            $cdi=$value['cdi'];
            $admin=$value['admin'];
             echo('<tr class="tr_fila">');
             echo("<td>$correo</td>");
             echo("<td>$cdi</td>");
             if($admin == 1){
                echo("<td>Si</td>");
                echo("<td style='display: flex;align-content: center;align-items: center;justify-content: center;'><a href='controllers/eliminarAdmin.php?u=$id' class='adminyes'>Quitar Admin</a></td>");
             }else{
                echo("<td>No</td>");
                echo("<td style='display: flex;align-content: center;align-items: center;justify-content: center;'><a href='controllers/agregarAdmin.php?u=$id' class='adminno'>Dar Admin</a></td>");
             }
             echo('</tr>');

            }
}