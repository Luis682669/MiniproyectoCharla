<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Luis\LaboratorioAutoload\Usuario;
use Luis\LaboratorioAutoload\Utilidades\SeguridadWeb;
// Crear un usuario de ejemplo y definir los problemas disponibles
$usuario = new Usuario('Luis');
$problemas = [
    // se agrega aquí los problemas con su descripción, enlace y etiqueta
    [
        'id' => 1,
        'titulo' => 'Media y desviación',
        'descripcion' => 'Calcular media, desviación estándar, mínimo y máximo de 5 números.',
        'link' => 'problema1.php',
        'tag' => '5 inputs'
    ],
    [
        'id' => 2,
        'titulo' => 'Múltiplos de 4',
        'descripcion' => 'Imprimir los N primeros múltiplos de 4 según el valor ingresado.',
        'link' => 'problema2.php',
        'tag' => '1 input'
    ],
    [
        'id' => 3,
        'titulo' => 'Suma 1..1000',
        'descripcion' => 'Calcular la suma de todos los números del 1 al 1000.',
        'link' => 'problema3.php',
        'tag' => 'Sin input'
    ],
    [
        'id' => 4,
        'titulo' => 'Pares e impares',
        'descripcion' => 'Sumar todos los números pares e impares entre 1 y 200.',
        'link' => 'problema4.php',
        'tag' => 'Sin input'
    ],
    [
        'id' => 5,
        'titulo' => 'Clasificar edades',
        'descripcion' => 'Leer 5 edades y asignar categorías: niño, adolescente, adulto y adulto mayor.',
        'link' => 'problema5.php',
        'tag' => '5 inputs'
    ],
    [
        'id' => 6,
        'titulo' => 'Presupuesto hospital',
        'descripcion' => 'Repartir el presupuesto anual en Ginecología, Traumatología y Pediatría.',
        'link' => 'problema6.php',
        'tag' => '1 input'
    ],
    [
        'id' => 7,
        'titulo' => 'Notas estadísticas',
        'descripcion' => 'Calcular estadísticas de N notas ingresadas por el usuario.',
        'link' => 'problema7.php',
        'tag' => 'N inputs'
    ],
    [
        'id' => 8,
        'titulo' => 'Estación del año',
        'descripcion' => 'Determinar la estación según la fecha ingresada.',
        'link' => 'problema8.php',
        'tag' => '1 input'
    ],
    [
        'id' => 9,
        'titulo' => 'Potencias',
        'descripcion' => 'Generar las primeras 15 potencias de un número entre 1 y 9.',
        'link' => 'problema9.php',
        'tag' => '1 input'
    ],
];
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Laboratorio Autoload</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page-shell">
	<div class="page-header">
		<div class="header-badge">PSR-4 • ACTIVO</div>
		<h1>Laboratorio Autoload</h1>
		<p class="subtitle">Selecciona un problema para ejecutarlo por separado y ver la lógica aislada.</p>
		<div class="user-card">
			<span class="user-icon">L</span>
			<div>
				<p>Bienvenido</p>
				<strong><?php echo SeguridadWeb::sanitizarSalida($usuario->saludar()); ?></strong>
			</div>
		</div>
	</div>

	<div class="presentation-cta">
		<div>
			<h2>Presentación estilo PPT</h2>
			<p>Recorre cada problema como si fuera una diapositiva. Ideal para mostrar el enunciado y la lógica en un formato visual.</p>
		</div>
		<a class="btn" href="presentacion.php">Abrir presentación</a>
	</div>

	<div class="grid">
		<?php foreach ($problemas as $problema): ?>
		<div class="card">
			<div class="card-meta"></div>
			<h2>Problema <?php echo $problema['id']; ?></h2>
			<p><?php echo SeguridadWeb::sanitizarSalida($problema['descripcion']); ?></p>
			<div class="card-footer">
				<a class="btn" href="<?php echo $problema['link']; ?>">Abrir →</a>
				<span class="pill"><?php echo SeguridadWeb::sanitizarSalida($problema['tag']); ?></span>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
</body>
</html>
