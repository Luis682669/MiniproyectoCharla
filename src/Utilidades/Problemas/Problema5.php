<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

class Problema5
{
    // Esta función recibe un array de edades y devuelve un array con la cantidad de personas clasificadas como niño, adolescente, adulto y adulto mayor
    public static function ejecutar(array $edades): array
    {
        $clasificacion = [
            'nino' => 0,
            'adolescente' => 0,
            'adulto' => 0,
            'adultoMayor' => 0,
        ];

        foreach ($edades as $edad) {
            if ($edad >= 0 && $edad <= 12) {
                $clasificacion['nino']++;
            } elseif ($edad >= 13 && $edad <= 17) {
                $clasificacion['adolescente']++;
            } elseif ($edad >= 18 && $edad <= 64) {
                $clasificacion['adulto']++;
            } elseif ($edad >= 65) {
                $clasificacion['adultoMayor']++;
            }
        }
        return $clasificacion;
    }
}
