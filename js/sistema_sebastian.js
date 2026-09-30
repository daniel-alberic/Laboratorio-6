// 1. Catálogo de productos disponibles
const catalogo = {
    laptop: { nombre: "Laptop Gamer", precio: 1200 },
    mouse: { nombre: "Mouse Inalambrico", precio: 25 },
    teclado: { nombre: "Teclado Mecanico", precio: 80 },
    monitor: { nombre: "Monitor 24 pulgadas", precio: 200 }
};

// 2. Carrito de compras (productos y cantidades)
const carrito = [
    { producto: catalogo.laptop, cantidad: 1 },
    { producto: catalogo.mouse, cantidad: 2 },
    { producto: catalogo.teclado, cantidad: 1 }
];

// 3. Funcion para procesar la venta
function procesarVenta(itemsCarrito) {
    console.log("========================================");
    console.log("          TICKET DE VENTA               ");
    console.log("========================================");

    let subtotal = 0;

    // Mostrar los items comprados
    itemsCarrito.forEach(item => {
        let totalItem = item.producto.precio * item.cantidad;
        subtotal += totalItem;
        console.log("- " + item.cantidad + "x " + item.producto.nombre + " (\(" + item.producto.precio + " c/u) =\)" + totalItem);
    });

    console.log("----------------------------------------");
    console.log("Subtotal: $" + subtotal.toFixed(2));

    // 4. Aplicar descuento (10% si el subtotal es mayor a 500)
    let descuento = 0;
    if (subtotal > 500) {
        descuento = subtotal * 0.10;
        console.log("Descuento aplicado (10%): -$" + descuento.toFixed(2));
    }

    let subtotalConDescuento = subtotal - descuento;

    // 5. Calcular impuesto (18%)
    const TASA_IMPUESTO = 0.18;
    let impuesto = subtotalConDescuento * TASA_IMPUESTO;
    console.log("Impuesto (18%): +$" + impuesto.toFixed(2));

    // 6. Calcular total final
    let totalFinal = subtotalConDescuento + impuesto;

    console.log("========================================");
    console.log("TOTAL A PAGAR: $" + totalFinal.toFixed(2));
    console.log("========================================");
}

// Ejecutar la funcion
procesarVenta(carrito);
