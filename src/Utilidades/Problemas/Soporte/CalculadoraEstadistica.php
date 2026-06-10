<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas\Soporte;

class CalculadoraEstadistica
{
    // Esta función recibe un array de valores numéricos y devuelve un array con la media, desviación estándar, mínimo, máximo, mediana, cantidad total, cantidad de aprobados (notas >= 11), cantidad de desaprobados (notas < 11) y las notas originales ordenadas
    public static function procesarColeccion(array $valores): array
{// Contamos la cantidad de valores en la colección
    $n = count($valores);

    if ($n === 0) {
        return ['error' => 'Colección vacía'];
    }

    sort($valores);
// Calculamos la media
    $suma = array_sum($valores);
    $media = $suma / $n;

    $sumaDiferencias = 0.0;

    foreach ($valores as $valor) {
        $sumaDiferencias += ($valor - $media) ** 2;
    }
// Calculamos la desviación estándar usando la fórmula de la muestra (n-1)
    $desviacionEstandar = $n > 1 ? sqrt($sumaDiferencias / ($n - 1)) : 0.0;
// Calculamos la mediana
    $mitad = intdiv($n, 2);

    if ($n % 2 === 0) {
        $mediana = ($valores[$mitad - 1] + $valores[$mitad]) / 2;
    } else {
        $mediana = $valores[$mitad];
    }
// Contamos aprobados y desaprobados
    $aprobados = count(array_filter($valores, fn($nota) => $nota >= 11));
    $desaprobados = $n - $aprobados;

    return [
        'media' => round($media, 2),
        'desv' => round($desviacionEstandar, 2),
        'min' => min($valores),
        'max' => max($valores),
        'mediana' => round($mediana, 2),
        'cnt' => $n,
        'aprobados' => $aprobados,
        'desaprobados' => $desaprobados,
        'notas' => $valores,
    ];
}
}
