<?php

namespace Luis\LaboratorioAutoload;

class Autoloader
{
    // Esta función se encarga de registrar el autoloader para que las clases se carguen automáticamente cuando se instancian
    public function register(): void
    {
        spl_autoload_register([$this, 'loadClass']);
    }
// Esta función se encarga de cargar las clases automáticamente cuando se instancian, siguiendo el estándar PSR-4
    public function loadClass(string $class): void
    {
        $prefix = __NAMESPACE__ . '\\';
        $baseDir = __DIR__ . '/';
// Verificamos si la clase pertenece al espacio de nombres del autoloader
        if (str_starts_with($class, $prefix)) {
            $relativeClass = substr($class, strlen($prefix));
            $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

            if (file_exists($file)) {
                require $file;
            }
        }
    }
}
