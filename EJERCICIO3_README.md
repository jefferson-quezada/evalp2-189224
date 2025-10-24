# Ejercicio 3: Identificación de Cuadrantes - Plano Cartesiano

## Descripción
Aplicación web que permite identificar en qué cuadrante del plano cartesiano está ubicado un punto, según sus coordenadas horizontal (X) y vertical (Y).

## Características Implementadas
- ✅ **Identificación de 4 cuadrantes** según las reglas matemáticas
- ✅ **Detección de casos especiales**: origen, ejes X e Y
- ✅ **Validación de coordenadas** numéricas
- ✅ **Visualización interactiva** del plano cartesiano
- ✅ **Mensajes claros** para cada tipo de ubicación
- ✅ **Interfaz moderna** con diseño responsive

## Reglas de Identificación Implementadas

### Cuadrantes
- **I Cuadrante**: X > 0 y Y > 0
- **II Cuadrante**: X < 0 y Y > 0  
- **III Cuadrante**: X < 0 y Y < 0
- **IV Cuadrante**: X > 0 y Y < 0

### Casos Especiales
- **Origen**: X = 0 y Y = 0 → "El punto está en el origen (0,0)"
- **Eje X**: Y = 0 y X ≠ 0 → "El punto está sobre el eje X"
- **Eje Y**: X = 0 y Y ≠ 0 → "El punto está sobre el eje Y"

## Archivos del Ejercicio
```
├── cuadrantes.php              # Interfaz principal con formulario y plano
├── procesar_cuadrantes.php     # Lógica de identificación de cuadrantes
└── inicio.php                   # Actualizado con enlace al ejercicio 3
```

## Validaciones Implementadas
1. **Campos vacíos**: Verifica que ambas coordenadas estén ingresadas
2. **Valores numéricos**: Valida que las coordenadas sean números válidos
3. **Acepta valores negativos**: Permite coordenadas negativas según el plano cartesiano
4. **Acepta cero**: Maneja correctamente el valor 0 para casos especiales

## Características Visuales
- 🗺️ **Plano cartesiano interactivo** con ejes X e Y
- 📍 **Punto dinámico** que se posiciona según las coordenadas ingresadas
- 🎯 **Etiquetas de cuadrantes** claramente identificadas
- 📊 **Resultados visuales** con información detallada
- 🎨 **Diseño responsive** que se adapta a diferentes pantallas

## Ejemplos de Uso

### Cuadrantes
- **(3, 4)** → I Cuadrante
- **(-2, 5)** → II Cuadrante  
- **(-3, -2)** → III Cuadrante
- **(4, -1)** → IV Cuadrante

### Casos Especiales
- **(0, 0)** → El punto está en el origen (0,0)
- **(5, 0)** → El punto está sobre el eje X
- **(0, 3)** → El punto está sobre el eje Y

## Tecnologías Utilizadas
- PHP 7.4+ para lógica de identificación
- HTML5 para estructura semántica
- CSS3 para diseño responsive y visualización del plano
- JavaScript implícito para interactividad
- Validación tanto en cliente como servidor
