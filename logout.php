<?php
session_start();

// Destruir todas las variables de sesión.
$_SESSION = array();

// Si se desea destruir la sesión completamente, se debe eliminar también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Eliminar las cookies de visitas
setcookie('visitas_calculadoraPresion', '', time() - 3600, "/");
setcookie('visitas_calculadoraGlucosa', '', time() - 3600, "/");
setcookie('visitas_inicio', '', time() - 3600, "/");
setcookie('visitas_imc', '', time() - 3600, "/");
setcookie('visitas_contacto', '', time() - 3600, "/");
setcookie('visitas_escala_bajo', '', time() - 3600, "/");
setcookie('visitas_escala_normal', '', time() - 3600, "/");
setcookie('visitas_obesidad_extrema', '', time() - 3600, "/");
setcookie('visitas_obesidad', '', time() - 3600, "/");
setcookie('visitas_sobrepeso', '', time() - 3600, "/");

// Finalmente, destruir la sesión.
session_destroy();

// Redirigir al usuario a la página de login
header('Location: login.php');
exit();
?>
