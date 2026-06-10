<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Luis\LaboratorioAutoload\Utilidades\SeguridadWeb;

$resultado = null;
$error = null;
$n = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = $_POST['n'] ?? '';
    if ($n === '' || !ctype_digit($n) || (int)$n < 1) {
        $error = 'Ingresa un número entero positivo.';
    } else {
        $n = (int)$n;
        $multiplos = [];
        for ($i = 1; $i <= $n; $i++) $multiplos[] = $i * 4;
        $resultado = $multiplos;
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Problema 2 — Múltiplos de 4</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page-shell">
<div class="wrap">
  <header>
    <div class="header-badge">🔢 Iteración · Problema 2</div>
    <h1>Múltiplos <span style="background:linear-gradient(90deg,var(--accent),var(--accent-2));-webkit-background-clip:text;-webkit-text-fill-color:transparent">de 4</span></h1>
    <p class="subtitle">Imprime los N primeros múltiplos de 4 según el valor ingresado.</p>
    <a href="index.php" class="btn" style="width:max-content;padding:10px 20px;font-size:.88rem">← Volver al índice</a>
  </header>

  <?php if ($error): ?>
    <div class="error-box">⚠️ <?php echo SeguridadWeb::sanitizarSalida($error);?></div>
  <?php endif; ?>

  <form method="POST">
    <div class="single-input" style="margin-bottom:20px">
      <label>¿Cuántos múltiplos quieres ver?</label>
      <input type="number" name="n" min="1" max="500" value="<?php echo SeguridadWeb::sanitizarSalida((string)$n);?>" placeholder="Ej: 10" required>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn">Generar →</button>
      <a href="problema2.php" class="btn" style="background:var(--surface-2);color:var(--muted);border:1.5px solid var(--border);box-shadow:none">Limpiar</a>
    </div>
  </form>

  <?php if ($resultado !== null): ?>
  <div class="multiplos-wrap">
    <h3>Resultado</h3>
    <div class="multiplos-grid">
      <?php foreach ($resultado as $m): ?>
        <span class="multiplo-chip"><?php echo $m;?></span>
      <?php endforeach; ?>
    </div>
    <div class="stat-pill">
      Total generado: <strong><?php echo count($resultado);?> múltiplos</strong> · Último: <strong><?php echo end($resultado);?></strong>
    </div>
  </div>
  <?php endif; ?>
</div>
</div>
</body>
</html>
