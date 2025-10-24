-- Base de datos para el sistema de login
-- Ejecutar este script para crear la tabla de usuarios

CREATE DATABASE IF NOT EXISTS sistema_login;
USE sistema_login;

-- Tabla de usuarios
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL,
    is_active BOOLEAN DEFAULT TRUE
);

-- Insertar usuario de prueba
-- Usuario: admin
-- Contraseña: admin123
-- (La contraseña está hasheada usando password_hash de PHP)
INSERT INTO users (username, email, password_hash) VALUES 
('admin', 'admin@sistema.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Insertar otro usuario de prueba
-- Usuario: usuario1
-- Contraseña: password123
INSERT INTO users (username, email, password_hash) VALUES 
('usuario1', 'usuario1@test.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm');
