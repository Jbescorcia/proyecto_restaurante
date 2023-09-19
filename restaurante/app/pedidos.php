<?php
session_start();
$clientes = $_SESSION['clientes'];
?>

<div class="modal fade" id="mostraPedido" tabindex="-1" aria-labelledby="mostraPedidoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-shop"></i> Pedidos </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table table-striped table-hover mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Cédula</th>
                            <th>Pedido</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ruta_imagen = "../img/";
                        
                        foreach ($_SESSION['clientes'] as $key => $cliente) {
                            $id = $cliente['id'];
                            $cedula = $cliente['cedula'];
                            $pedido = $cliente['pedido'];
                            $imagen = $cliente['foto'];
                        ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $cedula ?></td>
                                <td><?php echo $pedido ?></td>
                                <td><img src=" <?php echo $ruta_imagen . $cedula . ".jpg"; ?>" width="60" height="70"></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-square-minus"></i> Entendido</button>
                </div>
            </div>
        </div>
    </div>
</div>