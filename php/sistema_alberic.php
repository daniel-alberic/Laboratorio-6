<?php

// Definición de la Clase Mascota
class Mascota {
    public int $id;
    public string $nombre;
    public string $especie;
    public string $raza;
    public float $precio;
    public int $stock;

    public function __construct(int $id, string $nombre, string $especie, string $raza, float $precio, int $stock) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->raza = $raza;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function mostrarDetalle(): string {
        return sprintf(
            "[ID: %d] %s (%s - %s) - $%s (Stock: %d)",
            $this->id,
            $this->nombre,
            $this->especie,
            $this->raza,
            number_format($this->precio, 2),
            $this->stock
        );
    }
}

// Clase Controladora para gestionar el flujo de la Tienda
class Tienda {
    private array $catalogo = [];
    private array $carrito = [];

    public function __construct() {
        // Catálogo inicial de mascotas en la tienda
        $this->catalogo = [
            new Mascota(1, "Firulais", "Perro", "Golden Retriever", 350.00, 3),
            new Mascota(2, "Michi", "Gato", "Siamés", 150.00, 5),
            new Mascota(3, "Lucas", "Ave", "Periquito", 25.00, 10),
            new Mascota(4, "Nemo", "Pez", "Betta", 12.50, 15),
            new Mascota(5, "Roco", "Perro", "Bulldog Francés", 500.00, 2)
        ];
    }

    // Función para mostrar el catálogo en consola / texto plano
    public function mostrarCatalogo(): void {
        echo "========================================" . "<br>";
        echo "       CATÁLOGO DE MASCOTAS 🐾         " . "<br>";
        echo "========================================" . "<br>";
        foreach ($this->catalogo as $mascota) {
            echo $mascota->mostrarDetalle() . "<br>";
        }
        echo "========================================" . "<br>";
    }

    // Función para agregar una mascota al carrito
    public function agregarAlCarrito(int $idMascota, int $cantidad): void {
        $mascotaEncontrada = null;

        // Buscar la mascota por ID
        foreach ($this->catalogo as $mascota) {
            if ($mascota->id === $idMascota) {
                $mascotaEncontrada = $mascota;
                break;
            }
        }

        if (!$mascotaEncontrada) {
            echo "❌ Error: La mascota con el ID especificado no existe." . "<br>";
            return;
        }

        if ($mascotaEncontrada->stock < $cantidad) {
            echo "❌ Stock insuficiente. Solo quedan {$mascotaEncontrada->stock} unidades de {$mascotaEncontrada->nombre}" . "<br>";
            return;
        }

        // Descontar stock
        $mascotaEncontrada->stock -= $cantidad;

        // Agregar al carrito (Arreglo asociativo equivalente al Objeto literal de JS)
        $this->carrito[] = [
            "mascota" => $mascotaEncontrada->nombre,
            "precioUnitario" => $mascotaEncontrada->precio,
            "cantidad" => $cantidad,
            "subtotal" => $mascotaEncontrada->precio * $cantidad
        ];

        echo "✅ ¡Se agregaron {$cantidad} unidad(es) de {$mascotaEncontrada->nombre} al carrito!" . "<br>";
    }

    // Función para calcular el total y generar el ticket de venta
    public function finalizarCompra(): void {
        if (empty($this->carrito)) {
            echo "🛒 El carrito está vacío. No hay compras que procesar." . "<br>";
            return;
        }

        echo "========================================" . "<br>";
        echo "           TICKET DE VENTA 🧾           " . "<br>";
        echo "========================================" . "<br>";
        
        $totalGeneral = 0;
        foreach ($this->carrito as $index => $item) {
            $numItem = $index + 1;
            $subtotalFormateado = number_format($item["subtotal"], 2);
            echo "{$numItem}. {$item['mascota']} x{$item['cantidad']} - \${$subtotalFormateado}" . "<br>";
            $totalGeneral += $item["subtotal"];
        }

        $totalFormateado = number_format($totalGeneral, 2);
        echo "----------------------------------------" . "<br>";
        echo "TOTAL A PAGAR: \${$totalFormateado}" . "<br>";
        echo "========================================" . "<br>";
        echo "🎉 ¡Gracias por su compra en la PetShop! 🎉" . "<br>";

        // Vaciar el carrito después de la compra
        $this->carrito = [];
    }
}

// ========================================
// SIMULACIÓN DE EJECUCIÓN
// ========================================

// Instanciar el gestor de la tienda
$tienda = new Tienda();

// 1. Ver el catálogo disponible
$tienda->mostrarCatalogo();

// 2. Realizar compras simuladas
echo "--- SIMULANDO COMPRAS ---" . "<br>";
$tienda->agregarAlCarrito(1, 1); 
$tienda->agregarAlCarrito(2, 2); 

// 3. Ver el catálogo actualizado (con menor stock)
$tienda->mostrarCatalogo();

// 4. Finalizar la compra y emitir ticket
$tienda->finalizarCompra();
