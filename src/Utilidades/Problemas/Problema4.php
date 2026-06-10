<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

class Problema4
{
    public static function ejecutar(): array
    {
        $sumaPares = 0;
        $sumaImpares = 0;

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
