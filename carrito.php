<?php
session_start();
require 'php/funciones.php';
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];

$productos = [];
$total = 0;

foreach ($carrito as $id => $cantidad) {
    $producto = obtener_producto($conexion, $id);
    $producto['cantidad'] = $cantidad;
    $producto['subtotal'] = $producto['precio'] * $cantidad;
    $productos[] = $producto;
    $total += $producto['subtotal'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'templates/header.php'; ?>
</head>
<body>
    <div class="container">
        <h1>Carrito de Compras</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) { ?>
                    <tr>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td>$<?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['cantidad']; ?></td>
                        <td>$<?php echo $producto['subtotal']; ?></td>
                        <td>
                            <a href="php/eliminar_carrito.php?id=<?php echo $producto['id']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <h3>Total: $<?php echo $total; ?></h3>
        <a href="index.php" class="btn btn-primary">Seguir Comprando</a>
        <a href="php/procesar_compra.php" class="btn btn-success">Procesar Compra</a>
    </div>
    <?php include 'templates/footer.php'; ?>
</body>
</html>
