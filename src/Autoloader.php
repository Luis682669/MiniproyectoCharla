<?php

namespace Luis\LaboratorioAutoload;

class Autoloader
{
    public function register(): void
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    public function loadClass(string $class): void
    {
        $prefix = __NAMESPACE__ . '\\';
        $baseDir = __DIR__ . '/';

        if (str_starts_with($class, $prefix)) {
            $relativeClass = substr($class, strlen($prefix));
            $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

            if (file_exists($file)) {
                require $file;
            }
        }
    }
}
