<?php
$page_title = "Estructuras Condicionales";
require_once __DIR__ . '/includes/header.php';

// =========================================================================
// DATOS REALES PARA EVALUACIÓN CONDICIONAL
// =========================================================================

// Datos para Evidencia 3 (if / elseif / else)
$calificacion_estudiante = 88.5;
$asistencia_porcentaje = 90;

// Datos para Evidencia 4 (switch)
// date('N') retorna el día de la semana en formato ISO-8601 (1 para Lunes, 7 para Domingo)
$numero_dia_semana = (int)date('N');
?>

<div class="page-header">
    <h2>Módulo 2: Estructuras Condicionales y Control de Flujo</h2>
    <p>Toma de decisiones del lado del servidor basada en condiciones booleanas y bifurcaciones múltiples.</p>
</div>

<!-- =======================================================================
     SECCIÓN CONCEPTUAL: FUNDAMENTOS
     ======================================================================= -->
<section class="card card-rebeca-custom">
    <div class="card-header-flex">
        <h3 class="card-title">Conceptos de Control de Flujo en PHP</h3>
        <span class="evidence-badge">Fundamento Teórico</span>
    </div>

    <div class="concept-box">
        <h3>Estructura if / elseif / else</h3>
        <p>
            Permite la ejecución selectiva de bloques de código evaluando expresiones lógicas que se resuelven como verdaderas (<code>true</code>) o falsas (<code>false</code>). Cuando la primera condición <code>if</code> no se cumple, el motor de PHP evalúa sucesivamente las sentencias <code>elseif</code>, y si ninguna es verdadera, ejecuta el bloque por defecto <code>else</code>.
        </p>
    </div>

    <div class="concept-box" style="margin-bottom: 0;">
        <h3>Estructura switch</h3>
        <p>
            Es similar a una serie de sentencias <code>if</code> sobre la misma variable o expresión. Compara el valor contra cláusulas <code>case</code> individuales utilizando comparación no estricta o estricta, ejecutando el bloque correspondiente hasta encontrar una instrucción <code>break</code>. Si ningún caso coincide, se ejecuta el bloque <code>default</code>.
        </p>
    </div>
</section>

<!-- =======================================================================
     EVIDENCIA 3: EVALUACIÓN CON IF / ELSEIF / ELSE
     ======================================================================= -->
<section class="card card-rebeca-custom">
    <div class="card-header-flex">
        <h3 class="card-title">Evidencia 3: Estructura if / elseif / else en Acción</h3>
        <span class="evidence-badge">Evidencia 3</span>
    </div>

    <p style="margin-bottom: 14px;">
        Evaluación dinámica del estatus académico del alumno con calificación <strong><?php echo $calificacion_estudiante; ?></strong> y asistencia de <strong><?php echo $asistencia_porcentaje; ?>%</strong>:
    </p>

    <?php
    // Lógica dinámica ejecutada en PHP
    $estado_academico = "";
    $badge_class = "";
    $mensaje_diagnostico = "";

    if ($calificacion_estudiante >= 95 && $asistencia_porcentaje >= 85) {
        $estado_academico = "Aprobado con Excelencia Honorífica";
        $badge_class = "status-success";
        $mensaje_diagnostico = "El alumno domina satisfactoriamente los contenidos y califica para mención de honor.";
    } elseif ($calificacion_estudiante >= 70 && $asistencia_porcentaje >= 80) {
        $estado_academico = "Aprobado Regular";
        $badge_class = "status-info";
        $mensaje_diagnostico = "El alumno cumple con la calificación mínima aprobatoria y asistencia requerida.";
    } elseif ($calificacion_estudiante >= 60) {
        $estado_academico = "En Período de Recuperación / Asesorías";
        $badge_class = "status-warning";
        $mensaje_diagnostico = "Calificación insuficiente para acreditar de forma directa. Requiere trabajo complementario.";
    } else {
        $estado_academico = "No Acreditado / Reprobado";
        $badge_class = "status-danger";
        $mensaje_diagnostico = "El estudiante no alcanza las competencias mínimas de la unidad.";
    }
    ?>

    <div class="table-responsive">
        <table class="data-table data-table-elias-custom">
            <thead>
                <tr>
                    <th>Variable Evaluada</th>
                    <th>Valor Real</th>
                    <th>Condición Evaluada</th>
                    <th>Estado Resultante</th>
                    <th>Diagnóstico del Servidor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>$calificacion_estudiante</code></td>
                    <td><span class="elias-stat-highlight"><?php echo $calificacion_estudiante; ?> pts</span></td>
                    <td><code>$calificacion >= 70 && $asistencia >= 80</code></td>
                    <td><span class="status-badge <?php echo $badge_class; ?>"><?php echo $estado_academico; ?></span></td>
                    <td><?php echo $mensaje_diagnostico; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 16px;">
        <h4 style="margin-bottom: 6px;">Código PHP Ejecutado:</h4>
        <pre class="code-output">
