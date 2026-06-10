<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Luis\LaboratorioAutoload\Usuario;
use Luis\LaboratorioAutoload\Utilidades\SeguridadWeb;

$usuario = new Usuario('Luis');
$slides = [
    [
        'titulo' => 'Problema 1',
        'subtitulo' => 'Calcular estadísticas de 5 números',
        'contenido' => [
            'Media aritmética, desviación estándar, valor mínimo y valor máximo.',
            'Entrada: 5 números positivos desde un formulario.',
            'Salida: resumen estadístico de los valores recibidos.'
        ]
    ],
    [
        'titulo' => 'Problema 2',
        'subtitulo' => 'N primeros múltiplos de 4',
        'contenido' => [
            'Generar la secuencia 4, 8, 12, ... según el valor ingresado.',
            'Entrada: un número N.',
            'Salida: primeros N múltiplos de 4 en orden ascendente.'
        ]
    ],
    [
        'titulo' => 'Problema 3',
        'subtitulo' => 'Suma de 1 a 1000',
        'contenido' => [
            'Calcular la suma de todos los números del 1 al 1000.',
            'Proceso: acumulador simple en un bucle.',
            'Salida: un único valor numérico.'
        ]
    ],
    [
        'titulo' => 'Problema 4',
        'subtitulo' => 'Sumar pares e impares',
        'contenido' => [
            'Separar los números del 1 al 200 en pares e impares.',
            'Calcular la suma de cada grupo.',
            'Salida: totales para pares e impares.'
        ]
    ],
    [
        'titulo' => 'Problema 5',
        'subtitulo' => 'Clasificar edades',
        'contenido' => [
            'Leer 5 edades e identificar categorías.',
            'Categorías: niño, adolescente, adulto y adulto mayor.',
            'Salida: conteo por categoría.'
        ]
    ],
    [
        'titulo' => 'Problema 6',
        'subtitulo' => 'Presupuesto hospitalario',
        'contenido' => [
            'Distribuir presupuesto entre tres áreas.',
            'Porcentajes: Ginecología 40%, Traumatología 35%, Pediatría 25%.',
            'Salida: valores asignados a cada servicio.'
        ]
    ],
    [
        'titulo' => 'Problema 7',
        'subtitulo' => 'Notas estadísticas',
        'contenido' => [
            'Calcular media, desviación, mínimo y máximo de N notas.',
            'Entrada: lista dinámica de notas.',
            'Salida: resumen estadístico completo.'
        ]
    ],
    [
        'titulo' => 'Problema 8',
        'subtitulo' => 'Estación del año',
        'contenido' => [
            'Determinar estación según fecha ingresada.',
            'Evaluar mes y día para identificar estación.',
            'Salida: Verano, Otoño, Invierno o Primavera.'
        ]
    ],
    [
        'titulo' => 'Problema 9',
        'subtitulo' => 'Primeras 15 potencias',
        'contenido' => [
            'Generar potencias de una base entre 1 y 9.',
            'Cálculo desde exponente 1 hasta 15.',
            'Salida: lista de valores potenciados.'
        ]
    ]
];
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Presentación de Problemas</title>
  <link rel="stylesheet" href="assets/presentation.css">
</head>
<body>
<div class="presentation-shell">
  <header class="presentation-header">
    <div>
      <p class="presentation-tag">Presentación</p>
      <h1>Problemas de Laboratorio</h1>
      <p class="presentation-intro">Navega cada problema como una diapositiva visual y abre el ejercicio directamente desde aquí.</p>
    </div>
    <div class="presentation-user">
      <span class="user-avatar">L</span>
      <div>
        <p>Bienvenido</p>
        <strong><?php echo SeguridadWeb::sanitizarSalida($usuario->saludar()); ?></strong>
      </div>
    </div>
  </header>

  <div class="presentation-controls">
    <div class="slides">
      <?php foreach ($slides as $index => $slide): ?>
        <section class="slide <?php echo $index === 0 ? 'active' : ''; ?>" data-slide="<?php echo $index + 1; ?>">
          <div class="slide-card">
            <div class="slide-header">
              <span class="slide-number">Diapositiva <?php echo $index + 1; ?> / <?php echo count($slides); ?></span>
              <h2><?php echo SeguridadWeb::sanitizarSalida($slide['titulo']); ?></h2>
              <p class="slide-subtitle"><?php echo SeguridadWeb::sanitizarSalida($slide['subtitulo']); ?></p>
            </div>
            <ul class="slide-list">
              <?php foreach ($slide['contenido'] as $item): ?>
                <li><?php echo SeguridadWeb::sanitizarSalida($item); ?></li>
              <?php endforeach; ?>
            </ul>
            <div class="slide-actions">
              <a class="btn" href="problema<?php echo $index + 1; ?>.php">Abrir problema</a>
              <span class="badge">Slide <?php echo $index + 1; ?></span>
            </div>
          </div>
        </section>
      <?php endforeach; ?>
    </div>

    <div class="presentation-nav">
      <button type="button" class="nav-button prev">Anterior</button>
      <div class="nav-dots">
        <?php foreach ($slides as $index => $slide): ?>
          <button type="button" class="nav-dot <?php echo $index === 0 ? 'active' : ''; ?>" data-target="<?php echo $index + 1; ?>"></button>
        <?php endforeach; ?>
      </div>
      <button type="button" class="nav-button next">Siguiente</button>
    </div>
  </div>
</div>
<script>
  (function(){
    const slides = Array.from(document.querySelectorAll('.slide'));
    const dots = Array.from(document.querySelectorAll('.nav-dot'));
    const prev = document.querySelector('.nav-button.prev');
    const next = document.querySelector('.nav-button.next');
    let activeIndex = 0;

    const update = (index) => {
      activeIndex = index;
      slides.forEach((slide, idx) => slide.classList.toggle('active', idx === activeIndex));
      dots.forEach((dot, idx) => dot.classList.toggle('active', idx === activeIndex));
    };

    dots.forEach((dot, idx) => dot.addEventListener('click', () => update(idx)));

    prev.addEventListener('click', () => {
      const nextIndex = activeIndex === 0 ? slides.length - 1 : activeIndex - 1;
      update(nextIndex);
    });

    next.addEventListener('click', () => {
      const nextIndex = activeIndex === slides.length - 1 ? 0 : activeIndex + 1;
      update(nextIndex);
    });
  })();
</script>
</body>
</html>
