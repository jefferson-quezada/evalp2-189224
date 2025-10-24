<?php
// Lógica de identificación de cuadrantes en el plano cartesiano
session_start();

// Función para validar coordenadas
function validarCoordenada($valor, $nombre) {
    $errores = [];
    
    if (empty($valor) && $valor !== '0') {
        $errores[] = "La coordenada '$nombre' no puede estar vacía";
    } elseif (!is_numeric($valor)) {
        $errores[] = "La coordenada '$nombre' debe ser un número válido";
    }
    
    return $errores;
}

// Función para identificar el cuadrante
function identificarCuadrante($x, $y) {
    // Casos especiales primero
    if ($x == 0 && $y == 0) {
        return "El punto está en el origen (0,0)";
    } elseif ($x == 0 && $y != 0) {
        return "El punto está sobre el eje Y";
    } elseif ($y == 0 && $x != 0) {
        return "El punto está sobre el eje X";
    }
    
    // Identificar cuadrantes
    if ($x > 0 && $y > 0) {
        return "I Cuadrante";
    } elseif ($x < 0 && $y > 0) {
        return "II Cuadrante";
    } elseif ($x < 0 && $y < 0) {
        return "III Cuadrante";
    } elseif ($x > 0 && $y < 0) {
        return "IV Cuadrante";
    }
    
    return "No se pudo determinar el cuadrante";
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $coordenada_x = $_POST['coordenada_x'];
    $coordenada_y = $_POST['coordenada_y'];
    
    $errores = [];
    
    // Validar coordenadas
    $errores = array_merge(
        validarCoordenada($coordenada_x, 'X'),
        validarCoordenada($coordenada_y, 'Y')
    );
    
    if (empty($errores)) {
        // Convertir a números
        $x = floatval($coordenada_x);
        $y = floatval($coordenada_y);
        
        // Identificar cuadrante
        $resultado = identificarCuadrante($x, $y);
        
        // Guardar en sesión para mostrar en la interfaz
        $_SESSION['resultado_cuadrante'] = $resultado;
        $_SESSION['coordenadas'] = ['x' => $x, 'y' => $y];
        $_SESSION['punto_calculado'] = ['x' => $x, 'y' => $y];
        
        // Redirigir con resultado exitoso
        header("Location: cuadrantes.php?resultado=exitoso");
    } else {
        // Redirigir con errores
        $mensaje_error = implode('. ', $errores);
        header("Location: cuadrantes.php?error=" . urlencode($mensaje_error));
    }
    exit();
}

// Si no es POST, redirigir al formulario
header("Location: cuadrantes.php");
exit();
?>
