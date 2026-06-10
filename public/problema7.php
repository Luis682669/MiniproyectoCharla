<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Luis\LaboratorioAutoload\Utilidades\Problemas\Problema7;
use Luis\LaboratorioAutoload\Utilidades\SeguridadWeb;
// Este archivo es una página web que permite al usuario ingresar un conjunto de notas (separadas por coma, espacio o punto y coma) y muestra estadísticas como la media, desviación estándar, mínimo, máximo, mediana, cantidad total de notas, cantidad de aprobados (notas >= 11) y cantidad de desaprobados (notas < 11). También muestra las notas originales ordenadas y resaltadas según si son aprobadas o desaprobadas. El código maneja la validación de entrada y muestra mensajes de error si se ingresan valores no numéricos o fuera del rango permitido (0-20).
$notasRaw = '7.5, 8.0, 9.2, 6.8, 10.0, 5.5';
$resultado = null;
$error = null;
// Procesar el formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {// Validar y procesar las notas ingresadas por el usuario
    $notasRaw = trim($_POST['notas'] ?? '');
    if ($notasRaw === '') {
        $error = 'Por favor ingresa al menos una nota.';
    } else {
        $partes = preg_split('/[\s,;]+/', $notasRaw, -1, PREG_SPLIT_NO_EMPTY);
        $notas = [];
        $invalidas = [];
        foreach ($partes as $p) {// Validamos que cada parte sea un número entre 0 y 20
            if (!is_numeric($p) || (float) $p < 0 || (float) $p > 20) {
                $invalidas[] = $p;
            } else {
                $notas[] = (float) $p;
            }
        }
        if (!empty($invalidas)) {// Si hay valores inválidos, mostramos un mensaje de error con los valores problemáticos
            $error = 'Valores inválidos (deben ser números entre 0 y 20): ' . implode(', ', array_map('htmlspecialchars', $invalidas));
        } elseif (empty($notas)) {
            $error = 'No se encontraron notas válidas.';
        } else {
            $resultado = Problema7::ejecutar($notas);
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Problema 7 — Notas estadísticas</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page-shell">
<div class="wrap">
  <header>
    <div class="header-badge">📝 Estadística · Problema 7</div>
    <h1>Notas <span style="background:linear-gradient(90deg,var(--accent),var(--accent-2));-webkit-background-clip:text;-webkit-text-fill-color:transparent">estadísticas</span></h1>
    <p class="subtitle">Ingresa N notas (0–20) separadas por coma, espacio o punto y coma.</p>
    <a href="index.php" class="btn" style="width:max-content;padding:10px 20px;font-size:.88rem">← Volver al índice</a>
  </header>

  <?php if ($error): ?><div class="error-box">⚠️ <?php echo SeguridadWeb::sanitizarSalida($error);?></div><?php endif; ?>

  <form method="POST">
    <div style="margin-bottom:20px">
      <label>Notas (separadas por coma, espacio o punto y coma)</label>
      <textarea name="notas" rows="3" placeholder="Ej: 15, 12, 8, 17, 10, 14, 6"><?php echo SeguridadWeb::sanitizarSalida($notasRaw);?></textarea>
      <p class="hint">Escala vigesimal 0–20. Se calcularán media, desv. estándar, mínimo, máximo y mediana.</p>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn">Calcular →</button>
      <a href="problema7.php" class="btn" style="background:var(--surface-2);color:var(--muted);border:1.5px solid var(--border);box-shadow:none">Limpiar</a>
    </div>
  </form>

  <?php if ($resultado): ?>
  <div class="stats-grid">
    <div class="stat-card blue"><div class="stat-lbl">μ Media</div><div class="stat-val"><?php echo $resultado['media'];?></div></div>
    <div class="stat-card green"><div class="stat-lbl">σ Desv. estándar</div><div class="stat-val"><?php echo $resultado['desv'];?></div></div>
    <div class="stat-card orange"><div class="stat-lbl">↓ Mínimo</div><div class="stat-val"><?php echo $resultado['min'];?></div></div>
    <div class="stat-card pink"><div class="stat-lbl">↑ Máximo</div><div class="stat-val"><?php echo $resultado['max'];?></div></div>
    <div class="stat-card gray"><div class="stat-lbl">Mediana</div><div class="stat-val"><?php echo $resultado['mediana'];?></div></div>
    <div class="stat-card gray"><div class="stat-lbl">Total notas</div><div class="stat-val"><?php echo $resultado['cnt'];?></div></div>
    <div class="stat-card green"><div class="stat-lbl">✓ Aprobados</div><div class="stat-val"><?php echo $resultado['aprobados'];?></div></div>
    <div class="stat-card pink"><div class="stat-lbl">✗ Desaprobados</div><div class="stat-val"><?php echo $resultado['desaprobados'];?></div></div>
  </div>
  <div class="notas-list">
    <h3>Notas ingresadas (ordenadas)</h3>
    <div class="notas-chips">
      <?php foreach ($resultado['notas'] as $nota): ?>
      <span class="nota-chip <?php echo $nota >= 11 ? 'aprobado' : 'desaprobado';?>"><?php echo $nota;?></span>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

  <?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
