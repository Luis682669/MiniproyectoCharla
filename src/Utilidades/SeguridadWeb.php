<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades;

class SeguridadWeb
{
    public static function sanitizarSalida(string $dato): string
    {
        return htmlspecialchars($dato, ENT_QUOTES, 'UTF-8');
    }
}
