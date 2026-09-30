// Definición de la Clase Mascota
class Mascota {
    constructor(id, nombre, especie, raza, precio, stock) {
        this.id = id;
        this.nombre = nombre;
        this.especie = especie;
        this.raza = raza;
        this.precio = precio;
        this.stock = stock;
    }

    mostrarDetalle() {
        return `[ID: ${this.id}] ${this.nombre} (${this.especie} - ${this.raza}) - $${this.precio.toFixed(2)} (Stock: ${this.stock})`;
    }
}

// Catálogo inicial de mascotas en la tienda
const catalogo = [
    exp = new Mascota(1, "Firulais", "Perro", "Golden Retriever", 350.00, 3),
    new Mascota(2, "Michi", "Gato", "Siamés", 150.00, 5),
    new Mascota(3, "Lucas", "Ave", "Periquito", 25.00, 10),
    new Mascota(4, "Nemo", "Pez", "Betta", 12.50, 15),
    new Mascota(5, "Roco", "Perro", "Bulldog Francés", 500.00, 2)
];

// Carrito de compras
let carrito = [];

// Función para mostrar el catálogo en consola
function mostrarCatalogo() {
    console.log("\n========================================");
    console.log("       CATÁLOGO DE MASCOTAS 🐾         ");
    console.log("========================================");
    catalogo.forEach(mascota => {
        console.log(mascota.mostrarDetalle());
    });
    console.log("========================================");
}

// Función para agregar una mascota al carrito
function agregarAlCarrito(idMascota, cantidad) {
    const mascotaEncontrada = catalogo.find(m => m.id === idMascota);

    if (!mascotaEncontrada) {
        console.log("❌ Error: La mascota con el ID especificado no existe.");
        return;
    }

    if (mascotaEncontrada.stock < cantidad) {
        console.log(`❌ Stock insuficiente. Solo quedan ${mascotaEncontrada.stock} unidades de ${mascotaEncontrada.nombre}.`);
        return;
    }

    // Descontar stock
    mascotaEncontrada.stock -= cantidad;

    // Agregar al carrito
    carrito.push({
        mascota: mascotaEncontrada.nombre,
        precioUnitario: mascotaEncontrada.precio,
        cantidad: cantidad,
        subtotal: mascotaEncontrada.precio * cantidad
    });

    console.log(`✅ ¡Se agregaron ${cantidad} unidad(es) de ${mascotaEncontrada.nombre} al carrito!`);
}

// Función para calcular el total y generar el ticket de venta
function finalizarCompra() {
    if (carrito.length === 0) {
        console.log("\n🛒 El carrito está vacío. No hay compras que procesar.");
        return;
    }

    console.log("\n========================================");
    console.log("           TICKET DE VENTA 🧾           ");
    console.log("========================================");
    
    let totalGeneral = 0;
    carrito.forEach((item, index) => {
        console.log(`${index + 1}. ${item.mascota} x${item.cantidad} - $${item.subtotal.toFixed(2)}`);
        totalGeneral += item.subtotal;
    });

    console.log("----------------------------------------");
    console.log(`TOTAL A PAGAR: $${totalGeneral.toFixed(2)}`);
    console.log("========================================");
    console.log("🎉 ¡Gracias por su compra en la PetShop! 🎉\n");

    // Vaciar el carrito después de la compra
    carrito = [];
}

// ========================================
// SIMULACIÓN DE EJECUCIÓN EN CONSOLA
// ========================================

// 1. Ver el catálogo disponible
mostrarCatalogo();

// 2. Realizar compras simuladas
console.log("\n--- SIMULANDO COMPRAS ---");
agregarAlCarrito(1, 1); // Compra 1 Golden Retriever
agregarAlCarrito(2, 2); // Compra 2 Gatos Siameses

// 3. Ver el catálogo actualizado (con menor stock)
mostrarCatalogo();

// 4. Finalizar la compra y emitir ticket
finalizarCompra();