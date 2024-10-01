<?php

class GlucosaDiagnosis
{
    private $lectura;
    private $tipoLectura;
    private $diagnostico;

    public function __construct($lectura, $tipoLectura)
    {
        $this->lectura = $lectura;
        $this->tipoLectura = $tipoLectura;
    }

    public function realizarDiagnostico()
    {
        if ($this->tipoLectura == 'Ayunas') {
            if ($this->lectura >= 70 && $this->lectura <= 100) {
                $this->diagnostico = 'Sin diabetes';
            } elseif ($this->lectura >= 100 && $this->lectura <= 125) {
                $this->diagnostico = 'Pre diabetes';
            } elseif ($this->lectura > 126) {
                $this->diagnostico = 'Diabetes';
            } else {
                $this->diagnostico = 'Valor no válido';
            }
        } elseif ($this->tipoLectura == 'Posprandial') {
            if ($this->lectura <= 140) {
                $this->diagnostico = 'Sin diabetes';
            } elseif ($this->lectura >= 141 && $this->lectura <= 199) {
                $this->diagnostico = 'Pre diabetes';
            } elseif ($this->lectura >= 200) {
                $this->diagnostico = 'Diabetes';
            } else {
                $this->diagnostico = 'Valor no válido';
            }
        } else {
            $this->diagnostico = 'Valor no válido';
        }
    }

    public function getLectura()
    {
        return $this->lectura;
    }

    public function getTipoLectura()
    {
        return $this->tipoLectura;
    }

    public function getDiagnostico()
    {
        return $this->diagnostico;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lectura = $_POST['lectura'];
    $tipoLectura = $_POST['tipo_lectura'];

    $glucosaDiagnosis = new GlucosaDiagnosis($lectura, $tipoLectura);
    $glucosaDiagnosis->realizarDiagnostico();

    $lectura = $glucosaDiagnosis->getLectura();
    $tipoLectura = $glucosaDiagnosis->getTipoLectura();
    $diagnostico = $glucosaDiagnosis->getDiagnostico();
} else {
    header("Location: calculadoraGlucosa.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Glucosa</title>
    <link rel="stylesheet" href="../css/calculadoraGlucosa.css">
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
            Resultado del diagnóstico de Glucosa en Sangre
        </h2>
        <p>
            Lectura: <?php echo $lectura; ?> mg/dl<br>
            Tipo de Lectura: <?php echo $tipoLectura; ?><br>
            Diagnóstico: <?php echo $diagnostico; ?>
        </p>
    </div>
</body>
</html>
