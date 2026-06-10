<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Luis\LaboratorioAutoload\Utilidades\Problemas\Problema6;
use Luis\LaboratorioAutoload\Utilidades\SeguridadWeb;

$resultado = null;
$error = null;
$presupuesto = '';

$pcts = ['Ginecología' => 40, 'Traumatología' => 35, 'Pediatría' => 25];
$icons = ['Ginecología' => '🏥', 'Traumatología' => '🦴', 'Pediatría' => '👶'];
$colors = [
    'Ginecología' => ['bg' => '#eef1ff', 'border' => '#d0dcff', 'text' => 'var(--accent)', 'accent' => '#6c7cff'],
    'Traumatología' => ['bg' => '#e8fdf8', 'border' => '#b8f0e4', 'text' => 'var(--accent-2)', 'accent' => '#2ad4b8'],
    'Pediatría' => ['bg' => '#fff8ee', 'border' => '#ffe4b0', 'text' => 'var(--accent-3)', 'accent' => '#ffb85c'],
];
$pieStops = [];
$start = 0;
foreach ($pcts as $dep => $pct) {
    $end = $start + $pct;
    $pieStops[] = $colors[$dep]['accent'] . ' ' . $start . '% ' . $end . '%';
    $start = $end;
}
$pieGradient = 'conic-gradient(' . implode(', ', $pieStops) . ')';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $presupuesto = $_POST['presupuesto'] ?? '';
    if ($presupuesto === '' || !is_numeric($presupuesto) || (float) $presupuesto <= 0) {
        $error = 'Ingresa un presupuesto válido mayor a 0.';
    } else {
        $base = (float) $presupuesto;
        $raw = Problema6::ejecutar($base);
        $resultado = [
            'Ginecología' => $raw['Ginecologia'],
            'Traumatología' => $raw['Traumatologia'],
            'Pediatría' => $raw['Pediatria'],
        ];
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Problema 6 — Presupuesto hospital</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page-shell">
<div class="wrap">
  <header>
    <div class="header-badge">💊 Finanzas · Problema 6</div>
    <h1>Presupuesto <span style="background:linear-gradient(90deg,var(--accent),var(--accent-3));-webkit-background-clip:text;-webkit-text-fill-color:transparent">hospital</span></h1>
    <p class="subtitle">Reparte el presupuesto anual: Ginecología 40%, Traumatología 35%, Pediatría 25%.</p>
    <a href="index.php" class="btn" style="width:max-content;padding:10px 20px;font-size:.88rem">← Volver al índice</a>
  </header>

  <?php if ($error): ?><div class="error-box">⚠️ <?php echo SeguridadWeb::sanitizarSalida($error);?></div><?php endif; ?>

  <form method="POST">
    <div class="single-input" style="margin-bottom:20px">
      <label>Presupuesto anual total</label>
      <div class="currency-wrap">
        <span class="prefix">$</span>
        <input type="number" name="presupuesto" step="0.01" min="1" value="<?php echo SeguridadWeb::sanitizarSalida((string) $presupuesto);?>" placeholder="100000" required>
      </div>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn">Repartir →</button>
      <a href="problema6.php" class="btn" style="background:var(--surface-2);color:var(--muted);border:1.5px solid var(--border);box-shadow:none">Limpiar</a>
    </div>
  </form>

  <?php if ($resultado): ?>
  <div class="chart-grid">
    <article class="pie-card">
      <div class="pie-chart" style="background:<?php echo SeguridadWeb::sanitizarSalida($pieGradient); ?>"></div>
      <div>
        <h3 style="margin:0 0 6px;font-family:'Syne',sans-serif;font-size:1rem;">Gráfica de pastel</h3>
        <p class="pie-caption">Distribución visual del presupuesto anual entre las tres áreas del hospital.</p>
      </div>
    </article>

    <article class="legend-card">
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
        <h3 style="margin:0;font-family:'Syne',sans-serif;font-size:.9rem;text-transform:uppercase;letter-spacing:.08em;color:var(--muted);">Detalle</h3>
        <span class="pill">100% total</span>
      </div>
      <div class="legend-list">
        <?php foreach ($resultado as $dep => $monto):
          $c = $colors[$dep] ?? ['accent' => '#94a3b8', 'text' => 'var(--text)'];
        ?>
        <div class="legend-item">
          <div class="legend-main">
            <span class="legend-dot" style="background:<?php echo $c['accent']; ?>"></span>
            <div>
              <div class="legend-name"><?php echo SeguridadWeb::sanitizarSalida($dep); ?></div>
              <div class="legend-meta"><?php echo $pcts[$dep]; ?>% · <?php echo $icons[$dep]; ?> Área</div>
            </div>
          </div>
          <div class="legend-amount">$<?php echo number_format($monto, 2, ',', '.'); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </article>
  </div>
  <?php endif; ?>
</div>
</div>
</body>
</html>
