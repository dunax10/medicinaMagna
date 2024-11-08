<?php
// Inicia o recupera la sesión
session_start();

// Limpia todas las variables de sesión
session_unset();

// Destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión u otra página
header("Location: ../index.php");
exit();
?>
