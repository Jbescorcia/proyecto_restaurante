<?php
session_start();
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

                $clientesAgrupados = array();

                foreach ($_SESSION['clientes'] as $cliente) {
                    $cedula = $cliente['cedula'];

                    if (isset($clientesAgrupados[$cedula])) {
                        $clientesAgrupados[$cedula][] = $cliente;
                    } else {
                        $clientesAgrupados[$cedula] = array($cliente);
                    }
                }

                echo '<table>';
                echo '<thead><tr><th>Cédula</th><th>       </th><th>Descripcion</th></tr></thead>';
                echo '<tbody>';

                foreach ($clientesAgrupados as $cedula => $clientes) {
                    foreach ($clientes as $cliente) {
                        echo '<tr>';
                        echo '<td>' . $cedula . '</td>';
                        echo '<td>' . $cliente['nombre'] . '</td>';
                        echo '<td>' . $cliente['pedido'] . '</td>';
                        echo '</tr>';
                    }
                }

                echo '</tbody>';
                echo '</table>';
                ?>



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-square-minus"></i> Entendido</button>
                </div>
            </div>
        </div>
    </div>
</div>