<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Luis\LaboratorioAutoload\Utilidades\Problemas\SolucionadorProblemas;
use Luis\LaboratorioAutoload\Utilidades\SeguridadWeb;

$resultado = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nums = [];
    $valido = true;
    for ($i = 1; $i <= 5; $i++) {
        $val = $_POST["n{$i}"] ?? '';
        if ($val === '' || !is_numeric($val)) { 
            $valido = false; 
            break; 
        }
        $nums[] = (float)$val;
    }
    
    if (!$valido) {
        $error = 'Por favor ingresa los 5 números correctamente.';
    } else {
        // Delegamos la lógica al Solucionador de Problemas
        $resultado = SolucionadorProblemas::resolverProblema1(...$nums);
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Problema 1 — Media y desviación</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page-shell">
<div class="wrap">
  <header>
    <div class="header-badge">📊 Estadística · Problema 1</div>
    <h1>Media y <span style="background:linear-gradient(90deg,var(--accent),var(--accent-2));-webkit-background-clip:text;-webkit-text-fill-color:transparent">desviación</span></h1>
    <p class="subtitle">Calcula la media, desviación estándar, mínimo y máximo de 5 números.</p>
    <a href="index.php" class="btn" style="width:max-content;padding:10px 20px;font-size:.88rem">← Volver al índice</a>
  </header>

  <?php if ($error): ?>
    <div class="error-box">⚠️ <?php echo SeguridadWeb::sanitizarSalida($error); ?></div>
  <?php endif; ?>

  <form method="POST">
    <div class="num-grid">
      <?php
      $dots = ['#4f6ef7','#7b6ef7','#38c9b0','#f7a84f','#e95b8e'];
      for ($i=1;$i<=5;$i++):
        $val = isset($resultado) ? $resultado['nums'][$i-1] : ($_POST["n{$i}"] ?? '');
      ?>
      <div class="num-group">
        <label>
          <span class="num-dot" style="background:<?php echo $dots[$i-1];?>"></span>
          Número <?php echo $i; ?>
        </label>
        <input type="number" step="any" name="n<?php echo $i;?>" value="<?php echo SeguridadWeb::sanitizarSalida((string)$val);?>" placeholder="0" required>
      </div>
      <?php endfor; ?>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn">Calcular →</button>
      <a href="problema1.php" class="btn" style="background:var(--surface-2);color:var(--muted);border:1.5px solid var(--border);box-shadow:none">Limpiar</a>
    </div>
  </form>

  <?php if ($resultado): ?>
  <div class="results-grid">
    <div class="res-card media"><div class="res-label">μ · Media</div><div class="res-value"><?php echo $resultado['media'];?></div></div>
    <div class="res-card desv"><div class="res-label">σ · Desv. estándar</div><div class="res-value"><?php echo $resultado['desv'];?></div></div>
    <div class="res-card min"><div class="res-label">↓ Mínimo</div><div class="res-value"><?php echo $resultado['min'];?></div></div>
    <div class="res-card max"><div class="res-label">↑ Máximo</div><div class="res-value"><?php echo $resultado['max'];?></div></div>
  </div>
  <?php endif; ?>
</div>
</div>
</body>
</html>