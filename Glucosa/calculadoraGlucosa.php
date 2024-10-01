<?php
if (isset($_COOKIE['usuario'])) {
    echo 'Bienvenido ' . $_COOKIE['usuario'];
} else {
    echo 'Hola, invitado';
}

// Inicializa el contador de visitas para esta página si aún no se ha establecido
if (!isset($_COOKIE['visitas_calculadoraGlucosa'])) {
    setcookie('visitas_calculadoraGlucosa', 1, time() + (86400 * 30), "/"); // 86400 = 1 día
    echo '<br> Esta es tu visita número 1 a esta página.';
} else {
    // Si ya se ha establecido, incrementa el contador de visitas
    $visitas = $_COOKIE['visitas_calculadoraGlucosa'] + 1;
    setcookie('visitas_calculadoraGlucosa', $visitas, time() + (86400 * 30), "/"); // 86400 = 1 día
    echo '<br> Esta es tu visita número ' . $visitas . ' a esta página.';
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glucosa</title>
    <link rel="stylesheet" href="../css/calculadoraGlucosa.css">
</head>
<body>
    <nav>
        <ul class="menu">
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="../paginas/calculadora_imc.php">IMC</a></li>
            <li><a href="calculadoraGlucosa.php">Glucosa</a></li>
            <li><a href="../PresionArterial/calculadoraPresion.php">Presión</a></li>
            <li><a href="../paginas/contactanos.php">Contáctanos</a></li>
        </ul>
    </nav>

    <div class="h2">
        <h2>
            Calculadora de Glucosa en Sangre
        </h2>
        <p>
            Coloca la lectura en tu glucometro (mg/dl) e indica si lo tomaste en ayunas o posterior a las comidas
        </p>
    </div>
    
    <form class="formulario" action="../resultados/res_glucosa.php" method="post">
        <h2 class="h2t">Conoce tu riesgo de padecer Diabetes</h2><br>
        <input type="number" name="lectura" placeholder="Lectura en Glucometro (mg/dl)" max="600" min="50" required>
        <div class="select1">
            <select class="select" name="tipo_lectura" id="tipo_lectura" required>
                <option value="Ayunas">Ayunas</option>
                <option value="Posprandial">Posprandial</option>
            </select><br><br>
        </div>  
        <input type="submit" value="Enviar">
    </form> 

    <footer>
        Copyright © Todos los derechos reservados por Michael Solis & Andrés Villarreal
    </footer>


</body>
</html>
