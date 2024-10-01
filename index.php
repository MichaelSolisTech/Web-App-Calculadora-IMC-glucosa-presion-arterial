<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || !isset($_SESSION['clave'])) {
    // Si el usuario no ha iniciado sesión, redirigir a login.php
    header('Location: login.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="css/inicio.css">
</head>
<body>

    <div class="main">
        <!-- Agregar mensaje de bienvenida -->
        <h2>Bienvenido <?php echo $_SESSION['usuario']; ?></h2>
        <?php 
            // Inicializa el contador de visitas para esta página si aún no se ha establecido
            if (!isset($_COOKIE['visitas_inicio'])) {
                setcookie('visitas_inicio', 1, time() + (86400 * 30), "/"); // 86400 = 1 día
                echo '<br> Esta es tu visita número 1 a esta página.';
            } else {
                // Si ya se ha establecido, incrementa el contador de visitas
                $visitas = $_COOKIE['visitas_inicio'] + 1;
                setcookie('visitas_inicio', $visitas, time() + (86400 * 30), "/"); // 86400 = 1 día
                echo 'Esta es tu visita número ' . $visitas . ' a esta página.';
            }

        ?>

        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Consultorio clínico ABC<br></h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="paginas/calculadora_imc.php"> IMC</a></li>
                    <li><a href="glucosa/calculadoraGlucosa.php">Glucosa</a></li>
                    <li><a href="PresionArterial/calculadoraPresion.php">Presion Arterial</a></li>
                    <li><a href="paginas/contactanos.php">Contactanos</a></li>
                </ul>
            </div>


        </div> 
        <div class="content">
            <h1>Conoce tu salud<br><span> Haz un gran paso en tu vida</span><br> Nuevos habitos</h1>
            <p class="par"><br><br>Cuidar de ti mismo/a, escuchar las necesidades de tu cuerpo y buscar un equilibrio en todas las áreas de tu vida son pasos importantes hacia<br> una vida más saludable y plena.  ¡Tú tienes el poder de transformar tu salud y vivir una vida llena de vitalidad y bienestar!</p>
                <h2>***>>>> Deslogeate para reiniciar el contador de cookies <<<<<<***</h2>
                <button class="cn"><a href="logout.php">Deslogearte</a></button>
                </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
