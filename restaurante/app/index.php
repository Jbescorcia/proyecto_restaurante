<?php
session_start();
include 'compra.php';
include 'pedidos.php';
include 'orden.php';
include 'backend.php';
include 'pedido_cliente.php';

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

        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" data-bs-toggle="modal" data-bs-target="#organizar" class="btn-primary btn"><i class="fa-solid fa-arrow-down-wide-short"></i> NO Implementado</a>

                <a href="#" data-bs-toggle="modal" data-bs-target="#numevoPedido" class="btn-primary btn"><i class="fa-solid fa-cart-plus"></i> Nuevo Pedido</a>

                <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#mostraPedido" name="pedido"><i class="fa-solid fa-cart-plus"></i> Pedidos</button>

                <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#pedido_cliente" name="pedido"><i class="fa-solid fa-cart-plus"></i> Pedidos Cliente</button>
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
                            <?php echo "<img width='60' height='70' src='$ruta_imagen{$cliente['foto']}'" ?>
                        </td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" value=<?php echo $key ?> name="key">
                                <button class="btn btn-danger " type="submit" name="eliminar">Eliminar</button>
                            </form>
                            <form action="orden.php" method="post">
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
    <script src="../Js/bootstrap.bundle.min.js"></script>
</body>

</html>