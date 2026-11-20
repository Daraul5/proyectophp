<?php
// Configuración de zona horaria obligatoria
date_default_timezone_set('America/Mexico_City');

// Control del ciclo de vida de la sesión
$sesion_reiniciada = false;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si se solicita reiniciar explícitamente mediante parámetro GET
if (isset($_GET['reiniciar']) && $_GET['reiniciar'] == '1') {
    // Destrucción completa de la sesión anterior
    session_unset();
    session_destroy();
    
    // Nueva sesión limpia
    session_start();
    $_SESSION['inicio_sesion'] = time();
    $sesion_reiniciada = true;
} elseif (!isset($_SESSION['inicio_sesion'])) {
    // Registro de tiempo inicial al ingresar por primera vez
    $_SESSION['inicio_sesion'] = time();
}

$page_title = "Inicio / Portada del Sistema";
require_once __DIR__ . '/includes/header.php';
?>

<div class="page-header">
    <h2>Bienvenido al Sistema de Demostración Técnica en PHP</h2>
    <p>Proyecto desarrollado para la asignatura de <strong>Programación Web — Unidad 4</strong> (Programación del lado del servidor).</p>
</div>

<?php if ($sesion_reiniciada): ?>
    <div class="alert-box alert-success">
        <strong>¡Ciclo de Sesión Ejecutado!</strong> Se llamó a <code>session_unset()</code> y <code>session_destroy()</code>, eliminando la memoria previa, y se inició una nueva sesión con <code>session_start()</code> fijando una nueva marca de tiempo <code>time()</code>.
    </div>
<?php endif; ?>

<!-- Bloque Conceptual de Inicio -->
<section class="card">
    <div class="card-header-flex">
        <h3 class="card-title">Arquitectura del Proyecto y Ciclo de Vida del Servidor</h3>
        <span class="evidence-badge">Fundamentos de PHP</span>
    </div>

    <div class="concept-box">
        <h3>¿Cómo funciona este sistema sin Base de Datos?</h3>
        <p>
            Esta aplicación web se ejecuta en su totalidad en el servidor mediante <strong>PHP puro</strong>. En cumplimiento estricto con las especificaciones académicas:
        </p>
        <ul style="margin: 10px 0 10px 20px; line-height: 1.8;">
            <li><strong>Persistencia Volátil:</strong> No se utilizan bases de datos (MySQL/SQLite) ni archivos en disco (JSON/TXT/CSV). Los datos temporales y la auditoría de tiempo se mantienen exclusivamente en la memoria del servidor a través de la superglobal <code>$_SESSION</code>.</li>
            <li><strong>Ejecución Dinámica Real:</strong> Todas las salidas, tablas, listas y evaluaciones condicionales son calculadas en tiempo de ejecución por el intérprete de PHP y enviadas como HTML al cliente.</li>
            <li><strong>Modularización:</strong> La interfaz reutiliza componentes limpios (<code>header.php</code>, <code>menu.php</code> y <code>footer.php</code>) a través de inclusiones nativas de PHP.</li>
        </ul>
    </div>

    <p>
        Puedes navegar libremente por los 5 módulos temáticos mediante el menú superior o las tarjetas de acceso rápido mostradas a continuación. El widget superior registrará de manera continua el tiempo que llevas explorando el sistema en la sesión actual.
    </p>
</section>

<!-- Cuadrícula de Módulos del Sistema -->
<section>
    <h3 style="margin-bottom: 16px; color: var(--color-primary);">Módulos Temáticos de Evaluación</h3>
    
    <div class="grid-cards">
        <div class="feature-card">
            <div>
                <span class="evidence-badge" style="margin-bottom: 8px; display: inline-block;">Evidencias 1 y 2</span>
                <h4>Variables y Tipos</h4>
                <p>Declaración de variables con prefijo <code>$</code>, los 5 tipos primitivos de PHP, funciones nativas <code>date()</code> y <code>count()</code>, y tipado dinámico con <code>gettype()</code>.</p>
            </div>
            <a href="variables.php" class="btn-card">Explorar Variables &rarr;</a>
        </div>

        <div class="feature-card">
            <div>
                <span class="evidence-badge" style="margin-bottom: 8px; display: inline-block;">Evidencias 3 y 4</span>
                <h4>Estructuras Condicionales</h4>
                <p>Control de flujo y toma de decisiones en el servidor mediante bloques <code>if / elseif / else</code> y evaluación múltiple estructurada con <code>switch</code>.</p>
            </div>
            <a href="condicionales.php" class="btn-card">Explorar Condicionales &rarr;</a>
        </div>

        <div class="feature-card">
            <div>
                <span class="evidence-badge" style="margin-bottom: 8px; display: inline-block;">Evidencias 5, 6 y 7</span>
                <h4>Bucles y Ciclos</h4>
                <p>Estructuras repetitivas ejecutadas sobre datos reales: <code>for</code> generando secuencias/tablas, <code>while</code> con control de índice y <code>foreach</code> para colecciones.</p>
            </div>
            <a href="bucles.php" class="btn-card">Explorar Bucles &rarr;</a>
        </div>

        <div class="feature-card">
            <div>
                <span class="evidence-badge" style="margin-bottom: 8px; display: inline-block;">Evidencias 8 y 9</span>
                <h4>Arreglos y Matrices</h4>
                <p>Arreglos indexados, asociativos (clave-valor) y arreglos multidimensionales representados en tablas HTML dinámicas con condicionales <code>if/else</code> integrados.</p>
            </div>
            <a href="arreglos.php" class="btn-card">Explorar Arreglos &rarr;</a>
        </div>

        <div class="feature-card">
            <div>
                <span class="evidence-badge" style="margin-bottom: 8px; display: inline-block;">Evidencia 10</span>
                <h4>Manejo de Sesiones</h4>
                <p>Auditoría completa del ciclo de vida en memoria: <code>session_id()</code>, inspección cruda con <code>print_r($_SESSION)</code>, fórmulas de tiempo y reinicio seguro.</p>
            </div>
            <a href="sesiones.php" class="btn-card">Explorar Sesiones &rarr;</a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
