<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

use Luis\LaboratorioAutoload\Utilidades\Problemas\Soporte\CalculadoraEstadistica;

class Problema7
{
    // Esta función recibe un array de notas de usuario y devuelve un array con la media, desviación estándar, mínimo, máximo y las notas originales
    public static function ejecutar(array $notasUsuario): array
    {
        return CalculadoraEstadistica::procesarColeccion($notasUsuario);
    }
}
