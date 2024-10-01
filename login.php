<?php
session_start();

// Verificar si ya hay una sesión iniciada
if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) {
    // Redireccionar a la página principal
    header('Location: index.php');
    exit();
}

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
        $mensaje = 'Debe llenar todos los espacios';
    } elseif ($_POST['clave'] == "pass1234") {
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['clave'] = $_POST['clave'];
        // En login.php, después de validar las credenciales del usuario
        setcookie('usuario', $_POST['usuario'], 0);  // Establecer cookie que expira al cerrar el navegador
        $mensaje = 'Has iniciado sesión como ' . $_SESSION['usuario'];
        header('Location: index.php');
        exit();
    } else {
        $mensaje = 'Contraseña incorrecta';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">  
</head>
<body>
  <div class="login">
    <h1>Login</h1>
    <?php
    if (!empty($mensaje)) {
        echo '<p class="mensaje">' . $mensaje . '</p>';
    }
    ?>
    <form name="login" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">        
        <input name="usuario" type="text" id="usuario" placeholder="Usuario">
        <input name="clave" type="password" id="clave" placeholder="Contraseña">
        <input name="enviar" type="submit" id="enviar" value="Enviar">
    </form>
  </div>
</body>
</html>
