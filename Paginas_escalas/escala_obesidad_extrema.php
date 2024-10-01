<?php
if (isset($_COOKIE['usuario'])) {
    echo 'Bienvenido ' . $_COOKIE['usuario'];
} else {
    echo 'Hola, invitado';
}

// Inicializa el contador de visitas para esta página si aún no se ha establecido
if (!isset($_COOKIE['visitas_obesidad_extrema'])) {
    setcookie('visitas_obesidad_extrema', 1, time() + (86400 * 30), "/"); // 86400 = 1 día
    echo '<br> Esta es tu visita número 1 a esta página.';
} else {
    // Si ya se ha establecido, incrementa el contador de visitas
    $visitas = $_COOKIE['visitas_obesidad_extrema'] + 1;
    setcookie('visitas_obesidad_extrema', $visitas, time() + (86400 * 30), "/"); // 86400 = 1 día
    echo '<br> Esta es tu visita número ' . $visitas . ' a esta página.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escala_Obesidad</title>
    <link rel="stylesheet" href="../css/obesidad_extrema.css">
</head>
<body>

    <div class="contenedor">
        <header>
            <h1>Calculadora</h1>
            <img src="../img/BMI-1.png" alt="imagen sacada de google">
        </header>
    
        <div class="blanco"></div>
    
        <div class="menu-contenedor">
            <ul class="menu">
                <li><a href="../index.php" target="">Inicio</a></li>
                <li><a href="../paginas/calculadora_imc.php" target="">IMC</a></li>
                <li><a href="../glucosa/calculadoraGlucosa.php" target="">Glucosa</a></li>
                <li><a href="../PresionArterial/calculadoraPresion.php" target="">Presion Arterial</a></li>
                <li><a href="../paginas/contactanos.php" target="">Contáctanos</a></li>
                </ul>
            </div>
        
        <div class="conoce"><h2>Conoce tu IMC</h2></div>
        <div class="debajo"></div>

        <div class="bloque-informacion">
            <div class="informacion">
                <p>Tu nombre es: <span id="nombre"></span></p>
                <p>Tu IMC es: <span id="imc"></span></p>
                <p>Tu estatura es: <span id="estatura"></span> cm</p>
                <p>Tu peso es: <span id="peso"></span> kg</p>
                <p>Categoría: Obesidad extrema</p> 

                <img src="../img/peso_obesidad_extrema.png" alt="">
            </div>
            
            
            <div class="imagen_escala">
                <p class="texto">La obesidad extrema, también conocida como obesidad mórbida, es una condición médica grave caracterizada por un exceso de acumulación de grasa corporal que puede tener consecuencias negativas para la salud. Se define generalmente por un índice de masa corporal (IMC) de 40 o más, lo que significa que una persona tiene un peso significativamente superior al considerado como saludable en relación con su altura.<br><br>La obesidad extrema puede tener diversas causas, incluyendo factores genéticos, ambientales, comportamentales y metabólicos. El consumo excesivo de alimentos ricos en calorías, la falta de actividad física, el estrés, los trastornos alimentarios y ciertas condiciones médicas subyacentes pueden contribuir al desarrollo de la obesidad extrema.</p>
            </div>
        </div>
        

        <footer>
            Copyright © Todos los derechos reservados por Michael Solis
        </footer>
    </div>

    <script>
    // Obtener el valor del parámetro "imc" de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const imc = urlParams.get('imc');
    const nombre = urlParams.get('nombre');
    const estatura = urlParams.get('estatura');
    const peso = urlParams.get('peso');

    // Mostrar el valor del IMC en la página
    const imcElement = document.getElementById('imc');
    imcElement.textContent = imc;

    const nombreElement = document.getElementById('nombre');
    nombreElement.textContent = nombre;

    const estaturaElement = document.getElementById('estatura');
    estaturaElement.textContent = estatura;

    const pesoElement = document.getElementById('peso');
    pesoElement.textContent = peso;
    </script>
   
</body>
</html>