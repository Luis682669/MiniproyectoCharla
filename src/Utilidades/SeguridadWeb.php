<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades;

class SeguridadWeb
{
    // Esta función recibe un string y devuelve una versión sanitizada del mismo para evitar ataques XSS
    public static function sanitizarSalida(string $dato): string
    {
        return htmlspecialchars($dato, ENT_QUOTES, 'UTF-8');// Convertimos caracteres especiales a entidades HTM
    }
}
