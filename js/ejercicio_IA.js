// ==========================================
// SISTEMA DE VENTA DE ROPA - BOLETA EN CONSOLA
// ==========================================

// 1. Datos de los productos (Precios fijados)
const PRECIO_POLO = 35.00;
const PRECIO_JEAN = 80.00;
const PRECIO_CASACA = 120.00;

// 2. Selección del cliente (Puedes cambiar estas cantidades para probar)
let cliente = "Juan Pérez";
let cantidadPolos = 2;   // Cantidad de polos comprados
let cantidadJeans = 1;   // Cantidad de jeans comprados
let cantidadCasacas = 1; // Cantidad de casacas compradas

// 3. Cálculos de subtotal por producto
let subtotalPolos = cantidadPolos * PRECIO_POLO;
let subtotalJeans = cantidadJeans * PRECIO_JEAN;
let subtotalCasacas = cantidadCasacas * PRECIO_CASACA;

// Suma total antes de descuentos
let subtotalGeneral = subtotalPolos + subtotalJeans + subtotalCasacas;

// 4. Aplicación de Descuentos con IF / ELSE
let descuento = 0;
let porcentajeDescuento = "0%";

// Si la compra supera los 200 soles, se aplica un 10% de descuento
if (subtotalGeneral >= 200) {
    descuento = subtotalGeneral * 0.10;
    porcentajeDescuento = "10%";
} else if (subtotalGeneral >= 100) {
    // Si la compra es de 100 a 199 soles, se aplica un 5% de descuento
    descuento = subtotalGeneral * 0.05;
    porcentajeDescuento = "5%";
} else {
    descuento = 0;
    porcentajeDescuento = "0%";
}

// 5. Cálculo del Total Final
let totalPagar = subtotalGeneral - descuento;

// ==========================================
// IMPRESIÓN DE LA BOLETA DE VENTA EN CONSOLA
// ==========================================

console.log("==========================================");
console.log("        TIENDA DE ROPA - URBAN STYLE      ");
console.log("==========================================");
console.log("Cliente: " + cliente);
console.log("Fecha: " + new Date().toLocaleDateString());
console.log("------------------------------------------");
console.log("CANT.  PRODUCTO       P.UNIT    SUBTOTAL");
console.log("------------------------------------------");

if (cantidadPolos > 0) {
    console.log(cantidadPolos + "      Polo Urbano    S/ " + PRECIO_POLO.toFixed(2) + "   S/ " + subtotalPolos.toFixed(2));
}
if (cantidadJeans > 0) {
    console.log(cantidadJeans + "      Jean Slim      S/ " + PRECIO_JEAN.toFixed(2) + "   S/ " + subtotalJeans.toFixed(2));
}
if (cantidadCasacas > 0) {
    console.log(cantidadCasacas + "      Casaca Denim   S/ " + PRECIO_CASACA.toFixed(2) + "  S/ " + subtotalCasacas.toFixed(2));
}

console.log("------------------------------------------");
console.log("Subtotal:            S/ " + subtotalGeneral.toFixed(2));
console.log("Descuento (" + porcentajeDescuento + "):      S/ " + descuento.toFixed(2));
console.log("------------------------------------------");
console.log("TOTAL A PAGAR:       S/ " + totalPagar.toFixed(2));
console.log("==========================================");
console.log("     ¡Gracias por tu compra en Urban Style!");
console.log("==========================================");