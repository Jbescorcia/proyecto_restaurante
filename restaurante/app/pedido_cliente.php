<?php
$clientes = $_SESSION['clientes'];

?>

<div class="modal fade" id="pedido_cliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mostraPedidoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-shop"></i> Pedidos </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1>Pedidos del Cliente </h1>

                <?php

                foreach ($_SESSION['clientes'] as $key => $cliente) {
                ?>
                    <tr>
                        <td><?php echo $cliente['cedula'] ?></td>
                        <td><?php echo $cliente['pedido'] ?></td>
                    </tr>
                <?php
                }
                ?>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-square-minus"></i> Entendido</button>
                </div>
            </div>
        </div>
    </div>
</div>