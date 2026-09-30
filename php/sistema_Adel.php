<?php
$precios = [
    "Pantalones de lana" => 45.00,
    "Sueter de casimir" => 100.00,
    "Blusa de seda" => 14.00,
    "Camisola de seda" => 10.00,
    "Falda recta" => 40.00,
    "Saco de lana" => 120.00
];

//Ahora obtenemos el precio unitario desde el arreglo
$Prenda = "Sueter de casimir";
$Cantidad = 8;
$precioUnitario = $precios[$Prenda];

//Realizamos el calculo
$montoVenta = $precioUnitario * $Cantidad;

//Determinamos el porcentaje de descuento 
if ($montoVenta < 100){
    $porcentajeDescuento = 0.2;
}elseif ($montoVenta <= 500){
    $porcentajeDescuento = 0.4;
}elseif ($montoVenta <= 1000){
    $porcentajeDescuento = 0.06;
}elseif ($montoVenta <= 1500){
    $porcentajeDescuento = 0.8;
}else {
    $porcentajeDescuento = 0.20;
}

//Calcular el monto de descuento 
$montoDescuento = $montoVenta * $porcentajeDescuento;

//Calculamos el monto neto a pagar 
$montoNeto = $montoVenta - $montoDescuento;

//Calculamos el IGV
$tasaIGV =0.18;
$montoIGV = $montoVenta * $tasaIGV;
//fase de salida :Imprimimos
echo "::::::Detalle de compra:Telas y moda de otoño Isabel::::::". "<br>";
echo "Prenda selecciondada: ". $Prenda. "<br>";
echo "Cantidad". $Cantidad. "<br>";
echo "Precio unitario: ". $precioUnitario. "<br>";
echo "--------------------------------------------------------------------". "<br>";
echo "Monto de Venta :". $montoVenta. "<br>";
echo "Descuento :". $montoDescuento. "<br>";
echo "IGV :" . $montoIGV. "<br>";
echo "monto neto a pagar :". $montoNeto. "<br>";
?>