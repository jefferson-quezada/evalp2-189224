<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identificación de Cuadrantes - Plano Cartesiano</title>
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
            padding: 2rem 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .header {
            text-align: center;
            margin-bottom: 3rem;
            color: white;
        }
        
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: start;
        }
        
        .form-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .form-section h2 {
            color: #333;
            margin-bottom: 2rem;
            text-align: center;
            font-size: 1.8rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn-calculate {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease;
        }
        
        .btn-calculate:hover {
            transform: translateY(-2px);
        }
        
        .cartesian-plane {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        
        .plane-container {
            position: relative;
            width: 400px;
            height: 400px;
            margin: 2rem auto;
            border: 2px solid #333;
            background: #f8f9fa;
        }
        
        .axis {
            position: absolute;
            background: #333;
        }
        
        .axis-x {
            width: 100%;
            height: 2px;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
        }
        
        .axis-y {
            width: 2px;
            height: 100%;
            left: 50%;
            top: 0;
            transform: translateX(-50%);
        }
        
        .quadrant {
            position: absolute;
            font-size: 1.2rem;
            font-weight: bold;
            color: #667eea;
        }
        
        .quadrant-1 {
            top: 20px;
            right: 20px;
        }
        
        .quadrant-2 {
            top: 20px;
            left: 20px;
        }
        
        .quadrant-3 {
            bottom: 20px;
            left: 20px;
        }
        
        .quadrant-4 {
            bottom: 20px;
            right: 20px;
        }
        
        .origin {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #333;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
        }
        
        .point {
            position: absolute;
            width: 12px;
            height: 12px;
            background: #dc3545;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            border: 2px solid white;
            box-shadow: 0 0 0 2px #dc3545;
        }
        
        .point-label {
            position: absolute;
            background: #dc3545;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: bold;
            transform: translate(-50%, -100%);
            margin-top: -5px;
        }
        
        .results {
            margin-top: 2rem;
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #28a745;
        }
        
        .results h3 {
            color: #28a745;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }
        
        .result-item {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #dee2e6;
        }
        
        .result-item:last-child {
            border-bottom: none;
        }
        
        .result-label {
            font-weight: 600;
            color: #333;
        }
        
        .result-value {
            color: #667eea;
            font-weight: bold;
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
            border-left: 4px solid #dc3545;
        }
        
        .rules-section {
            background: #e3f2fd;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 2rem;
        }
        
        .rules-section h4 {
            color: #0d47a1;
            margin-bottom: 1rem;
        }
        
        .rules-section ul {
            margin-left: 1rem;
        }
        
        .rules-section li {
            margin-bottom: 0.5rem;
            color: #1565c0;
        }
        
        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
            }
            
            .plane-container {
                width: 300px;
                height: 300px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📐 Identificación de Cuadrantes</h1>
            <p>Plano Cartesiano - Determina en qué cuadrante está ubicado tu punto</p>
        </div>
        
        <div class="main-content">
            <div class="form-section">
                <h2>🎯 Ingresa las Coordenadas</h2>
                
                <form action="procesar_cuadrantes.php" method="POST">
                    <div class="form-group">
                        <label for="coordenada_x">Coordenada X (horizontal):</label>
                        <input type="number" id="coordenada_x" name="coordenada_x" step="0.01" 
                               value="<?php echo isset($_POST['coordenada_x']) ? htmlspecialchars($_POST['coordenada_x']) : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="coordenada_y">Coordenada Y (vertical):</label>
                        <input type="number" id="coordenada_y" name="coordenada_y" step="0.01" 
                               value="<?php echo isset($_POST['coordenada_y']) ? htmlspecialchars($_POST['coordenada_y']) : ''; ?>" required>
                    </div>
                    
                    <button type="submit" class="btn-calculate">Identificar Cuadrante</button>
                </form>
                
                <div class="rules-section">
                    <h4>📋 Reglas de Identificación:</h4>
                    <ul>
                        <li><strong>I Cuadrante:</strong> X > 0 y Y > 0</li>
                        <li><strong>II Cuadrante:</strong> X < 0 y Y > 0</li>
                        <li><strong>III Cuadrante:</strong> X < 0 y Y < 0</li>
                        <li><strong>IV Cuadrante:</strong> X > 0 y Y < 0</li>
                        <li><strong>Origen:</strong> X = 0 y Y = 0</li>
                        <li><strong>Eje X:</strong> Y = 0 y X ≠ 0</li>
                        <li><strong>Eje Y:</strong> X = 0 y Y ≠ 0</li>
                    </ul>
                </div>
            </div>
            
            <div class="cartesian-plane">
                <h2>🗺️ Plano Cartesiano</h2>
                
                <div class="plane-container">
                    <!-- Ejes -->
                    <div class="axis axis-x"></div>
                    <div class="axis axis-y"></div>
                    
                    <!-- Cuadrantes -->
                    <div class="quadrant quadrant-1">I Cuadrante</div>
                    <div class="quadrant quadrant-2">II Cuadrante</div>
                    <div class="quadrant quadrant-3">III Cuadrante</div>
                    <div class="quadrant quadrant-4">IV Cuadrante</div>
                    
                    <!-- Origen -->
                    <div class="origin">(0,0)</div>
                    
                    <!-- Punto dinámico -->
                    <?php if (isset($_SESSION['punto_calculado'])): ?>
                        <?php 
                        $punto = $_SESSION['punto_calculado'];
                        $x = $punto['x'];
                        $y = $punto['y'];
                        
                        // Convertir coordenadas a posición en el plano (escala 1:10)
                        $pos_x = 50 + ($x * 10); // Centro + offset
                        $pos_y = 50 - ($y * 10); // Centro - offset (invertir Y)
                        
                        // Limitar posición dentro del plano
                        $pos_x = max(10, min(390, $pos_x));
                        $pos_y = max(10, min(390, $pos_y));
                        ?>
                        <div class="point" style="left: <?php echo $pos_x; ?>px; top: <?php echo $pos_y; ?>px;"></div>
                        <div class="point-label" style="left: <?php echo $pos_x; ?>px; top: <?php echo $pos_y; ?>px;">
                            (<?php echo $x; ?>, <?php echo $y; ?>)
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Mostrar resultados si existen - FUERA del panel del plano -->
        <?php if (isset($_GET['resultado']) && $_GET['resultado'] === 'exitoso'): ?>
            <div class="results" style="margin-top: 2rem; max-width: 1200px; margin-left: auto; margin-right: auto;">
                <h3>✅ Resultado de la Identificación</h3>
                <?php if (isset($_SESSION['resultado_cuadrante'])): ?>
                    <div class="result-item">
                        <span class="result-label">Coordenadas:</span>
                        <span class="result-value">(<?php echo $_SESSION['coordenadas']['x']; ?>, <?php echo $_SESSION['coordenadas']['y']; ?>)</span>
                    </div>
                    <div class="result-item">
                        <span class="result-label">Ubicación:</span>
                        <span class="result-value"><?php echo htmlspecialchars($_SESSION['resultado_cuadrante']); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <!-- Mostrar errores si existen - FUERA del panel del plano -->
        <?php if (isset($_GET['error'])): ?>
            <div class="error-message" style="margin-top: 2rem; max-width: 1200px; margin-left: auto; margin-right: auto;">
                <strong>❌ Error:</strong> <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
