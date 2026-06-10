<?php

if (isset($_COOKIE['usuario'])) {
    echo 'El usuario es: ' . htmlspecialchars((string) $_COOKIE['usuario'], ENT_QUOTES, 'UTF-8') . '<br>';
    echo 'Está configurada la Cookie<br>';
}

echo '<br>';


if (count($_COOKIE) > 0) {
    echo 'hay ' . count($_COOKIE) . ' cookies guardadas ';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página 2</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="wrap">
    <header>
        <div>
            <h1>Página 2</h1>
            <p>Vista de la cookie creada y eliminación posterior.</p>
        </div>
        <div><a class="btn" href="CookiesPHP.php">Volver a CookiesPHP</a></div>
    </header>
</div>
</body>
</html>
