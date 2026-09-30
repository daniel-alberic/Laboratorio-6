const precios = {
"Pantalones de lana": 45.00,
"Sueter de casimir": 100.00,
"Blusa de seda": 14.00,
"Camisola de seda": 10.00,
"Falda recta": 40.00,
"Saco de lana":120.00
};

//Ahora obtenemos el precio unitario desde el arreglo
let Prenda = "Sueter de casimir";
let Cantidad = 8;
let precioUnitario = precios[Prenda];

//Realizamos el calculo
let montoVenta = precioUnitario * Cantidad;

//Determinamos el porcentaje de descuento 
if (montoVenta < 100){
    porcentajeDescuento = 0.2;
}else if (montoVenta <= 500) {
    porcentajeDescuento = 0.4;
}else if (montoVenta <= 1000){
    porcentajeDescuento = 0.06;
}else if (montoVenta <= 1500){
    porcentajeDescuento = 0.8;
}else {
    porcentajeDescuento = 0.20;
}

//Calcular el monto de descuento 
let montoDescuento = montoVenta * porcentajeDescuento;

//Calculamos el monto neto a pagar 
let montoNeto = montoVenta - montoDescuento;

//Calculamos el IGV
let tasaIGV =0.18;
let montoIGV = montoVenta * tasaIGV;
//fase de salida :Imprimimos
console.log("::::::Detalle de compra:Telas y moda de otoño Isabel::::::");
console.log("Prenda selecciondada: ", Prenda);
console.log("Cantidad", Cantidad);
console.log("Precio unitario: ", precioUnitario);
console.log("--------------------------------------------------------------------");
console.log("Monto de Venta :", montoVenta);
console.log("Descuento :", montoDescuento);
console.log("IGV :", montoIGV);
console.log("monto neto a pagar :", montoNeto);