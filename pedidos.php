<?php include_once("template/header.php");
if(!isset($_SESSION['id'])){
    header("location: login.php");
}
?>
    <main class="pedidos">
        <div class="pedidos_titulo">
        <?php 
           if (isset($_GET['s']) || isset($_GET['e'])) {
                $class = isset($_GET['s']) ? "success" : "error";
                $message = isset($_GET['s']) ? htmlspecialchars($_GET['s']) : htmlspecialchars($_GET['e']);
                echo "<span class='$class'>$message</span>";
            }
        ?>  
            <h1>Historial De Pedidos</h1>
        </div>
        <div class="pedidos_items">
        <?php include('controllers/userPedidos.php');?>
            
        </div>
    </main>
<script src="js/index.js"></script>
</>
</html>