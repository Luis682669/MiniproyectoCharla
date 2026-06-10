<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

class Problema3
{
    // Esta función calcula la suma de todos los números del 1 al 1000 y devuelve el resultado
    public static function ejecutar(): int
    {
        $suma = 0;
        for ($i = 1; $i <= 1000; $i++) {
            $suma += $i;
        }
        return $suma;
    }
}
