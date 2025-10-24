<?php
// Lógica de cálculo de figuras geométricas
session_start();

// Función para validar entrada numérica
function validarNumero($valor, $nombre) {
    $errores = [];
    
    if (empty($valor)) {
        $errores[] = "El campo '$nombre' no puede estar vacío";
    } elseif (!is_numeric($valor)) {
        $errores[] = "El campo '$nombre' debe ser un número válido";
    } elseif ($valor < 0) {
        $errores[] = "El campo '$nombre' no puede ser negativo";
    } elseif ($valor == 0) {
        $errores[] = "El campo '$nombre' debe ser mayor que cero";
    }
    
    return $errores;
}

// Función para calcular cilindro
function calcularCilindro($radio, $altura) {
    $pi = M_PI;
    
    // Área total del cilindro: A = 2πr(h + r)
    $area_total = 2 * $pi * $radio * ($altura + $radio);
    
    // Volumen del cilindro: V = πr²h
    $volumen = $pi * pow($radio, 2) * $altura;
    
    return [
        'Área Total' => number_format($area_total, 2) . ' unidades²',
        'Volumen' => number_format($volumen, 2) . ' unidades³'
    ];
}

// Función para calcular rectángulo
function calcularRectangulo($base, $altura) {
    // Área del rectángulo: A = b × h
    $area = $base * $altura;
    
    // Perímetro del rectángulo: P = 2(b + h)
    $perimetro = 2 * ($base + $altura);
    
    return [
        'Área' => number_format($area, 2) . ' unidades²',
        'Perímetro' => number_format($perimetro, 2) . ' unidades'
    ];
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $figura = $_POST['figura'];
    $errores = [];
    $resultados = [];
    
    if ($figura === 'cilindro') {
        // Validar entrada del cilindro
        $radio = $_POST['radio'];
        $altura = $_POST['altura'];
        
        $errores = array_merge(
            validarNumero($radio, 'Radio'),
            validarNumero($altura, 'Altura')
        );
        
        if (empty($errores)) {
            $resultados = calcularCilindro($radio, $altura);
            $_SESSION['resultados'] = $resultados;
            $_SESSION['figura_calculada'] = 'Cilindro';
            $_SESSION['datos_entrada'] = [
                'Radio' => $radio . ' unidades',
                'Altura' => $altura . ' unidades'
            ];
        }
        
    } elseif ($figura === 'rectangulo') {
        // Validar entrada del rectángulo
        $base = $_POST['base'];
        $altura = $_POST['altura'];
        
        $errores = array_merge(
            validarNumero($base, 'Base'),
            validarNumero($altura, 'Altura')
        );
        
        if (empty($errores)) {
            $resultados = calcularRectangulo($base, $altura);
            $_SESSION['resultados'] = $resultados;
            $_SESSION['figura_calculada'] = 'Rectángulo';
            $_SESSION['datos_entrada'] = [
                'Base' => $base . ' unidades',
                'Altura' => $altura . ' unidades'
            ];
        }
    }
    
    // Redirigir con resultado o error
    if (empty($errores)) {
        header("Location: calculadora.php?resultado=exitoso");
    } else {
        $mensaje_error = implode('. ', $errores);
        header("Location: calculadora.php?error=" . urlencode($mensaje_error));
    }
    exit();
}

// Si no es POST, mostrar el formulario
include 'calculadora.php';
?>
