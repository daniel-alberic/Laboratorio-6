<?php
// 1. Catálogo de productos
$catalogo = [
    "laptop"  => ["nombre" => "Laptop Gamer", "precio" => 1200],
    "mouse"   => ["nombre" => "Mouse Inalámbrico", "precio" => 25],
    "teclado" => ["nombre" => "Teclado Mecánico", "precio" => 80],
    "monitor" => ["nombre" => "Monitor 24 pulgadas", "precio" => 200]
];

// 2. Carrito de compras (productos y cantidades)
$carrito = [
    ["producto" => $catalogo["laptop"], "cantidad" => 1],
    ["producto" => $catalogo["mouse"], "cantidad" => 2],
    ["producto" => $catalogo["teclado"], "cantidad" => 1]
];

// 3. Función para procesar la venta
function procesarVenta($itemsCarrito) {
    echo "========================================<br>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TICKET DE VENTA<br>";
    echo "========================================<br>";

    $subtotal = 0;

    // Mostrar los ítems comprados
    foreach ($itemsCarrito as $item) {
        $totalItem = $item["producto"]["precio"] * $item["cantidad"];
        $subtotal += $totalItem;

        echo "- " . $item["cantidad"] . " x " . $item["producto"]["nombre"] . 
             " ($" . $item["producto"]["precio"] . " c/u) = $" . $totalItem . "<br>";
    }

    echo "----------------------------------------<br>";
    echo "Subtotal: $" . number_format($subtotal, 2, '.', '') . "<br>";

    // 4. Aplicar descuento (10% si el subtotal es mayor a 500)
    $descuento = 0;
    if ($subtotal > 500) {
        $descuento = $subtotal * 0.10;
        echo "Descuento aplicado (10%): -$" . number_format($descuento, 2, '.', '') . "<br>";
    }

    $subtotalConDescuento = $subtotal - $descuento;

    // 5. Calcular impuesto (18%)
    $TASA_IMPUESTO = 0.18;
    $impuesto = $subtotalConDescuento * $TASA_IMPUESTO;
    echo "Impuesto (18%): +$" . number_format($impuesto, 2, '.', '') . "<br>";

    // 6. Calcular total final
    $totalFinal = $subtotalConDescuento + $impuesto;

    echo "========================================<br>";
    echo "TOTAL A PAGAR: $" . number_format($totalFinal, 2, '.', '') . "<br>";
    echo "========================================<br>";
}

// Ejecutar la función
procesarVenta($carrito);
?>
