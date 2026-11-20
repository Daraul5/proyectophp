<?php
$page_title = "Variables y Tipos de Datos";
require_once __DIR__ . '/includes/header.php';

// =========================================================================
// DEFINICIÓN DE VARIABLES REALES EN PHP
// =========================================================================

// 1. Tipo String (Cadena de texto)
$nombre_materia = "Programación Web (Unidad 4: Servidor con PHP)";

// 2. Tipo Integer (Entero)
$anio_academico = 2026;

// 3. Tipo Float / Double (Flotante o Decimal)
$calificacion_promedio = 94.75;

// 4. Tipo Boolean (Booleano)
$sistema_activo = true;

// 5. Tipo Array (Arreglo indexado de tecnologías)
$tecnologias = ["PHP 8+", "Apache Server", "CSS3 Flexbox/Grid", "HTML5 Semántico"];

// Ejecución de funciones nativas solicitadas
$fecha_servidor = date('d/m/Y H:i:s');
$dia_nombre = date('l');
$total_tecnologias = count($tecnologias);
?>

<div class="page-header">
    <h2>Módulo 1: Variables, Tipos de Datos y Funciones en PHP</h2>
    <p>Demostración práctica y conceptual del manejo de variables en memoria y tipado dinámico del lenguaje.</p>
</div>

<!-- =======================================================================
     SECCIÓN CONCEPTUAL: FUNDAMENTOS
     ======================================================================= -->
<section class="card card-rebeca-custom">
    <div class="card-header-flex">
        <h3 class="card-title">Conceptos Fundamentales sobre Variables en PHP</h3>
        <span class="evidence-badge">Fundamento Teórico</span>
    </div>

    <div class="concept-box">
        <h3>Declaración y Tipado Dinámico</h3>
        <p>
            En PHP, todas las variables se identifican obligatoriamente con el signo de dólar (<code>$</code>) seguido de un identificador sensible a mayúsculas y minúsculas (<em>case-sensitive</em>).
        </p>
        <p style="margin-top: 8px;">
            PHP es un lenguaje de <strong>tipado dinámico y débilmente tipado</strong>: no es necesario declarar el tipo de dato de una variable antes de utilizarla; el intérprete del servidor infiere automáticamente el tipo según el valor asignado en tiempo de ejecución.
        </p>
    </div>

    <div class="concept-box" style="margin-bottom: 0;">
        <h3>Funciones Nativas de Inspección y Utilidad</h3>
        <ul style="margin-left: 20px; line-height: 1.8;">
            <li><code>echo</code>: Construcción del lenguaje para imprimir una o más cadenas hacia el flujo de salida HTTP.</li>
            <li><code>gettype($var)</code>: Retorna en formato <em>string</em> el tipo de dato asignado internamente por el motor de PHP.</li>
            <li><code>var_dump($var)</code>: Vuelca información estructurada y detallada del tipo y longitud de la variable.</li>
            <li><code>date(formato, timestamp)</code>: Da formato a una fecha/hora local según la zona horaria del servidor.</li>
            <li><code>count($array)</code>: Cuenta todos los elementos presentes en una colección o arreglo.</li>
        </ul>
    </div>
</section>

<!-- =======================================================================
     EVIDENCIA 1: DECLARACIÓN Y USO DE VARIABLES CON ECHO, DATE() Y COUNT()
     ======================================================================= -->
