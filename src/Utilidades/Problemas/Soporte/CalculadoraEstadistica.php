<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas\Soporte;

class CalculadoraEstadistica
{
    public static function procesarColeccion(array $valores): array
{
    $n = count($valores);

    if ($n === 0) {
        return ['error' => 'Colección vacía'];
    }

    sort($valores);

    $suma = array_sum($valores);
    $media = $suma / $n;

    $sumaDiferencias = 0.0;

    foreach ($valores as $valor) {
        $sumaDiferencias += ($valor - $media) ** 2;
    }

    $desviacionEstandar = $n > 1 ? sqrt($sumaDiferencias / ($n - 1)) : 0.0;

    $mitad = intdiv($n, 2);

    if ($n % 2 === 0) {
        $mediana = ($valores[$mitad - 1] + $valores[$mitad]) / 2;
    } else {
        $mediana = $valores[$mitad];
    }

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
