<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload;

class Usuario
{
    private string $nombre;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function saludar(): string
    {
        return 'Hola, ' . $this->nombre . '!';
    }
}
