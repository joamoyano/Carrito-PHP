<?php
require 'conexion.php';

function obtener_productos($conexion) {
    $sql = "SELECT * FROM productos";
    return $conexion->query($sql);
}

function obtener_producto($conexion, $id) {
    $sql = "SELECT * FROM productos WHERE id = $id";
    return $conexion->query($sql)->fetch_assoc();
}
?>
