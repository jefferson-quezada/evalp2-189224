<?php
// Sistema de autenticación
session_start();

require_once '../config/database.php';

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    // Validaciones básicas
    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=Por favor, completa todos los campos");
        exit();
    }
    
    try {
        // Conectar a la base de datos
        $database = new Database();
        $db = $database->getConnection();
        
        if ($db === null) {
            header("Location: ../index.php?error=Error de conexión a la base de datos");
            exit();
        }
        
        // Buscar el usuario en la base de datos
        $stmt = $db->prepare("SELECT id, username, email, password_hash, is_active FROM users WHERE username = ? AND is_active = 1");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password_hash'])) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['logged_in'] = true;
            
            // Actualizar último login
            $update_stmt = $db->prepare("UPDATE users SET last_login = CURRENT_TIMESTAMP WHERE id = ?");
            $update_stmt->execute([$user['id']]);
            
            // Redirigir al dashboard
            header("Location: ../dashboard.php");
            exit();
        } else {
            // Credenciales incorrectas
            header("Location: ../index.php?error=Usuario o contraseña incorrectos");
            exit();
        }
        
    } catch (PDOException $e) {
        error_log("Error en login: " . $e->getMessage());
        header("Location: ../index.php?error=Error interno del servidor");
        exit();
    }
} else {
    // Si no es POST, redirigir al login
    header("Location: ../index.php");
    exit();
}
?>
