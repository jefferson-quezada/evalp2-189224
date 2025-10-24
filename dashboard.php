<?php
// Dashboard principal - Panel de control
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php?error=Debes iniciar sesión para acceder al dashboard");
    exit();
}

require_once 'config/database.php';

// Obtener información del usuario
try {
    $database = new Database();
    $db = $database->getConnection();
    
    $stmt = $db->prepare("SELECT username, email, created_at, last_login FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $user_info = null;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.95);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header h1 {
            color: #333;
            font-size: 1.5rem;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .welcome-text {
            color: #666;
        }
        
        .btn-home {
            background: #28a745;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s ease;
            margin-right: 0.5rem;
        }
        
        .btn-home:hover {
            background: #218838;
        }
        
        .btn-logout {
            background: #dc3545;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s ease;
        }
        
        .btn-logout:hover {
            background: #c82333;
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card h3 {
            color: #333;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #eee;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 500;
            color: #666;
        }
        
        .info-value {
            color: #333;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            border-left: 4px solid #28a745;
        }
    </style>
</head>
<body>
        <div class="header">
            <h1>🏠 Dashboard del Sistema</h1>
            <div class="user-info">
                <span class="welcome-text">Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></span>
                <a href="inicio.php" class="btn-home">🏠 Inicio</a>
                <a href="auth/logout.php" class="btn-logout">Cerrar Sesión</a>
            </div>
        </div>
    
    <div class="container">
        <?php if (isset($_GET['success'])): ?>
            <div class="success-message">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php endif; ?>
        
        <div class="dashboard-grid">
            <div class="card">
                <h3>👤 Información del Usuario</h3>
                <?php if ($user_info): ?>
                    <div class="info-item">
                        <span class="info-label">Usuario:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user_info['username']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user_info['email']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Cuenta creada:</span>
                        <span class="info-value"><?php echo date('d/m/Y H:i', strtotime($user_info['created_at'])); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Último acceso:</span>
                        <span class="info-value">
                            <?php 
                            if ($user_info['last_login']) {
                                echo date('d/m/Y H:i', strtotime($user_info['last_login']));
                            } else {
                                echo 'Primera vez';
                            }
                            ?>
                        </span>
                    </div>
                <?php else: ?>
                    <p>No se pudo cargar la información del usuario.</p>
                <?php endif; ?>
            </div>
            
            <div class="card">
                <h3>🔧 Acciones Rápidas</h3>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <a href="profile.php" style="background: #007bff; color: white; padding: 0.75rem; border-radius: 5px; text-decoration: none; text-align: center;">
                        Ver Perfil
                    </a>
                    <a href="settings.php" style="background: #28a745; color: white; padding: 0.75rem; border-radius: 5px; text-decoration: none; text-align: center;">
                        Configuración
                    </a>
                    <a href="reports.php" style="background: #ffc107; color: #333; padding: 0.75rem; border-radius: 5px; text-decoration: none; text-align: center;">
                        Reportes
                    </a>
                </div>
            </div>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">1</div>
                <div class="stat-label">Sesión Activa</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo date('H:i'); ?></div>
                <div class="stat-label">Hora Actual</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo date('d/m/Y'); ?></div>
                <div class="stat-label">Fecha Actual</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">100%</div>
                <div class="stat-label">Sistema Operativo</div>
            </div>
        </div>
    </div>
</body>
</html>
