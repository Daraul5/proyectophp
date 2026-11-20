# Mini Proyecto 1 (Unidad 4) — Desarrollo Web con PHP

## Asignatura

**Programación Web**  
**Unidad 4:** Programación del lado del servidor con PHP

---

## Integrantes del Equipo

- **David Raúl Vázquez Yáñez**
- **Rebeca Jiménez Díaz**
- **Elías Raziel Gómez Carrión**

---

## Descripción del Proyecto

Este proyecto es una aplicación web interactiva desarrollada en **PHP puro**, orientada a demostrar los principios esenciales del desarrollo del lado del servidor. El sistema opera **sin bases de datos ni archivos externos**, almacenando el estado y la auditoría de tiempo de forma 100% dinámica en la memoria temporal del servidor mediante la superglobal `$_SESSION`.

Cada módulo incluye una explicación teórica formal y un panel de demostración técnica ejecutada con datos reales para facilitar la captura de evidencias del reporte técnico.

---

## Temas y Evidencias Implementadas

1. **Variables y Funciones Nativas (`variables.php`):**
   - Declaración de variables con `$`, tipado dinámico e impresión con `echo`.
   - Formateo de fechas y horas con `date()`.
   - Conteo de elementos con `count()`.
2. **Tipos de Datos Primitivos (`variables.php`):**
   - Uso e inspección de los 5 tipos obligatorios: `string`, `int`, `float`, `boolean` y `array`.
   - Análisis dinámico en memoria con `gettype()` y volcado con `var_dump()`.
3. **Estructuras Condicionales (`condicionales.php`):**
   - Evaluación lógica con `if`, `elseif` y `else` sobre rendimiento académico y asistencia.
   - Evaluación múltiple estructurada con `switch` sobre el día de la semana (`date('N')`), incluyendo cláusulas `case` y `default`.
4. **Bucles y Ciclos Repetitivos (`bucles.php`):**
   - Bucle `for`: Generación dinámica de proyecciones numéricas y tablas de carga.
   - Bucle `while`: Recorrido controlado por índice para verificación de procesos.
   - Bucle `foreach`: Recorrido de colecciones generando listas y tarjetas HTML.
5. **Arreglos y Matrices (`arreglos.php`):**
   - Arreglos indexados (numéricos) y asociativos (`clave => valor`).
   - Arreglo multidimensional de catálogo de servidores y componentes.
   - Condicional `if/else` anidado dentro del bucle para clasificar niveles de stock con badges CSS diferenciados.
6. **Manejo y Auditoría de Sesiones en Memoria (`sesiones.php`):**
   - Configuración de zona horaria (`America/Mexico_City`).
   - Ciclo de vida con `session_start()`, `session_unset()` y `session_destroy()`.
   - Cálculo dinámico de tiempo activo: diferencia entre `time()` y `$_SESSION['inicio_sesion']`, desglosada en `"X minutos Y segundos"`.
   - Inspección del identificador único `session_id()` y volcado crudo con `print_r($_SESSION)`.

---

## Guía de Colaboración y Commits para el Equipo (CSS & UI)

Para demostrar el trabajo colaborativo en el repositorio de GitHub, la hoja de estilos [`css/styles.css`](css/styles.css) cuenta con secciones modulares especialmente reservadas para que cada integrante realice sus propios _commits_:

### Módulo de Rebeca Jiménez Díaz

- **Ubicación:** `css/styles.css` (Sección 8 - Módulo de Rebeca).
- **Tareas sugeridas para comitear:**
  - Personalizar o expandir la paleta de colores (variables CSS en `:root` o clase `.card-rebeca-custom`).
  - Agregar efectos visuales de interacción (sombras suaves, efecto `hover` o desenfoque en tarjetas).
  - Ajustar la animación del indicador de sesión activa (`@keyframes sessionPulseAnimation`).
- **Ejemplo de commit:**
  ```bash
  git checkout -b diseno-rebeca
  # Editar css/styles.css en la sección de Rebeca
  git commit -am "feat(css): personalización de sombras y animación de tarjetas por Rebeca Jiménez"
  git push origin diseno-rebeca
  ```

### Módulo de Elías Raziel Gómez Carrión

- **Ubicación:** `css/styles.css` (Sección 8 - Módulo de Elías).
- **Tareas sugeridas para comitear:**
  - Estilos de alternancia de filas en tablas (`zebra-striping` en `.data-table tbody tr:nth-child(even)`).
  - Refinamiento de badges de estado (`.status-success`, `.status-warning`, `.status-danger`) o estilos de texto resaltado (`.elias-stat-highlight`).
  - Ajustes de márgenes o adaptabilidad en la sección de media queries.
- **Ejemplo de commit:**
  ```bash
  git checkout -b estilos-elias
  # Editar css/styles.css en la sección de Elías
  git commit -am "feat(css): ajuste de estilo zebra en tablas y badges por Elías Gómez"
  git push origin estilos-elias
  ```

---

## Instrucciones de Despliegue

### 1. Servidor Local con PHP Built-in Server (Sin instalar Apache)

Si tienes PHP instalado en tu equipo, abre la terminal en esta carpeta y ejecuta:

```bash
php -S localhost:8000
```

Luego ingresa en tu navegador a: [http://localhost:8000](http://localhost:8000).

### 2. Despliegue en XAMPP / Laragon

1. Copia la carpeta del proyecto dentro de la ruta pública del servidor:
   - **XAMPP:** `C:/xampp/htdocs/mini-proyecto-php/`
   - **Laragon:** `C:/laragon/www/mini-proyecto-php/`
2. Inicia el servicio de Apache desde el panel de control.
3. Abre en el navegador: `http://localhost/mini-proyecto-php/`

### 3. Despliegue en Hosting Gratuito (InfinityFree / AwardSpace)

1. Crea una cuenta gratuita en [InfinityFree](https://www.infinityfree.com/) o [AwardSpace](https://www.awardspace.com/).
2. Accede al administrador de archivos (MonstaFTP / File Manager) o conéctate vía FTP (FileZilla).
3. Sube todos los archivos y carpetas (`css/`, `includes/`, `index.php`, etc.) directamente dentro del directorio raíz público (`htdocs` o `public_html`).
4. Abre la URL asignada por el proveedor.
