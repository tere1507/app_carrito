<?php
require_once '01_sesiones.php';
require_once '03_helpers.php';

if(empty($_SESSION['cesta'])) {
    echo "<p>El carrito esta vacio</p>";
    return;
}
?>

<h2 style="color: purple;"><i>Tu carrito de compras</i></h2>
<table>
    <tr>
        <th>Producto</th>
        <th>Precio(€)</th>
        <th>Unidades</th>
        <th>Subtotal (€)</th>
    </tr>

    <?php foreach($_SESSION['cesta'] as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['nombre']) ?></td>
            <td><?= number_format($item['precio'], 2) ?></td>
            <td><?= $item['cantidad'] ?></td>
            <td><?= number_format($item['precio'] * $item['cantidad'], 2) ?></td>
        </tr>
        <?php endforeach; ?>
        <tr colspan="3"><strong>Total : </strong></tr>
        <tr><strong><?= number_format(calcularTotal($_SESSION['cesta']), 2) ?> €</strong></tr>
</table>
<form action="04_procesar_carrito.php" method="post">
    <input type="submit" name="borrar" value="Vaciar Carrito" style="background-color: purple; color:white">
</form>
<br>
<form action="06_guardar_pedido.php" method="post">
    <input type="submit" style="background-color: purple; color:white"></input>
</form>