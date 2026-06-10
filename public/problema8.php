<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Luis\LaboratorioAutoload\Utilidades\Problemas\Problema8;
use Luis\LaboratorioAutoload\Utilidades\SeguridadWeb;

$fecha = '';
$resultado = null;
$error = null;
// Procesar el formulario al enviarlo
// Se verifica que el método de la solicitud sea POST para procesar el formulario y se obtiene la fecha enviada por el usuario. Si no se proporciona una fecha, se muestra un
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'] ?? '';
    if ($fecha === '') {
        $error = 'Por favor selecciona una fecha.';
    } else {
        $resultado = Problema8::ejecutar($fecha);
    }
}
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Problema 8 — Estación del año</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page-shell">
<div class="wrap">
  <header>
    <div class="header-badge">🌍 Fechas · Problema 8</div>
    <h1>Estación <span style="background:linear-gradient(90deg,var(--accent),var(--accent-3));-webkit-background-clip:text;-webkit-text-fill-color:transparent">del año</span></h1>
    <p class="subtitle">Determina la estación del año correspondiente a una fecha (hemisferio norte).</p>
    <a href="index.php" class="btn" style="width:max-content;padding:10px 20px;font-size:.88rem">← Volver al índice</a>
  </header>

  <?php if ($error): ?><div class="error-box">⚠️ <?php echo SeguridadWeb::sanitizarSalida($error);?></div><?php endif; ?>

  <form method="POST">
    <div class="single-input" style="margin-bottom:20px">
      <label>Selecciona una fecha</label>
      <input type="date" name="fecha" value="<?php echo SeguridadWeb::sanitizarSalida($fecha);?>" required>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn">Determinar →</button>
      <a href="problema8.php" class="btn" style="background:var(--surface-2);color:var(--muted);border:1.5px solid var(--border);box-shadow:none">Limpiar</a>
    </div>
  </form>

  <?php if ($resultado && isset($resultado['nombre'])): ?>
  <div class="estacion-hero" style="background:<?php echo $resultado['bg'];?>;border-color:<?php echo $resultado['border'];?>">
    <img src="<?php echo SeguridadWeb::sanitizarSalida($resultado['image']); ?>" alt="Estación <?php echo SeguridadWeb::sanitizarSalida($resultado['nombre']);?>" style="width:100%;max-width:360px;border-radius:18px;box-shadow:var(--shadow);margin:0 auto 16px;display:block;object-fit:cover;height:180px;">
    <span class="est-icon"><?php echo $resultado['icon'];?></span>
    <div class="est-nombre"><?php echo SeguridadWeb::sanitizarSalida($resultado['nombre']);?></div>
    <div class="est-desc"><?php echo SeguridadWeb::sanitizarSalida($resultado['desc']);?></div>
    <div class="est-fecha" style="color:<?php echo $resultado['color'];?>"><?php echo SeguridadWeb::sanitizarSalida($resultado['fecha_fmt']);?></div>
  </div>
  <div class="tabla-est">
    <div class="tabla-row"><span class="lbl">Mes</span><span class="val"><?php echo $resultado['mes'];?></span></div>
    <div class="tabla-row"><span class="lbl">Día</span><span class="val"><?php echo $resultado['dia'];?></span></div>
    <div class="tabla-row"><span class="lbl">Hemisferio</span><span class="val">Norte</span></div>
    <div class="tabla-row"><span class="lbl">Estación</span><span class="val" style="color:<?php echo $resultado['color'];?>"><?php echo SeguridadWeb::sanitizarSalida($resultado['nombre']);?></span></div>
  </div>
  <?php endif; ?>

  <?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
