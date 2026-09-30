// Datos de la persona
const nombre = "Carlos";
const edad = 22;
const cupon = "VIP2026";

// Variables del sistema
const precioBase = 100;
let precioFinal = precioBase;

console.log("--- CONTROL DE ACCESO ---");

// 1. Validar edad mínima
if (edad < 18) {
    console.log(`Acceso denegado a ${nombre}. Debes ser mayor de edad (18+).`);
} else {
    console.log(`Acceso permitido a ${nombre}.`);

    // 2. Aplicar descuento por edad
    if (edad >= 60) {
        precioFinal = precioBase * 0.50; // 50% de descuento
        console.log("Descuento aplicado: 50% por ser adulto mayor.");
    } else if (edad <= 25) {
        precioFinal = precioBase * 0.80; // 20% de descuento
        console.log("Descuento aplicado: 20% por ser estudiante/joven.");
    } else {
        console.log("Sin descuento de edad aplicado.");
    }

    // 3. Aplicar cupón de descuento adicional
    if (cupon === "VIP2026") {
        precioFinal = precioFinal - 10;
        console.log("Cupón 'VIP2026' aplicado correctamente (-$10).");
    } else {
        console.log("Sin cupón de descuento válido.");
    }

    // Prevenir montos negativos
    if (precioFinal < 0) {
        precioFinal = 0;
    }

    console.log(`Total a pagar por ${nombre}: $${precioFinal}`);
}

console.log("-------------------------");