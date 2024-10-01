<?php
if (isset($_COOKIE['usuario'])) {
    echo 'Bienvenido ' . $_COOKIE['usuario'];
} else {
    echo 'Hola, invitado';
}

// Inicializa el contador de visitas para esta página si aún no se ha establecido
if (!isset($_COOKIE['visitas_calculadoraPresion'])) {
    setcookie('visitas_calculadoraPresion', 1, time() + (86400 * 30), "/"); // 86400 = 1 día
    echo '<br> Esta es tu visita número 1 a esta página.';
} else {
    // Si ya se ha establecido, incrementa el contador de visitas
    $visitas = $_COOKIE['visitas_calculadoraPresion'] + 1;
    setcookie('visitas_calculadoraPresion', $visitas, time() + (86400 * 30), "/"); // 86400 = 1 día
    echo '<br> Esta es tu visita número ' . $visitas . ' a esta página.';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presion</title>
    <link rel="stylesheet" href="../css/calculadoraPresion.css">
</head>
<body>

    <nav>
        <ul class="menu">
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="../paginas/calculadora_imc.php">IMC</a></li>
            <li><a href="../glucosa/calculadoraGlucosa.php">Glucosa</a></li>
            <li><a href="../PresionArterial/calculadoraPresion.php">Presión</a></li>
            <li><a href="../paginas/contactanos.php">Contáctanos</a></li>
        </ul>
    </nav>

    <div class="h2-1">
        <h2>
            Mide tu Presion Arterial
        </h2>
        <p>
            Coloca la lectura de tu Presion Sistolica (mm Hg) y Presion Diastolica (mm Hg)
        </p>
    </div>
    <form class="formulario" action="../resultados/res_arterial.php" method="post">
        <h2 class="h2-2">Conoce tu riesgo de padecer Presión Alta</h2><br>
        <input type="number" placeholder="Lectura de Presion Sistolica (mm Hg)" name="sistolica" required>
        <input type="number" placeholder="Lectura de Presion Diastolica (mm Hg)" name="diastolica" required>
        <input type="submit" value="Enviar">
    </form>  

    <footer>
        Copyright © Todos los derechos reservados por Michael Solis & Andrés Villarreal
    </footer>


</body>
</html>
