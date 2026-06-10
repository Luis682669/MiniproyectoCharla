<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

class Problema2
{
    public static function ejecutar(int $cantidadLimite): array
    {
        $multiplos = [];
        for ($i = 1; $i <= $cantidadLimite; $i++) {
            $multiplos[] = 4 * $i;
        }
        return $multiplos;
    }
}
