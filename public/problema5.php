<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Luis\LaboratorioAutoload\Utilidades\Problemas\Problema5;
use Luis\LaboratorioAutoload\Utilidades\SeguridadWeb;

$edades = [0, 0, 0, 0, 0];
$resultado = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valido = true;
    for ($i = 0; $i < 5; $i++) {
        $valor = $_POST["edad$i"] ?? '';
        if ($valor === '' || !ctype_digit((string) $valor)) {
            $valido = false;
            break;
        }
        $edades[$i] = (int) $valor;
    }

    if (!$valido) {
        $error = 'Por favor ingresa 5 edades válidas (números enteros positivos).';
    } else {
        $resultado = Problema5::ejecutar($edades);
    }
}//

$labels = [
    'nino' => ['label' => 'Niños', 'icon' => '🧒', 'tone' => '#eef1ff'],
    'adolescente' => ['label' => 'Adolescentes', 'icon' => '🧑', 'tone' => '#e8fdf8'],
    'adulto' => ['label' => 'Adultos', 'icon' => '👤', 'tone' => '#fff8ee'],
    'adultoMayor' => ['label' => 'Adultos mayores', 'icon' => '🧓', 'tone' => '#fff0f5'],
];
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Problema 5 — Clasificar edades</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page-shell">
<div class="wrap">
  <header>
    <div class="header-badge">👥 Clasificación · Problema 5</div>
    <h1>Clasificar <span style="background:linear-gradient(90deg,var(--accent),var(--accent-4));-webkit-background-clip:text;-webkit-text-fill-color:transparent">edades</span></h1>
    <p class="subtitle">Ingresa 5 edades y obtén la distribución por categorías de forma clara y visual.</p>
    <a href="index.php" class="btn" style="width:max-content;padding:10px 20px;font-size:.88rem">← Volver al índice</a>
  </header>

  <?php if ($error): ?><div class="error-box">⚠️ <?php echo SeguridadWeb::sanitizarSalida($error); ?></div><?php endif; ?>

  <form method="post" class="card" style="padding:18px;">
    <div class="num-grid">
      <?php
      $dots = ['#4f6ef7', '#7b6ef7', '#38c9b0', '#f7a84f', '#e95b8e'];
      for ($i = 0; $i < 5; $i++):
      ?>
      <div class="num-group">
        <label><span class="num-dot" style="background:<?php echo $dots[$i]; ?>"></span>Edad <?php echo $i + 1; ?></label>
        <input id="edad<?php echo $i; ?>" name="edad<?php echo $i; ?>" type="number" min="0" max="130" placeholder="Ej. 28" value="<?php echo SeguridadWeb::sanitizarSalida((string) $edades[$i]); ?>" required>
      </div>
      <?php endfor; ?>
    </div>
    <div class="form-actions">
      <button class="btn" type="submit">Clasificar →</button>
      <a href="problema5.php" class="btn" style="background:var(--surface-2);color:var(--muted);border:1.5px solid var(--border);box-shadow:none">Limpiar</a>
    </div>
  </form>

  <?php if ($resultado !== null): ?>
  <section class="card" style="padding:18px;">
    <h3 style="margin-bottom:8px;">Resumen de clasificación</h3>
    <p class="subtitle" style="margin-bottom:0;">Distribución obtenida con las 5 edades ingresadas.</p>
    <div class="summary-grid">
      <?php foreach ($labels as $key => $item): $count = $resultado[$key] ?? 0; ?>
      <article class="summary-card" style="background:<?php echo $item['tone']; ?>; border-color:<?php echo $key === 'adulto' ? '#ffe4b0' : ($key === 'adultoMayor' ? '#ffcce0' : '#dfe7ff'); ?>;">
        <div class="tag"><span><?php echo $item['icon']; ?></span> <?php echo $item['label']; ?></div>
        <div class="count"><?php echo $count; ?></div>
      </article>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endif; ?>

  <?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
