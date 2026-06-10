<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload;

class Usuario
{
    // Esta clase representa a un usuario con un nombre y tiene un método para saludar al usuario
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
