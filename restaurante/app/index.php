<?php
session_start();
include 'compra.php';
include 'backend.php';


$clientes = $_SESSION['clientes'];
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
                <a href="#" data-bs-toggle="modal" data-bs-target="#numevoPedido" class="btn-primary btn"><i class="fa-solid fa-cart-plus"></i> Nuevo Pedido</a>
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
                        <td>
                            <?php echo $cliente['id'];
                            $_SESSION['cedula'] = $cliente['cedula'];
                            ?>
                        </td>
                        <td><?php echo $cliente['cedula'] ?></td>
                        <td><?php echo $cliente['pedido'] ?></td>
                        <td>
                            <?php echo "<img width='60' height='70' src='$ruta_imagen{$cliente['foto']}'" ?>
                        </td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" value=<?php echo $key ?> name="key">
                                <button class="btn btn-danger " type="submit" name="eliminar"><i class="fa-solid fa fa-trash"></i> Eliminar</button>
                            </form>
                            <a href="./pedidos.php" class="btn btn-primary " type="submit" name="comprar"><i class="fa-solid fa-cart-plus"></i> Comprar</a>
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