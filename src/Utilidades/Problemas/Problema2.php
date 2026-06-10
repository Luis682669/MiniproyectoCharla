<?php
// Este archivo es el controlador para el problema 2: Múltiplos de 4
declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

class Problema2
{
    // Esta función recibe un número entero positivo y devuelve un array con los N primeros múltiplos de 4
    public static function ejecutar(int $cantidadLimite): array
    {
        $multiplos = [];
        for ($i = 1; $i <= $cantidadLimite; $i++) {
            $multiplos[] = 4 * $i;
        }
        return $multiplos;
    }
}
