<?php
require_once __DIR__ . '/../vendor/autoload.php';

$suma = 0;
for ($i = 1; $i <= 1000; $i++) $suma += $i;
$formula = (1000 * 1001) / 2;
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Problema 3 — Suma 1..1000</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page-shell">
<div class="wrap">
  <header>
    <div class="header-badge">➕ Suma acumulada · Problema 3</div>
    <h1>Suma <span style="background:linear-gradient(90deg,var(--accent),var(--accent-2));-webkit-background-clip:text;-webkit-text-fill-color:transparent">1 al 1000</span></h1>
    <p class="subtitle">Suma de todos los números enteros del 1 al 1000, calculada con un bucle iterativo.</p>
    <a href="index.php" class="btn" style="width:max-content;padding:10px 20px;font-size:.88rem">← Volver al índice</a>
  </header>

  <div class="result-hero">
    <div class="label">Resultado</div>
    <div class="big-num"><?php echo number_format($suma, 0, ',', '.'); ?></div>
    <div class="badge-check">✓ Verificado con fórmula de Gauss</div>
  </div>

  <div class="info-cards">
    <div class="info-card">
      <div class="lbl">Rango</div>
      <div class="val">1 → 1000</div>
    </div>
    <div class="info-card">
      <div class="lbl">Total iteraciones</div>
      <div class="val">1,000</div>
    </div>
    <div class="info-card">
      <div class="lbl">Fórmula Gauss</div>
      <div class="val"><?php echo number_format($formula, 0, ',', '.'); ?></div>
    </div>
    <div class="info-card">
      <div class="lbl">Coincide</div>
      <div class="val" style="color:var(--accent-2)"><?php echo $suma === $formula ? '✓ Sí' : '✗ No'; ?></div>
    </div>
  </div>

  <div class="formula-box">
    <p>Fórmula de Gauss: <strong>n × (n + 1) / 2</strong> → <strong>1000 × 1001 / 2 = <?php echo number_format($formula,0,',','.'); ?></strong></p>
  </div>

  <?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
