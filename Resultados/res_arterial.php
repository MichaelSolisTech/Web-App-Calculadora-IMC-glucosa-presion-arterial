<?php
class PresionArterial {
    private $sistolica;
    private $diastolica;

    public function __construct($sistolica, $diastolica) {
        $this->sistolica = $sistolica;
        $this->diastolica = $diastolica;
    }

    public function diagnosticar() {
        if ($this->sistolica <= 120 && $this->diastolica <= 80) {
            return 'Normal';
        } elseif ($this->sistolica >= 120 && $this->sistolica <= 129 && $this->diastolica <= 80) {
            return 'Elevada';
        } elseif ($this->sistolica >= 130 && $this->sistolica <= 139 && $this->diastolica >= 80 && $this->diastolica <= 89) {
            return 'Presión Arterial Alta';
        } elseif ($this->sistolica >= 140 || $this->diastolica >= 90) {
            return 'Presión Arterial Alta (Hipertensión) Nivel 2';
        } elseif ($this->sistolica > 180 || $this->diastolica > 120) {
            return 'Crisis De Hipertensión';    
        } else {
            return 'Valor no válido';
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sistolica = $_POST['sistolica'];
    $diastolica = $_POST['diastolica'];

    // Crea una instancia de PresionArterial y realiza el diagnóstico
    $presion = new PresionArterial($sistolica, $diastolica);
    $diagnostico = $presion->diagnosticar();
} else {
    $diagnostico = 'Error: No se enviaron los datos correctamente.';
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Presión Arterial</title>
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
            Resultado del diagnóstico de Presión Arterial
        </h2>
        <p>
            Lectura Sistólica: <?php echo $sistolica; ?> mm Hg<br>
            Lectura Diastólica: <?php echo $diastolica; ?> mm Hg<br>
            Diagnóstico: <?php echo $diagnostico; ?>
        </p>
    </div>
</body>
</html>
