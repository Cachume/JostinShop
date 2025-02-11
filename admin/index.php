        <?php 
            include "./template/header.php";
            $sysdb= new Database();
            $total_usuarios = $sysdb->getContar("clientes");
            
        ?>
        
        <main>
            <div class="tarjetas">
                <div class="tarjeta">
                    <div>
                        <h3>Usuarios Registrados</h3>
                        <p><?= $total_usuarios['total'];?></p>
                    </div>
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <div class="tarjeta">
                    <div>
                        <h3>Ventas Mensuales</h3>
                        <p>$12,000</p>
                    </div>
                    <i class="fas fa-dollar-sign fa-2x"></i>
                </div>
            </div>
        </main>
    </div>

    <?php  include "template/footer.php" ?>