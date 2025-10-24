<?php
// Archivo de verificación de sesión (opcional)
// Puede ser incluido en páginas que requieran autenticación

function verificarSesion() {
    session_start();
    
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: index.php?error=Debes iniciar sesión para acceder a esta página");
        exit();
    }
}

function obtenerUsuarioActual() {
    if (isset($_SESSION['user_id'])) {
        return [
            'id' => $_SESSION['user_id'],
            'username' => $_SESSION['username'],
            'email' => $_SESSION['email']
        ];
    }
    return null;
}
?>
