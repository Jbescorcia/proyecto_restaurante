<?php
session_start();
include 'nuevoPedido.php';


if (!isset($_SESSION['clientes'])) {
    $_SESSION['clientes'] = array();
}

if (!isset($_SESSION['imagenes'])) {
    $_SESSION['imagenes'] = array();
}

function numeroPedido()
{
    if (!isset($_SESSION['numero_pedido'])) {
        $_SESSION['numero_pedido'] = 1;
    } else {
        $_SESSION['numero_pedido']++;
    }
    return $_SESSION['numero_pedido'];
}


if ($_POST) {

    if (isset($_POST['enviar'])) {
        $hamburguesas = $_POST['hamburguesas'];
        $bebidas = $_POST['bebidas'];
        $snacks = $_POST['snacks'];

        $_SESSION['clientes'][] = [
            "id" => numeroPedido(),
            "cedula" => $_POST['cedula'],
            "pedido" => "Hamburguesas: " . $hamburguesas . ", Bebidas: " . $bebidas . ", Snacks: " . $snacks
        ];
    } elseif (isset($_POST['eliminar']) && isset($_POST['key'])) {
        $key = $_POST['key'];
        if (isset($_SESSION['clientes'][$key])) {
            unset($_SESSION['clientes'][$key]);
        }
    } elseif (isset($_POST['pedido']) && isset($_POST['key'])) {
        $key = $_POST['key'];
        ordenPedido($key);
    }

}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamburgers</title>
    <link rel="shortcut icon" href="../assets/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
</head>

<body>
    <div class="container py-3">
        <h2 class="text-center"><img src="../assets/logo.png" alt="logo"></h2>

        <div class="row justify-content-end py-3">
            <form method="post" action="post" class="col-auto">
                <button type="submit" name="organizar" id="organizar" class="btn-primary btn">
                    <i class="fa-solid fa-arrow-down-wide-short"></i> Organizar
                </button>
            </form>
        </div>

        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" data-bs-toggle="modal" data-bs-target="#numevoPedido" class="btn-primary btn"><i class="fa-solid fa-cart-plus"></i> Nuevo Pedido</a>

                 <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#mostraPedido" name="pedido"><i class="fa-solid fa-cart-plus"></i> Pedidos</button>
            </div>
        </div>





        <table class="table table-sm table table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Numero Pedido</th>
                    <th>Cedula Cliente</th>
                    <th>Pedido</th>
                    <th>Foto</th>
                    <th>Accion</th>
                </tr>
            </thead>

            <tbody>
                <?php


                foreach ($_SESSION['clientes'] as $key => $cliente) {
                ?>
                    <tr>
                        <td><?php echo $cliente['id'] ?></td>
                        <td><?php echo $cliente['cedula'] ?></td>
                        <td><?php echo $cliente['pedido'] ?></td>
                        <td>
                            <?php
                            foreach ($_SESSION['imagenes'] as $key => $value) {
                            ?>
                                <img width="60px" height="70px" src="<?php echo $value; ?>" alt="Imagen" /><br>
                            <?php
                            }
                            ?>

                        </td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" value=<?php echo $key ?> name="key">
                                <button class="btn btn-danger " type="submit" name="eliminar">Eliminar</button>

                                <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#pedido" name="pedido">Pedido</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="pedido" tabindex="-1" aria-labelledby="pedidoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-shop"></i> Pedido</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <br>
                    <?php

                    function ordenPedido($key)
                    {
                        if (isset($_SESSION['clientes'][$key])) {
                            $cliente = $_SESSION['clientes'][$key];
                            $pedido = $cliente['pedido'];

                            $hamburguesas = obtenerCantidad("Hamburguesas: ", $pedido);
                            $bebidas = obtenerCantidad("Bebidas: ", $pedido);
                            $snacks = obtenerCantidad("Snacks: ", $pedido);

                            // Calcula el costo total
                            $costo_total = ($hamburguesas * $GLOBALS['costo_unitario_hamburguesas']) + ($bebidas * $GLOBALS['costo_unitario_bebidas']) + ($snacks * $GLOBALS['costo_unitario_snacks']);

                            // Muestra el costo total
                            echo "Costo Total para Cliente " . $cliente['cedula'] . ": " . $costo_total . " COP<br>";
                        }
                    }



                    function obtenerCantidad($producto, $pedido)
                    {
                        $cantidad = 0;
                        $posicion = strpos($pedido, $producto);
                        if ($posicion !== false) {
                            $inicio = $posicion + strlen($producto);
                            $fin = strpos($pedido, ",", $inicio);
                            if ($fin === false) {
                                $fin = strlen($pedido);
                            }
                            $cantidad = intval(substr($pedido, $inicio, $fin - $inicio));
                        }
                        return $cantidad;
                    }

                    ?>

                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-square-minus"></i> Entendido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="mostraPedido" tabindex="-1" aria-labelledby="mostraPedidoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-shop"></i> Pedidos </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <br>


                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-square-minus"></i> Entendido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../Js/bootstrap.bundle.min.js"></script>
</body>

</html>