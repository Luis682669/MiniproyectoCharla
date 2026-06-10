<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

class Problema4
{
    // Esta función calcula la suma de los números pares e impares del 1 al 200 y devuelve un array con ambos resultados

    public static function ejecutar(): array
    {
        $sumaPares = 0;
        $sumaImpares = 0;
// Iteramos del 1 al 200 y sumamos pares e impares por separado
        for ($i = 1; $i <= 200; $i++) {
            if ($i % 2 === 0) {
                $sumaPares += $i;
            } else {
                $sumaImpares += $i;
            }
        }
        return ['pares' => $sumaPares, 'impares' => $sumaImpares];
    }
}
