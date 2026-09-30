<?php
// ===================================================
// SISTEMA DE BOLETA DE SUPERMERCADO - PHP
// ===================================================

// 1. Datos del Cliente y Productos
$cliente = "Carlos Ramírez";
$fecha = date("d/m/Y H:i");

// Precios unitarios
$precioArroz  = 4.50;  // Por kilo
$precioLeche  = 3.80;  // Por tarro
$precioAceite = 11.50; // Por botella

// Cantidades compradas
$cantArroz  = 10; // 10 kilos
$cantLeche  = 12; // 12 tarros
$cantAceite = 4;  // 4 botellas

// 2. Cálculo de Subtotales por Producto
$subtotalArroz  = $cantArroz * $precioArroz;
$subtotalLeche  = $cantLeche * $precioLeche;
$subtotalAceite = $cantAceite * $precioAceite;

// Subtotal General de la compra
$subtotalGeneral = $subtotalArroz + $subtotalLeche + $subtotalAceite;

// 3. Evaluación de Descuento con IF / ELSE
$descuento = 0;
$porcentajeDescuento = "0%";

if ($subtotalGeneral >= 150) {
    $descuento = $subtotalGeneral * 0.15;
    $porcentajeDescuento = "15%";
} elseif ($subtotalGeneral >= 80) {
    $descuento = $subtotalGeneral * 0.08;
    $porcentajeDescuento = "8%";
} else {
    $descuento = 0;
    $porcentajeDescuento = "0%";
}

// 4. Subtotal Neto, IGV (18%) y Total Final
$subtotalConDescuento = $subtotalGeneral - $descuento;
$igv = $subtotalConDescuento * 0.18;
$totalPagar = $subtotalConDescuento + $igv;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boleta de Venta - Supermercado</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            padding-top: 30px;
        }
        .boleta {
            background: #fff;
            padding: 20px 30px;
            border: 1px solid #ccc;
            width: 380px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .text-center { text-align: center; }
        .linea { border-bottom: 1px dashed #000; margin: 10px 0; }
        .item { display: flex; justify-content: space-between; margin: 5px 0; }
        .total { font-weight: bold; font-size: 1.1em; }
    </style>
</head>
<body>

<div class="boleta">
    <h2 class="text-center" style="margin:0;">SUPERMERCADO EXPRESS</h2>
    <p class="text-center" style="margin:5px 0;">RUC: 20123456789</p>
    <div class="linea"></div>
    
    <p><strong>Cliente:</strong> <?php echo $cliente; ?><br>
    <strong>Fecha:</strong> <?php echo $fecha; ?></p>
    
    <div class="linea"></div>
    
    <div class="item"><strong>CANT. PRODUCTO</strong> <strong>TOTAL</strong></div>
    
    <?php if ($cantArroz > 0): ?>
        <div class="item">
            <span><?php echo $cantArroz; ?>x Arroz Superior (S/ <?php echo number_format($precioArroz, 2); ?>)</span>
            <span>S/ <?php echo number_format($subtotalArroz, 2); ?></span>
        </div>
    <?php endif; ?>

    <?php if ($cantLeche > 0): ?>
        <div class="item">
            <span><?php echo $cantLeche; ?>x Leche Evaporada (S/ <?php echo number_format($precioLeche, 2); ?>)</span>
            <span>S/ <?php echo number_format($subtotalLeche, 2); ?></span>
        </div>
    <?php endif; ?>

    <?php if ($cantAceite > 0): ?>
        <div class="item">
            <span><?php echo $cantAceite; ?>x Aceite Vegetal (S/ <?php echo number_format($precioAceite, 2); ?>)</span>
            <span>S/ <?php echo number_format($subtotalAceite, 2); ?></span>
        </div>
    <?php endif; ?>

    <div class="linea"></div>

    <div class="item">
        <span>Subtotal Bruto:</span>
        <span>S/ <?php echo number_format($subtotalGeneral, 2); ?></span>
    </div>
    <div class="item">
        <span>Descuento (<?php echo $porcentajeDescuento; ?>):</span>
        <span>- S/ <?php echo number_format($descuento, 2); ?></span>
    </div>
    <div class="item">
        <span>IGV (18%):</span>
        <span>S/ <?php echo number_format($igv, 2); ?></span>
    </div>

    <div class="linea"></div>

    <div class="item total">
        <span>TOTAL A PAGAR:</span>
        <span>S/ <?php echo number_format($totalPagar, 2); ?></span>
    </div>

    <div class="linea"></div>
    <p class="text-center">¡Gracias por su compra!</p>
</div>

</body>
</html>