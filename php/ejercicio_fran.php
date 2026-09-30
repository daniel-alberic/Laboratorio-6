<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Calificaciones</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 20px;">

<?php

$notas = [8, 5, 10, -2, 7, 3, 12, 9, 6];

$suma = 0;
$aprobados = 0;
$reprobados = 0;
$notasValidas = 0;

echo "<h1 style='color: #2c3e50;'>📊 Reporte de Calificaciones</h1>";
echo "<p>Procesando lista de notas en el sistema...</p>";
echo "<hr style='border: 1px solid #ccc;'><br>";

// 1. Recorrer y procesar cada nota
foreach ($notas as $nota) {
    if ($nota < 0 || $nota > 10) {
        echo "<span style='color: #e74c3c; font-weight: bold;'>❌ Error:</span> La nota <strong>$nota</strong> es inválida y se omitirá.<br><br>";
    } else {
        $notasValidas++;
        $suma += $nota;
        // realizando mi codigo php//
        if ($nota >= 6) {
            $aprobados++;
            echo "<span style='color: #27ae60;'>✔ Nota $nota:</span> Aprobado<br><br>";
        } else {
            $reprobados++;
            echo "<span style='color: #e67e22;'>⚠ Nota $nota:</span> Reprobado<br><br>";
        }
    }
}

echo "<hr style='border: 1px solid #ccc;'><br>";

// 2. Mostrar resumen final
if ($notasValidas > 0) {
    $promedio = $suma / $notasValidas;
    
    echo "<h2 style='color: #34495e;'>📈 Resumen Estadístico</h2>";
    echo "<strong>Notas válidas procesadas:</strong> $notasValidas <br><br>";
    echo "<strong>Estudiantes aprobados:</strong> <span style='color: #27ae60; font-weight: bold;'>$aprobados</span> <br><br>";
    echo "<strong>Estudiantes reprobados:</strong> <span style='color: #e74c3c; font-weight: bold;'>$reprobados</span> <br><br>";
    echo "<strong>Promedio general:</strong> <span style='background-color: #f1c40f; padding: 4px 8px; border-radius: 4px; font-weight: bold;'>" . number_format($promedio, 2) . "</span> <br><br>";
} else {
    echo "<p style='color: red;'>No se encontraron notas válidas para calcular estadísticas.</p>";
}

?> 

</body>
</html>