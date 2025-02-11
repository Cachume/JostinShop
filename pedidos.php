<?php include_once("template/header.php");?>
    <main>
    <?php 
           if (isset($_GET['s']) || isset($_GET['e'])) {
                $class = isset($_GET['s']) ? "success" : "error";
                $message = isset($_GET['s']) ? htmlspecialchars($_GET['s']) : htmlspecialchars($_GET['e']);
                echo "<span class='$class'>$message</span>";
            }
        ?>
    </main>
<script src="js/index.js"></script>
</body>
</html>