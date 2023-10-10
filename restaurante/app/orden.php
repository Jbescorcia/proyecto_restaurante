    <?php
    $clientes = $_SESSION['clientes'];

    function calcularCostoTotal($pedido)
    {
        // Dividir el pedido en elementos individuales
        $elementos = explode(", ", $pedido);

        // Costo unitario por elemento (puedes ajustar estos valores)
        $costo_unitario_hamburguesas = 10000;
        $costo_unitario_snacks = 5000;
        $costo_unitario_bebidas = 5000;

        // Inicializar el costo total
        $costo_total = 0;

        foreach ($elementos as $elemento) {
            list($producto, $cantidad) = explode(": ", $elemento);

            // Calcular el costo del elemento actual
            switch (trim($producto)) {
                case "Hamburguesas":
                    $costo_elemento = $costo_unitario_hamburguesas * intval($cantidad);
                    break;
                case "Snacks":
                    $costo_elemento = $costo_unitario_snacks * intval($cantidad);
                    break;
                case "Bebidas":
                    $costo_elemento = $costo_unitario_bebidas * intval($cantidad);
                    break;
                default:
                    $costo_elemento = 0; // Si el producto no se reconoce, el costo es 0.
            }

            // Sumar el costo del elemento al costo total
            $costo_total += $costo_elemento;
        }

        return $costo_total;
    }

    ?>

    <!-- Modal -->
    <div class="modal fade" id="pedido" tabindex="-1" aria-labelledby="pedidoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-shop"></i> Pedido</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    ?>


                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-square-minus"></i> Entendido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>