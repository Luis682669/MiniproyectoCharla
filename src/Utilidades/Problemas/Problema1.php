<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

class Problema1
{
    public static function ejecutar(float $n1, float $n2, float $n3, float $n4, float $n5): array
    {
        $nums = [$n1, $n2, $n3, $n4, $n5];
        
        $media = array_sum($nums) / 5;
        $varianza = array_sum(array_map(fn($x) => pow($x - $media, 2), $nums)) / 5;
        $desv = sqrt($varianza);

        return [
            'media'  => round($media, 4),
            'desv'   => round($desv, 4),
            'min'    => min($nums),
            'max'    => max($nums),
            'nums'   => $nums,
        ];
    }
}