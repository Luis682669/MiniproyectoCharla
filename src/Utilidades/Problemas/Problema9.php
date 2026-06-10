<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

class Problema9
{
    // Esta función recibe un número entero entre 1 y 9 y devuelve un array con las potencias de ese número desde el exponente 1 hasta el 15
    public static function ejecutar(int $base): array
    {
        $potencias = [];

        if ($base >= 1 && $base <= 9) {
            for ($exponente = 1; $exponente <= 15; $exponente++) {
                $potencias[] = [
                    'exp' => $exponente,
                    'val' => $base ** $exponente
                ];
            }
        }

        return $potencias;
    }
}