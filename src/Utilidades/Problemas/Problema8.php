<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

class Problema8
{
    // Este método determina la estación del año correspondiente a una fecha dada en formato de cadena. Primero, convierte la fecha a un timestamp y verifica si es válida. Luego, extrae el mes y el día de la fecha para determinar la estación del año según las fechas de cambio de estación para el hemisferio norte. Finalmente, devuelve un arreglo con la información de la estación correspondiente, incluyendo su nombre, icono, colores y descripción.
    public static function ejecutar(string $fecha): array
    {
        //timestamp de la fecha proporcionada para validar y extraer mes y día
        $timestamp = strtotime($fecha);
        if ($timestamp === false) {
            return [
                'nombre' => 'Fecha inválida',
                'icon' => '❓',
                'bg' => '#fff0f5',
                'border' => '#ffcce0',
                'color' => 'var(--accent-4)',
                'desc' => 'La fecha no es válida.',
                'image' => 'img/primavera.jpg',
                'fecha_fmt' => '',
                'mes' => 0,
                'dia' => 0,
            ];
        }

        $mes = (int) date('n', $timestamp);
        $dia = (int) date('j', $timestamp);

        $estaciones = [
            'Primavera' => ['icon' => '🌸', 'bg' => '#e8fdf8', 'border' => '#b8f0e4', 'color' => 'var(--accent-2)', 'desc' => 'Marzo 20 – Junio 20', 'image' => 'img/primavera.jpg'],
            'Verano'    => ['icon' => '☀️', 'bg' => '#fff8ee', 'border' => '#ffe4b0', 'color' => 'var(--accent-3)', 'desc' => 'Junio 21 – Septiembre 22', 'image' => 'img/verano.jpg'],
            'Otoño'     => ['icon' => '🍂', 'bg' => '#fff0f5', 'border' => '#ffcce0', 'color' => 'var(--accent-4)', 'desc' => 'Septiembre 23 – Diciembre 20', 'image' => 'img/otoño.jpg'],
            'Invierno'  => ['icon' => '❄️', 'bg' => '#eef1ff', 'border' => '#d0dcff', 'color' => 'var(--accent)', 'desc' => 'Diciembre 21 – Marzo 20', 'image' => 'img/invierno.jpg'],
        ];
// Se determina la estación del año según el mes y día, utilizando las fechas de cambio de estación para el hemisferio norte. Se devuelve un arreglo con la información de la estación correspondiente, incluyendo su nombre, icono, colores y descripción.
        if (($mes === 3 && $dia >= 20) || ($mes > 3 && $mes < 6) || ($mes === 6 && $dia <= 20)) {
            $nombre = 'Primavera';
        } elseif (($mes === 6 && $dia >= 21) || ($mes > 6 && $mes < 9) || ($mes === 9 && $dia <= 22)) {
            $nombre = 'Verano';
        } elseif (($mes === 9 && $dia >= 23) || ($mes > 9 && $mes < 12) || ($mes === 12 && $dia <= 20)) {
            $nombre = 'Otoño';
        } else {
            $nombre = 'Invierno';
        }
// Se devuelve un arreglo con la información de la estación correspondiente, incluyendo su nombre, icono, colores y descripción.    
        return array_merge([
            'nombre' => $nombre,
            'fecha_fmt' => date('d \d\e F \d\e Y', $timestamp),
            'mes' => $mes,
            'dia' => $dia,
        ], $estaciones[$nombre]);
    }
}