<section class="card card-rebeca-custom">
    <div class="card-header-flex">
        <h3 class="card-title">Evidencia 1: Uso de Variables, date() y count()</h3>
        <span class="evidence-badge">Evidencia 1</span>
    </div>

    <p style="margin-bottom: 16px;">
        A continuación se imprime el contenido de las variables del servidor interpoladas dinámicamente con <code>echo</code> y los resultados de las funciones de tiempo y conteo:
    </p>

    <div class="table-responsive">
        <table class="data-table data-table-elias-custom">
            <thead>
                <tr>
                    <th>Nombre de Variable</th>
                    <th>Expresión / Función PHP Ejecutada</th>
                    <th>Resultado Dinámico Impreso (echo)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>$nombre_materia</code></td>
                    <td><code>echo $nombre_materia;</code></td>
                    <td><strong class="elias-stat-highlight"><?php echo $nombre_materia; ?></strong></td>
                </tr>
                <tr>
                    <td><code>$anio_academico</code></td>
                    <td><code>echo $anio_academico;</code></td>
                    <td><span class="status-badge status-info"><?php echo $anio_academico; ?></span></td>
                </tr>
                <tr>
                    <td><code>$calificacion_promedio</code></td>
                    <td><code>echo $calificacion_promedio;</code></td>
                    <td><span class="elias-stat-highlight"><?php echo $calificacion_promedio; ?> pts</span></td>
                </tr>
                <tr>
                    <td><code>$fecha_servidor</code></td>
                    <td><code>date('d/m/Y H:i:s')</code></td>
                    <td><span class="status-badge status-success"><?php echo $fecha_servidor; ?></span> (Día: <?php echo $dia_nombre; ?>)</td>
                </tr>
                <tr>
                    <td><code>$total_tecnologias</code></td>
                    <td><code>count($tecnologias)</code></td>
                    <td><span class="status-badge status-warning"><?php echo $total_tecnologias; ?> elementos detectados</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<!-- =======================================================================
     EVIDENCIA 2: LOS 5 TIPOS DE DATOS OBLIGATORIOS Y SU INSPECCIÓN
     ======================================================================= -->
<section class="card card-rebeca-custom">
    <div class="card-header-flex">
        <h3 class="card-title">Evidencia 2: Tipos de Datos Primitivos en PHP</h3>
        <span class="evidence-badge">Evidencia 2</span>
    </div>

    <p style="margin-bottom: 16px;">
        Demostración de los 5 tipos de datos requeridos por la rúbrica, analizados en tiempo real mediante <code>gettype()</code>:
    </p>

    <div class="table-responsive">
        <table class="data-table data-table-elias-custom">
            <thead>
                <tr>
                    <th>Variable</th>
                    <th>Tipo Requerido</th>
                    <th>Tipo Reportado por <code>gettype()</code></th>
                    <th>Valor Renderizado</th>
                    <th>Representación en Memoria</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>$nombre_materia</code></td>
                    <td><span class="status-badge status-info">String</span></td>
                    <td><code><?php echo gettype($nombre_materia); ?></code></td>
                    <td>"<?php echo $nombre_materia; ?>"</td>
                    <td>Cadena alfanumérica de caracteres</td>
                </tr>
                <tr>
                    <td><code>$anio_academico</code></td>
                    <td><span class="status-badge status-info">Integer</span></td>
                    <td><code><?php echo gettype($anio_academico); ?></code></td>
                    <td><?php echo $anio_academico; ?></td>
                    <td>Número entero sin decimales</td>
                </tr>
                <tr>
                    <td><code>$calificacion_promedio</code></td>
                    <td><span class="status-badge status-info">Float / Double</span></td>
                    <td><code><?php echo gettype($calificacion_promedio); ?></code></td>
                    <td><?php echo $calificacion_promedio; ?></td>
                    <td>Número con punto flotante</td>
                </tr>
                <tr>
                    <td><code>$sistema_activo</code></td>
                    <td><span class="status-badge status-info">Boolean</span></td>
                    <td><code><?php echo gettype($sistema_activo); ?></code></td>
                    <td>
                        <?php echo $sistema_activo ? 'true (1 en salida de echo)' : 'false (0)'; ?>
                    </td>
                    <td>Valor lógico binario (Verdadero / Falso)</td>
                </tr>
                <tr>
                    <td><code>$tecnologias</code></td>
                    <td><span class="status-badge status-info">Array</span></td>
                    <td><code><?php echo gettype($tecnologias); ?></code></td>
                    <td>[ <?php echo implode(', ', $tecnologias); ?> ]</td>
                    <td>Estructura de colección ordenada de datos</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        <h4 style="margin-bottom: 8px; color: var(--color-secondary);">Inspección Técnica de la Variable Arreglo con <code>var_dump()</code>:</h4>
        <pre class="code-output"><?php ob_start(); var_dump($tecnologias); echo htmlspecialchars(ob_get_clean()); ?></pre>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
