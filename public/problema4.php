<?php
require_once __DIR__ . '/../vendor/autoload.php';// Este problema no requiere inputs del usuario, por lo que simplemente ejecutamos la lógica al cargar la página
// Este problema no requiere inputs del usuario, por lo que simplemente ejecutamos la lógica al cargar la página
$sumaPares = 0;
$sumaImpares = 0;
for ($i = 1; $i <= 200; $i++) {
    if ($i % 2 === 0) $sumaPares += $i;
    else $sumaImpares += $i;
}
$total = $sumaPares + $sumaImpares;
$pctPares   = round($sumaPares / $total * 100, 1);
$pctImpares = round($sumaImpares / $total * 100, 1);
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Problema 4 — Pares e impares</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page-shell">
<div class="wrap">
  <header>
    <div class="header-badge">⚡ Clasificación · Problema 4</div>
    <h1>Pares <span style="background:linear-gradient(90deg,var(--accent),var(--accent-2));-webkit-background-clip:text;-webkit-text-fill-color:transparent">&amp; impares</span></h1>
    <p class="subtitle">Suma de todos los números pares e impares entre 1 y 200.</p>
    <a href="index.php" class="btn" style="width:max-content;padding:10px 20px;font-size:.88rem">← Volver al índice</a>
  </header>

  <div class="dual-cards">
    <div class="dual-card pares">
      <div class="lbl">∑ Pares (2, 4 … 200)</div>
      <div class="num"><?php echo number_format($sumaPares,0,',','.'); ?></div>
      <div class="sub"><?php echo $pctPares; ?>% del total · 100 números</div>
    </div>
    <div class="dual-card impares">
      <div class="lbl">∑ Impares (1, 3 … 199)</div>
      <div class="num"><?php echo number_format($sumaImpares,0,',','.'); ?></div>
      <div class="sub"><?php echo $pctImpares; ?>% del total · 100 números</div>
    </div>
  </div>

  <div class="bar-wrap">
    <h3>Proporción</h3>
    <div class="bar-track">
      <div class="bar-pares"   style="width:<?php echo $pctPares;?>%"></div>
      <div class="bar-impares" style="width:<?php echo $pctImpares;?>%"></div>
    </div>
    <div class="bar-legend">
      <span><span class="dot" style="background:var(--accent)"></span>Pares <?php echo $pctPares;?>%</span>
      <span><span class="dot" style="background:var(--accent-2)"></span>Impares <?php echo $pctImpares;?>%</span>
    </div>
  </div>

  <div class="total-card">
    <div class="lbl">Suma total (1→200)</div>
    <div class="val"><?php echo number_format($total,0,',','.'); ?></div>
  </div>

  <?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
