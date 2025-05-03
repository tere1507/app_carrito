<?php
session_start();
if(!isset($_SESSION['cesta']) || empty($_SESSION['cesta'])) {
    echo "<p>Tu carrito esta vacio</p>";
    exit;
}

$total = 0;
$pedido = "<section style='font-family:sans-serif;'>\n";
$pedido .= "<h2 style='color:green;'>🧾Pedido recibido :</h2>\n";
$pedido .= "<table style='border-collapse: collapse; width: 100%;'>\n";
$pedido .= "<thead>\n<tr style='background-color: #eee;'>\n";
$pedido .= "<th style='border: 1px solid #ccc; padding: 8px; '>Producto</th>\n";
$pedido .= "<th style='border: 1px solid #ccc; padding: 8px; '>Precio (€)</th>\n";
$pedido .= "<th style='border: 1px solid #ccc; padding: 8px; '>Cantidad</th>\n";
$pedido .= "<th style='border: 1px solid #ccc; padding: 8px; '>Subtotal (€)</th>\n";
$pedido .= "</tr>\n</thead>\n<tbody\n";

$registro = "Nuevo Pedido:\n";

foreach($_SESSION['cesta'] as $item) {
    $precio = floatval($item['precio']);
    $cantidad = intval($item['cantidad']);
    $subtotal = $precio * $cantidad;
    $total += $subtotal;

    $pedido .= "<tr>\n";
    $pedido .= "<td style='border: 1px solid #ccc; padding: 8px;'>{$item['nombre']}</td>\n";
    $pedido .= "<td style='border: 1px solid #ccc; padding: 8px;'>{$precio}</td>\n";
    $pedido .= "<td style='border: 1px solid #ccc; padding: 8px;'>{$cantidad}</td>\n";
    $pedido .= "<td style='border: 1px solid #ccc; padding: 8px;'>{$subtotal}</td>\n";
    $pedido .= "</tr>\n";

    $registro .= "Producto: {$item['nombre']} | Precio: {$precio} | Cantidad: {$cantidad} | Subtotal: {$subtotal}\n";

}

$pedido .= "</tbody>\n</table>\n";
$pedido .= "<h3>Total de Pedido: € {$total}</h3>\n";
$pedido .= "<p>Gracias por tu compra</p></section>";

$registro .= "Total: {$total}€\n";
$registro .= "Fecha: " . date("Y-m-d H:i:s") . "\n\n";

// Guardar en archivo
file_put_contents("pedidos.txt", $registro, FILE_APPEND);

//mostrar en pantalla 
echo $pedido;

//vaciar carrito

unset($_SESSION['cesta']);