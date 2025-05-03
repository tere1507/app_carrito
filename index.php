<?php
require_once '01_sesiones.php';
require_once '02_productos.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Tienda 2025</title>
</head>
<body>
    <?php include '05_carrito.php'; ?>
    <h1 style="color: palevioletred;" size="10;">Tienda</h1>
    <form action="04_procesar_carrito.php" method="post">
        <?php foreach($productos as $clave => [$nombre, $precio]): ?>
            <article>
                <h2><?= htmlspecialchars($clave) ?></h2>
                <div>Description breve</div>
                <div><strong><?= number_format($precio, 2) ?> €</strong></div>
                <button type="submit" name="cesta[<?= $clave ?>]" value="<?= $precio ?>">Comprar</button>
        </article>
        <?php endforeach;?>
    </form>
</body>
</html>