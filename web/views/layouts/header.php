<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?=BASE_URL?>">
    <title>Comidas y cenas</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/iconos.css">
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>
    <nav class="nav">
        <h1>Comidas y cenas</h1>
        <?php if( Utils::validarUsuario() ): ?>
            <ul>
                <li><a href="semana"><i class="icono gg-calendar-dates"></i>Semana</a></li>
                <li><a href="comidas"><i class="icono gg-coffee"></i>Comidas</a></li>
            </ul>
        <?php endif; ?>
    </nav>