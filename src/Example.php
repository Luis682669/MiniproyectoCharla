<?php

namespace Luis\LaboratorioAutoload;

class Example
{
    public function greet(string $name): string
    {
        return sprintf('Hola, %s. Esta clase se cargó con PSR-4.', $name);
    }
}
