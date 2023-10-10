<?php

$ruta_imagen = "../img/";

if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
    $archivo = $_FILES['file']['tmp_name'];
    $nombrearchivo = $_POST['cedula'] . ".jpg";
    $sizearchivo = $_FILES['file']['size'];
    $tipoarchivo = GetImageSize($archivo);

    if ($tipoarchivo[2] == 3 || $tipoarchivo[2] == 2) {
        if (move_uploaded_file($archivo, $ruta_imagen . $nombrearchivo)) {
            echo "<script> alert(' El archivo se ha cargado con exito.\\n Tamaño de archivo: $sizearchivo bytes.\\n Nombre de imagen: $nombrearchivo.');window.location= 'index.php'</script>";
        } else {
            echo "<script> alert('Error.\\nNo se ha podido cargar el archivo.');window.location='index.php'</script>";
        }
    } else {
        echo "<script> alert('Error.\\nNo es un archivo JPEG o PNG valido.');window.location='index.php'</script>";
    }
}

$fileimg = opendir($ruta_imagen);


if (!isset($_SESSION['clientes'])) {
    $_SESSION['clientes'] = array();
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
            "pedido" => "Hamburguesas: " . $hamburguesas . ", Bebidas: " . $bebidas . ", Snacks: " . $snacks,
            "foto" => $nombrearchivo
        ];
    } elseif (isset($_POST['eliminar']) && isset($_POST['key'])) {
        $key = $_POST['key'];
        if (isset($_SESSION['clientes'][$key])) {
            unset($_SESSION['clientes'][$key]);
        }
    } 
}
