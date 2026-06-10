<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

class Problema6
{
    public static function ejecutar(float $presupuestoTotal): array
    {
        return [
            'Ginecologia' => $presupuestoTotal * 0.40,
            'Traumatologia' => $presupuestoTotal * 0.35,
            'Pediatria' => $presupuestoTotal * 0.25,
        ];
    }
}
