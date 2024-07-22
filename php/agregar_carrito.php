<?php
session_start();
$conexion = new mysqli('localhost', 'usuario', 'contraseña', 'tienda');

if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];
    $cantidad = 1; //  agregar funcionalidad para permitir al usuario seleccionar la cantidad

    // Verificar si el producto ya está en el carrito
    if (isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id] += $cantidad;
    } else {
        $_SESSION['carrito'][$producto_id] = $cantidad;
    }
}


// Consultar el precio del producto

$query = "SELECT * FROM productos WHERE id = $producto_id";
$result = $conexion->query($query);
$producto = $result->fetch_assoc();

// Agregar el producto al carrito

$_SESSION['carrito']['total'] += $producto['precio'] * $cantidad;

// Redirigir al carrito

$conexion->close();

session_write_close();


header('Location: ../index.php');
