<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Evaluación P2 - Ejercicios</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .main-container {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 800px;
            width: 90%;
        }
        
        .header {
            margin-bottom: 3rem;
        }
        
        .header h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .header p {
            color: #666;
            font-size: 1.2rem;
        }
        
        .exercises-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .exercise-card {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 15px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }
        
        .exercise-card:hover {
            transform: translateY(-5px);
            border-color: #667eea;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2);
        }
        
        .exercise-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .exercise-title {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .exercise-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        
        .exercise-features {
            list-style: none;
            text-align: left;
        }
        
        .exercise-features li {
            color: #555;
            margin-bottom: 0.5rem;
            padding-left: 1.5rem;
            position: relative;
        }
        
        .exercise-features li:before {
            content: "✅";
            position: absolute;
            left: 0;
        }
        
        .btn-access {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }
        
        .btn-access:hover {
            transform: translateY(-2px);
        }
        
        .footer {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e9ecef;
            color: #666;
        }
        
        @media (max-width: 768px) {
            .main-container {
                padding: 2rem 1rem;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .exercises-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="header">
            <h1>🎓 Proyecto Evaluación P2</h1>
            <p>Sistema completo con ejercicios de desarrollo web</p>
        </div>
        
        <div class="exercises-grid">
            <a href="index.php" class="exercise-card">
                <div class="exercise-icon">🔐</div>
                <div class="exercise-title">Ejercicio 1: Sistema de Login</div>
                <div class="exercise-description">
                    Sistema completo de autenticación con PHP y MySQL
                </div>
                <ul class="exercise-features">
                    <li>Página de inicio de sesión</li>
                    <li>Validación de credenciales</li>
                    <li>Dashboard principal</li>
                    <li>Función de logout</li>
                    <li>Base de datos segura</li>
                </ul>
                <div class="btn-access">Acceder al Login</div>
            </a>
            
            <a href="calculadora.php" class="exercise-card">
                <div class="exercise-icon">🧮</div>
                <div class="exercise-title">Ejercicio 2: Calculadora de Figuras</div>
                <div class="exercise-description">
                    Calculadora de área, volumen y perímetro de figuras geométricas
                </div>
                <ul class="exercise-features">
                    <li>Cálculo de cilindro (área y volumen)</li>
                    <li>Cálculo de rectángulo (área y perímetro)</li>
                    <li>Validación de entrada</li>
                    <li>Interfaz moderna</li>
                    <li>Fórmulas matemáticas precisas</li>
                </ul>
                <div class="btn-access">Acceder a Calculadora</div>
            </a>
            
            <a href="cuadrantes.php" class="exercise-card">
                <div class="exercise-icon">📐</div>
                <div class="exercise-title">Ejercicio 3: Identificación de Cuadrantes</div>
                <div class="exercise-description">
                    Identifica en qué cuadrante del plano cartesiano está ubicado un punto
                </div>
                <ul class="exercise-features">
                    <li>Identificación de 4 cuadrantes</li>
                    <li>Detección de ejes X e Y</li>
                    <li>Identificación del origen</li>
                    <li>Visualización del plano cartesiano</li>
                    <li>Validación de coordenadas</li>
                </ul>
                <div class="btn-access">Acceder a Cuadrantes</div>
            </a>
        </div>
        
        <div class="footer">
            <p><strong>Desarrollado con:</strong> PHP, MySQL, HTML5, CSS3</p>
            <p><strong>Características:</strong> Responsive Design, Validaciones, Seguridad</p>
        </div>
    </div>
</body>
</html>
