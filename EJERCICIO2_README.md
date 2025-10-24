# Ejercicio 2: Calculadora de Área y Volumen de Figuras

## Descripción
Calculadora web que permite calcular el área y volumen de un cilindro, y el área y perímetro de un rectángulo.

## Características Implementadas
- ✅ **Cálculo de Cilindro**: Área total y volumen
- ✅ **Cálculo de Rectángulo**: Área y perímetro
- ✅ **Validación de entrada**: Campos vacíos, valores negativos, números inválidos
- ✅ **Mensajes de error claros** para cada tipo de validación
- ✅ **Diseño moderno** con CSS personalizado y responsive
- ✅ **Fórmulas matemáticas precisas** según especificaciones

## Fórmulas Implementadas

### Cilindro
- **Área Total**: `A = 2πr(h + r)`
- **Volumen**: `V = πr²h`

### Rectángulo
- **Área**: `A = b × h`
- **Perímetro**: `P = 2(b + h)`

## Archivos del Ejercicio
```
├── calculadora.php          # Interfaz principal con formularios
├── procesar_calculos.php    # Lógica de cálculo y validación
└── inicio.php               # Página de navegación entre ejercicios
```

## Validaciones Implementadas
1. **Campos vacíos**: Verifica que todos los campos estén completos
2. **Valores numéricos**: Valida que la entrada sea un número válido
3. **Valores positivos**: No permite números negativos
4. **Valores mayores a cero**: Evita divisiones por cero

## Uso
1. Acceder a `calculadora.php`
2. Seleccionar la figura a calcular (Cilindro o Rectángulo)
3. Ingresar los valores requeridos
4. Hacer clic en "Calcular"
5. Ver los resultados con unidades apropiadas

## Ejemplos de Uso

### Cilindro
- **Radio**: 5 unidades
- **Altura**: 10 unidades
- **Resultado**: Área = 471.24 unidades², Volumen = 785.40 unidades³

### Rectángulo
- **Base**: 8 unidades
- **Altura**: 6 unidades
- **Resultado**: Área = 48.00 unidades², Perímetro = 28.00 unidades

## Tecnologías Utilizadas
- PHP 7.4+ para lógica de cálculo
- HTML5 para estructura semántica
- CSS3 para diseño responsive y moderno
- Validación tanto en cliente como servidor
