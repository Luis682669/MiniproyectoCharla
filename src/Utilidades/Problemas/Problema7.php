<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

use Luis\LaboratorioAutoload\Utilidades\Problemas\Soporte\CalculadoraEstadistica;

class Problema7
{
    public static function ejecutar(array $notasUsuario): array
    {
        return CalculadoraEstadistica::procesarColeccion($notasUsuario);
    }
}
