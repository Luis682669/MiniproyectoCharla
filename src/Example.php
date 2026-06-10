<?php

namespace Luis\LaboratorioAutoload;

class Example
{
    // Esta función devuelve un saludo personalizado para el nombre dado, demostrando que la clase se cargó correctamente con PSR-4
    public function greet(string $name): string
    {
        return sprintf('Hola, %s. Esta clase se cargó con PSR-4.', $name);
    }
}
