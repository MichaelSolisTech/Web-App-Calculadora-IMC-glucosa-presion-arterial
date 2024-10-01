<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactanos</title>
    <link rel="stylesheet" href="../css/contacto.css">
</head>
<body>
<?php
if (isset($_COOKIE['usuario'])) {
    echo 'Bienvenido ' . $_COOKIE['usuario'];
} else {
    echo 'Hola, invitado';
}

// Inicializa el contador de visitas para esta página si aún no se ha establecido
if (!isset($_COOKIE['visitas_contacto'])) {
    setcookie('visitas_contacto', 1, time() + (86400 * 30), "/"); // 86400 = 1 día
    echo '<br> Esta es tu visita número 1 a esta página.';
} else {
    // Si ya se ha establecido, incrementa el contador de visitas
    $visitas = $_COOKIE['visitas_contacto'] + 1;
    setcookie('visitas_contacto', $visitas, time() + (86400 * 30), "/"); // 86400 = 1 día
    echo '<br> Esta es tu visita número ' . $visitas . ' a esta página.';
}


?>

    <div class="contacto">
        <h1>Contacto</h1>
    </div>

    <div class="contenedor">
        <div class="menu-contenedor">
            <ul class="menu">
                    <li><a href="../index.php" target="">Inicio</a></li>
                    <li><a href="calculadora_imc.php" target="">IMC</a></li>
                    <li><a href="../glucosa/calculadoraglucosa.php" target="">Glucosa</a></li>
                    <li><a href="../presionarterial/calculadorapresion.php" target="">Presion Arterial</a></li>
                    <li><a href="contactanos.php" target="">Contáctanos</a></li>
                </ul>
            </div>
    </div>
    
  <!--------------- footer empieza aquí --------------->

  <div class="footer">

        <div class="contenedor1">

              <div class="info">

                    <div id="direccion">
                        <p>Área de Trabajo</p>
                        <h4>Tocumen</h4>
                        <h4>La Siesta</h4>
                        <h4>&</h4>
                        <h4>Brisas del golf</h4>
                                

                        <br><br>
                    </div>

                        <div id="mail">
                            <p>Cualquier Consulta</p>
                            <h4>michael.solis@utp.ac.pa</h4>
                            <h4>andres.villarreal1@utp.ac.pa</h4>
                            <br><br>
                    </div>

              </div>

        </div>

  </div>

  <!--------------- footer termina aquí--------------->
</body>
</html>