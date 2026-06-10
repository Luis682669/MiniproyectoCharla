<?php

declare(strict_types=1);

namespace Luis\LaboratorioAutoload\Utilidades\Problemas;

/** Solucionador de problemas - delega a las clases específicas de cada ejercicio. */

class SolucionadorProblemas
{
    public static function resolverProblema1(float $n1, float $n2, float $n3, float $n4, float $n5): array
    {
        return Problema1::ejecutar($n1, $n2, $n3, $n4, $n5);
    }

    public static function resolverProblema2(int $cantidadLimite): array
    {
        return Problema2::ejecutar($cantidadLimite);
    }

    public static function resolverProblema3(): int
    {
        return Problema3::ejecutar();
    }

    public static function resolverProblema4(): array
    {
        return Problema4::ejecutar();
    }

    public static function resolverProblema5(array $edades): array
    {
        return Problema5::ejecutar($edades);
    }

    public static function resolverProblema6(float $presupuestoTotal): array
    {
        return Problema6::ejecutar($presupuestoTotal);
    }

    public static function resolverProblema7(array $notasUsuario): array
    {
        return Problema7::ejecutar($notasUsuario);
    }

    public static function resolverProblema8(string $fecha): array
    {
        return Problema8::ejecutar($fecha);
    }

    public static function resolverProblema9(int $base): array
    {
        return Problema9::ejecutar($base);
    }
}
