<?php
if (isset($_COOKIE['usuario'])) {
    echo 'Bienvenido ' . $_COOKIE['usuario'];
} else {
    echo 'Hola, invitado';
}

// Inicializa el contador de visitas para esta página si aún no se ha establecido
if (!isset($_COOKIE['visitas_obesidad'])) {
    setcookie('visitas_obesidad', 1, time() + (86400 * 30), "/"); // 86400 = 1 día
    echo '<br> Esta es tu visita número 1 a esta página.';
} else {
    // Si ya se ha establecido, incrementa el contador de visitas
    $visitas = $_COOKIE['visitas_obesidad'] + 1;
    setcookie('visitas_obesidad', $visitas, time() + (86400 * 30), "/"); // 86400 = 1 día
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
    <link rel="stylesheet" href="../css/escala_obesidad.css">
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
                <p>Categoría: Obesidad</p> 

                <img src="../img/peso_obesidad_mujer.png" alt="">
            </div>
            
            
            <div class="imagen_escala">
                <p class="texto">La obesidad es una condición médica caracterizada por la acumulación excesiva de grasa corporal que puede tener un impacto negativo en la salud.<br><br>La obesidad es una condición en la cual una persona tiene un exceso significativo de peso corporal debido a la acumulación de grasa. Se determina comúnmente utilizando el índice de masa corporal (IMC), que relaciona el peso y la altura de una persona. Un IMC igual o superior a 30 kg/m² se considera indicativo de obesidad.</p>
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