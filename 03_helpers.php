<?php
function calcularTotal($cesta) {
    $total = 0;
    foreach($cesta as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }

    return $total;
}