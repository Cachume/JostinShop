        <?php 
            include "./template/header.php";
            $sysdb= new Database();
            $total_usuarios = $sysdb->getContar("clientes");
            $total_ventas = $sysdb->getVentas();
            
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
                        <h3>Total Ventas</h3>
                        <p>$ <?=$total_ventas['totalusd']?></p>
                        <p>BS <?=$total_ventas['totalbs']?></p>
                    </div>
                    <i class="fas fa-dollar-sign fa-2x"></i>
                </div>
            </div>
        </main>
    </div>

    <?php  include "template/footer.php" ?>