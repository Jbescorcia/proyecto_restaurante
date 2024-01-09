<?php
session_start();

include 'orden.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="shortcut icon" href="../assets/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
</head>

<body>
    <div class="container py-3">
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
                $cedulaCliente = $_SESSION['cedula'];
                foreach ($_SESSION['clientes'] as $key => $cliente) {
                    if ($cliente['cedula'] === $cedulaCliente) {
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
                }
                ?>
            </tbody>
        </table>
        <form action="post">
            <?php
            echo var_dump($cedulaCliente);

            ?>
            <button type="button" class="btn btn-primary"><i class="fa-solid fa-cart-plus"></i> Comprar</button>
        </form>
        <div class="modal-footer">
            <a href="./index.php?accion=0" class="btn-danger btn"><i class="far fa-times-circle"></i> Salir</a>
        </div>
    </div>
</body>

</html>