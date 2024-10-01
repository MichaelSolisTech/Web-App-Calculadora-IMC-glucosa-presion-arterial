<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IMC POR PHP</title>
</head>
<body>
<?php

class IMCCalculator {
    private $peso;
    private $altura;
    private $nombre;

    public function __construct($peso, $altura, $nombre) {
        $this->peso = $peso;
        $this->altura = $altura;
        $this->nombre = $nombre;
    }

    public function calcularIMC() {
        if (is_numeric($this->peso) && is_numeric($this->altura) && $this->peso > 0 && $this->altura > 0) {
            // No dividimos la altura por 100 porque ahora se proporciona en metros
            $imc = $this->peso / ($this->altura * $this->altura);
            $imc2 = round($imc, 1);
            return $imc2;
        }
        return false;
    }

    public function obtenerCategoriaIMC($imc) {
        if ($imc < 18.5) {
            return "Bajo peso";
        } elseif ($imc >= 18.5 && $imc <= 24.9) {
            return "Peso normal";
        } elseif ($imc >= 25 && $imc <= 29.9) {
            return "Sobrepeso";
        } 
        elseif ($imc >= 30 && $imc <= 39.9) {
            return "Obesidad";
        }
        else {
            return "Obesidad extrema";
        }
    }

    public function redirigirSegunCategoria($categoria) {
        switch ($categoria) {
            case "Bajo peso":
                $url = "paginas_escalas/escala_bajo.php";
                break;
            case "Peso normal":
                $url = "paginas_escalas/escala_normal.php";
                break;
            case "Sobrepeso":
                $url = "paginas_escalas/escala_sobrepeso.php";
                break;
            case "Obesidad":
                $url = "paginas_escalas/escala_obesidad.php";
                break;
            case "Obesidad extrema":
                $url = "paginas_escalas/escala_obesidad_extrema.php";
                break;
            default:
                return;
        }

        $params = "?imc=" . $this->calcularIMC() . "&nombre=" . $this->nombre . "&estatura=" . $this->altura . "&peso=" . $this->peso;
        header("Location: " . $url . $params);
        exit;
    }
}

if (isset($_POST['peso']) && isset($_POST['estatura']) && isset($_POST['nombre'])) {
    $peso = $_POST['peso'];
    $altura = $_POST['estatura'];
    $nombre = $_POST['nombre'];

    $imcCalculator = new IMCCalculator($peso, $altura, $nombre);
    $imc = $imcCalculator->calcularIMC();

    if ($imc !== false) {
        $categoria = $imcCalculator->obtenerCategoriaIMC($imc);
        $imcCalculator->redirigirSegunCategoria($categoria);
    } else {
        echo "Por favor, ingrese valores numéricos válidos para el peso y la altura.";
    }
} else {
    echo "Por favor, complete el formulario.";
}
?>
</body>
</html>