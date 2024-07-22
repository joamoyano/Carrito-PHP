<?php
require 'php/funciones.php';
$productos = obtener_productos($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'templates/header.php'; ?>
</head>
<body>
    <div class="container">
        <h1>Tienda en Línea</h1>
        <div class="row">
            <?php while ($producto = $productos->fetch_assoc()) { ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="images/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                            <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                            <p class="card-text">$<?php echo $producto['precio']; ?></p>
                            <a href="php/agregar_carrito.php?id=<?php echo $producto['id']; ?>" class="btn btn-primary">Agregar al Carrito</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include 'templates/footer.php'; ?>
</body>
</html>
