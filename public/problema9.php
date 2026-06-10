<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Luis\LaboratorioAutoload\Utilidades\Problemas\Problema9;
use Luis\LaboratorioAutoload\Utilidades\SeguridadWeb;

$base = 4;
$resultado = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {// Validar el número base ingresado por el usuario
    $base = $_POST['base'] ?? 4;
    if (!ctype_digit((string) $base) || (int) $base < 1 || (int) $base > 9) {
        $error = 'Ingresa un número entero entre 1 y 9.';
    } else {
        $resultado = Problema9::ejecutar((int) $base);
    }// Si la entrada es válida, ejecutamos el problema para generar las potencias
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Problema 9 — Potencias</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page-shell">
<div class="wrap">
  <header>
    <div class="header-badge">🔋 Matemáticas · Problema 9</div>
    <h1>Potencias de <span style="background:linear-gradient(90deg,var(--accent),var(--accent-2));-webkit-background-clip:text;-webkit-text-fill-color:transparent">1 a 15</span></h1>
    <p class="subtitle">Genera las primeras 15 potencias de un número base entre 1 y 9.</p>
    <a href="index.php" class="btn" style="width:max-content;padding:10px 20px;font-size:.88rem">← Volver al índice</a>
  </header>

  <?php if ($error): ?><div class="error-box">⚠️ <?php echo SeguridadWeb::sanitizarSalida($error);?></div><?php endif; ?>

  <form method="POST">
    <div class="single-input" style="margin-bottom:20px">
      <label>Base (1–9)</label>
      <input type="number" name="base" min="1" max="9" value="<?php echo SeguridadWeb::sanitizarSalida((string) $base);?>" placeholder="Ej: 3" required>
      <p class="base-hint">Se calcularán base¹ hasta base¹⁵</p>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn">Generar →</button>
      <a href="problema9.php" class="btn" style="background:var(--surface-2);color:var(--muted);border:1.5px solid var(--border);box-shadow:none">Limpiar</a>
    </div>
  </form>

  <?php if ($resultado): ?>
  <div class="pow-table">
    <?php foreach ($resultado as $p): ?>
    <div class="pow-row">
      <div>
        <div class="pow-base"><?php echo $base;?><sup><?php echo $p['exp'];?></sup></div>
        <div class="pow-exp">Exponente <?php echo $p['exp'];?></div>
      </div>
      <div class="pow-val"><?php echo number_format($p['val'],0,',','.'); ?></div>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="big-last">
    <div class="lbl">Potencia máxima<br><?php echo $base;?><sup>15</sup></div>
    <div class="val"><?php echo number_format(end($resultado)['val'],0,',','.'); ?></div>
  </div>
  <?php endif; ?>

  <?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
