<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Área y Volumen - Ejercicio 2</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg,rgb(234, 164, 102) 0%, #764ba2 100%);
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
        
        .calculator-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .calculator-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        
        .calculator-card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .card-header h2 {
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }
        
        .card-header .icon {
            font-size: 3rem;
            margin-bottom: 1rem;
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
        
        .formula-info {
            background: #e3f2fd;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #1565c0;
        }
        
        .formula-info h4 {
            margin-bottom: 0.5rem;
            color: #0d47a1;
        }
        
        .formula-info ul {
            margin-left: 1rem;
        }
        
        .formula-info li {
            margin-bottom: 0.25rem;
        }
        
        @media (max-width: 768px) {
            .calculator-grid {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .container {
                padding: 0 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🧮 Calculadora de Figuras</h1>
            <p>Calcula área, volumen y perímetro de cilindros y rectángulos</p>
            <div style="margin-top: 1rem;">
                <a href="inicio.php" style="background: #28a745; color: white; padding: 0.5rem 1rem; border-radius: 5px; text-decoration: none; font-weight: 500;">🏠 Volver al Inicio</a>
            </div>
        </div>
        
        <div class="calculator-grid">
            <!-- Calculadora de Cilindro -->
            <div class="calculator-card">
                <div class="card-header">
                    <div class="icon">🥤</div>
                    <h2>Cilindro</h2>
                </div>
                
                <form action="procesar_calculos.php" method="POST">
                    <input type="hidden" name="figura" value="cilindro">
                    
                    <div class="form-group">
                        <label for="radio">Radio (r):</label>
                        <input type="number" id="radio" name="radio" step="0.01" min="0" 
                               value="<?php echo isset($_POST['radio']) ? htmlspecialchars($_POST['radio']) : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="altura_cilindro">Altura (h):</label>
                        <input type="number" id="altura_cilindro" name="altura" step="0.01" min="0" 
                               value="<?php echo isset($_POST['altura']) ? htmlspecialchars($_POST['altura']) : ''; ?>" required>
                    </div>
                    
                    <button type="submit" class="btn-calculate">Calcular Área y Volumen</button>
                </form>
                
                <div class="formula-info">
                    <h4>📐 Fórmulas del Cilindro:</h4>
                    <ul>
                        <li><strong>Área Total:</strong> A = 2πr(h + r)</li>
                        <li><strong>Volumen:</strong> V = πr²h</li>
                    </ul>
                </div>
            </div>
            
            <!-- Calculadora de Rectángulo -->
            <div class="calculator-card">
                <div class="card-header">
                    <div class="icon">📐</div>
                    <h2>Rectángulo</h2>
                </div>
                
                <form action="procesar_calculos.php" method="POST">
                    <input type="hidden" name="figura" value="rectangulo">
                    
                    <div class="form-group">
                        <label for="base">Base (b):</label>
                        <input type="number" id="base" name="base" step="0.01" min="0" 
                               value="<?php echo isset($_POST['base']) ? htmlspecialchars($_POST['base']) : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="altura_rectangulo">Altura (h):</label>
                        <input type="number" id="altura_rectangulo" name="altura" step="0.01" min="0" 
                               value="<?php echo isset($_POST['altura']) ? htmlspecialchars($_POST['altura']) : ''; ?>" required>
                    </div>
                    
                    <button type="submit" class="btn-calculate">Calcular Área y Perímetro</button>
                </form>
                
                <div class="formula-info">
                    <h4>📐 Fórmulas del Rectángulo:</h4>
                    <ul>
                        <li><strong>Área:</strong> A = b × h</li>
                        <li><strong>Perímetro:</strong> P = 2(b + h)</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Mostrar resultados si existen -->
        <?php if (isset($_GET['resultado']) && $_GET['resultado'] === 'exitoso'): ?>
            <div class="results">
                <h3>✅ Resultados Calculados</h3>
                <?php if (isset($_SESSION['resultados'])): ?>
                    <?php foreach ($_SESSION['resultados'] as $label => $value): ?>
                        <div class="result-item">
                            <span class="result-label"><?php echo htmlspecialchars($label); ?>:</span>
                            <span class="result-value"><?php echo htmlspecialchars($value); ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <!-- Mostrar errores si existen -->
        <?php if (isset($_GET['error'])): ?>
            <div class="error-message">
                <strong>❌ Error:</strong> <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
