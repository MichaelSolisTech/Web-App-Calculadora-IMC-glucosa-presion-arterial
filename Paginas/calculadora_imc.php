<?php
if (isset($_COOKIE['usuario'])) {
    echo 'Bienvenido ' . $_COOKIE['usuario'];
} else {
    echo 'Hola, invitado';
}

// Inicializa el contador de visitas para esta página si aún no se ha establecido
if (!isset($_COOKIE['visitas_imc'])) {
    setcookie('visitas_imc', 1, time() + (86400 * 30), "/"); // 86400 = 1 día
    echo '<br> Esta es tu visita número 1 a esta página.';
} else {
    // Si ya se ha establecido, incrementa el contador de visitas
    $visitas = $_COOKIE['visitas_imc'] + 1;
    setcookie('visitas_imc', $visitas, time() + (86400 * 30), "/"); // 86400 = 1 día
    echo '<br> Esta es tu visita número ' . $visitas . ' a esta página.';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IMC</title>
    <link rel="stylesheet" href="../css/calculadora_imc.css">
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

    <div class="h2">
        <h2>
            Mide tu Peso Corporal
        </h2>
        <p>
            Coloca en la lectura tu nombre, tu peso, y tu altura
        </p>
    </div>

    <div class="contenedor-formulario">
        <h1>Calculadora IMC</h1>
        <form action="../calcular.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" required placeholder="Ingresa tu nombre" pattern="^[a-zA-Z]+$" name="nombre"><br><br>
            <label for="peso">Peso (KG)</label>
            <input type="number" id="peso" required placeholder="Ingresa tu peso" min="0" name="peso"><br><br>
            <label for="estatura">Estatura(Mts)</label>
            <input type="number" id="estatura" required placeholder="Ingresa tu estatura en metros" step="0.01" min="0" max="2.7" name="estatura">
            <br><br>
            <input type="submit" value="Enviar"></button>
        </form>
    </div>




    <footer>
        Copyright © Todos los derechos reservados por Michael Solis & Andrés Villarreal
    </footer>

</body>
</html>