if ($calificacion_estudiante >= 95 && $asistencia_porcentaje >= 85) {
    $estado_academico = "Aprobado con Excelencia Honorífica";
} elseif ($calificacion_estudiante >= 70 && $asistencia_porcentaje >= 80) {
    $estado_academico = "Aprobado Regular";
} elseif ($calificacion_estudiante >= 60) {
    $estado_academico = "En Período de Recuperación";
} else {
    $estado_academico = "No Acreditado";
}</pre>
    </div>
</section>

<!-- =======================================================================
     EVIDENCIA 4: EVALUACIÓN CON SWITCH
     ======================================================================= -->
<section class="card card-rebeca-custom">
    <div class="card-header-flex">
        <h3 class="card-title">Evidencia 4: Estructura switch en Acción</h3>
        <span class="evidence-badge">Evidencia 4</span>
    </div>

    <p style="margin-bottom: 14px;">
        Evaluación del día actual obtenido dinámicamente con <code>date('N')</code> (Día número: <strong><?php echo $numero_dia_semana; ?></strong> de la semana):
    </p>

    <?php
    $nombre_dia = "";
    $tipo_jornada = "";
    $recomendacion_servidor = "";

    switch ($numero_dia_semana) {
        case 1:
            $nombre_dia = "Lunes";
            $tipo_jornada = "Laboral / Inicio de Semana";
            $recomendacion_servidor = "Planificación de tareas de desarrollo y sincronización de repositorios.";
            break;
        case 2:
            $nombre_dia = "Martes";
            $tipo_jornada = "Laboral";
            $recomendacion_servidor = "Codificación de módulos de servidor y depuración de funciones.";
            break;
        case 3:
            $nombre_dia = "Miércoles";
            $tipo_jornada = "Laboral / Mitad de Semana";
            $recomendacion_servidor = "Pruebas de sesión y verificación de sintaxis en el intérprete PHP.";
            break;
        case 4:
            $nombre_dia = "Jueves";
            $tipo_jornada = "Laboral";
            $recomendacion_servidor = "Revisión cruzada de código y preparación de evidencias técnicas.";
            break;
        case 5:
            $nombre_dia = "Viernes";
            $tipo_jornada = "Laboral / Cierre de Semana";
            $recomendacion_servidor = "Generación del reporte en PDF y consolidación de commits en GitHub.";
            break;
        case 6:
            $nombre_dia = "Sábado";
            $tipo_jornada = "Fin de Semana";
            $recomendacion_servidor = "Mantenimiento preventivo del entorno local y respaldo de proyectos.";
            break;
        case 7:
            $nombre_dia = "Domingo";
            $tipo_jornada = "Fin de Semana";
            $recomendacion_servidor = "Día de descanso y planeación del siguiente ciclo de trabajo.";
            break;
        default:
            $nombre_dia = "Desconocido";
            $tipo_jornada = "No Definido";
            $recomendacion_servidor = "Verificar la configuración de la función date() en el servidor.";
            break;
    }
    ?>

    <div class="table-responsive">
        <table class="data-table data-table-elias-custom">
            <thead>
                <tr>
                    <th>Valor Numérico Evaluado</th>
                    <th>Día Resuelto por <code>switch</code></th>
                    <th>Tipo de Jornada</th>
                    <th>Directiva Asignada por el Servidor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>date('N') => <?php echo $numero_dia_semana; ?></code></td>
                    <td><strong class="elias-stat-highlight"><?php echo $nombre_dia; ?></strong></td>
                    <td><span class="status-badge <?php echo ($numero_dia_semana >= 6) ? 'status-warning' : 'status-success'; ?>"><?php echo $tipo_jornada; ?></span></td>
                    <td><?php echo $recomendacion_servidor; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 16px;">
        <h4 style="margin-bottom: 6px;">Código PHP Ejecutado con Cláusulas <code>case</code> y <code>default</code>:</h4>
        <pre class="code-output">
switch ($numero_dia_semana) {
    case 1: $nombre_dia = "Lunes"; break;
    case 2: $nombre_dia = "Martes"; break;
    case 3: $nombre_dia = "Miércoles"; break;
    case 4: $nombre_dia = "Jueves"; break;
    case 5: $nombre_dia = "Viernes"; break;
    case 6: $nombre_dia = "Sábado"; break;
    case 7: $nombre_dia = "Domingo"; break;
    default: $nombre_dia = "Desconocido"; break;
}</pre>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
