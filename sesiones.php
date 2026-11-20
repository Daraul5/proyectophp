<?php
$page_title = "Control y Auditoría de Sesiones";
require_once __DIR__ . '/includes/header.php';

// Variables de auditoría técnica de la sesión en curso
$id_sesion = session_id();
$timestamp_crudo = $_SESSION['inicio_sesion'];
$timestamp_actual = time();
$segundos_diferencia = $timestamp_actual - $timestamp_crudo;
$minutos_calculados = floor($segundos_diferencia / 60);
$segundos_restantes = $segundos_diferencia % 60;
$hora_inicio_formato = date('d/m/Y H:i:s', $timestamp_crudo);
$hora_actual_formato = date('d/m/Y H:i:s', $timestamp_actual);
?>

<div class="page-header">
    <h2>Módulo 5: Gestión y Auditoría de Sesiones en Memoria</h2>
    <p>Persistencia temporal de estado en el servidor mediante la superglobal <code>$_SESSION</code> y ciclo de vida de sesión.</p>
</div>

<!-- =======================================================================
     SECCIÓN CONCEPTUAL: FUNDAMENTOS
     ======================================================================= -->
<section class="card">
    <div class="card-header-flex">
        <h3 class="card-title">Conceptos del Ciclo de Vida de Sesiones en PHP</h3>
        <span class="evidence-badge">Fundamento Teórico</span>
    </div>

    <div class="concept-box">
        <h3>¿Qué es una sesión y cómo opera sin base de datos?</h3>
        <p>
            Una sesión en PHP es un mecanismo de persistencia en el lado del servidor que permite conservar información entre distintas peticiones HTTP de un mismo usuario. Debido a que el protocolo HTTP es <em>sin estado</em> (stateless), PHP utiliza una cookie ligera en el cliente llamada <code>PHPSESSID</code> para asociar al navegador con un espacio de memoria exclusivo en el servidor.
        </p>
    </div>

    <div class="concept-box" style="margin-bottom: 0;">
        <h3>Funciones Nativas del Ciclo de Vida</h3>
        <ul style="margin-left: 20px; line-height: 1.8;">
            <li><code>session_start()</code>: Inicializa o reanuda la sesión existente. Debe invocarse antes de cualquier salida HTML.</li>
            <li><code>$_SESSION</code>: Arreglo superglobal donde se almacenan y leen las variables en la memoria volátil del servidor.</li>
            <li><code>session_id()</code>: Obtiene o establece el identificador único alfanumérico asignado por PHP a la sesión actual.</li>
            <li><code>session_unset()</code>: Libera todas las variables registradas actualmente en <code>$_SESSION</code>.</li>
            <li><code>session_destroy()</code>: Destruye toda la información registrada de la sesión en el almacenamiento temporal del servidor.</li>
        </ul>
    </div>
</section>

<!-- =======================================================================
     EVIDENCIA 10: INSPECCIÓN TÉCNICA Y AUDITORÍA DE SESIÓN
     ======================================================================= -->
<section class="card">
    <div class="card-header-flex">
        <h3 class="card-title">Evidencia 10: Auditoría de la Sesión en Memoria</h3>
        <span class="evidence-badge">Evidencia 10</span>
    </div>

    <p style="margin-bottom: 16px;">
        Valores extraídos directamente de la memoria temporal del servidor en tiempo real:
    </p>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Parámetro de Auditoría</th>
                    <th>Función o Expresión PHP</th>
                    <th>Valor Obtenido en Memoria</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Identificador de Sesión (ID)</strong></td>
                    <td><code>session_id()</code></td>
                    <td><span class="status-badge status-info"><code><?php echo $id_sesion; ?></code></span></td>
                </tr>
                <tr>
                    <td><strong>Timestamp Unix Inicial</strong></td>
                    <td><code>$_SESSION['inicio_sesion']</code></td>
                    <td><code><?php echo $timestamp_crudo; ?></code> (segundos desde el 01/01/1970)</td>
                </tr>
                <tr>
                    <td><strong>Timestamp Unix Actual</strong></td>
                    <td><code>time()</code></td>
                    <td><code><?php echo $timestamp_actual; ?></code></td>
                </tr>
                <tr>
                    <td><strong>Hora de Inicio Formateada</strong></td>
                    <td><code>date('d/m/Y H:i:s', $timestamp_crudo)</code></td>
                    <td><strong><?php echo $hora_inicio_formato; ?></strong></td>
                </tr>
                <tr>
                    <td><strong>Hora del Servidor en Esta Petición</strong></td>
                    <td><code>date('d/m/Y H:i:s', time())</code></td>
                    <td><strong><?php echo $hora_actual_formato; ?></strong></td>
                </tr>
                <tr>
                    <td><strong>Diferencia Cruda en Segundos</strong></td>
                    <td><code>time() - $_SESSION['inicio_sesion']</code></td>
                    <td><strong><?php echo $segundos_diferencia; ?></strong> segundos transcurridos</td>
                </tr>
                <tr>
                    <td><strong>Fórmula de Minutos</strong></td>
                    <td><code>floor($segundos / 60)</code></td>
                    <td><strong><?php echo $minutos_calculados; ?></strong> minutos</td>
                </tr>
                <tr>
                    <td><strong>Fórmula de Segundos Restantes</strong></td>
                    <td><code>$segundos % 60</code></td>
                    <td><strong><?php echo $segundos_restantes; ?></strong> segundos</td>
                </tr>
                <tr>
                    <td><strong>Tiempo Activo Total (Formato Rúbrica)</strong></td>
                    <td><code>"{$minutos} minutos {$segundos} segundos"</code></td>
                    <td>
                        <span class="status-badge status-success">
                            <strong><?php echo $minutos_calculados; ?> minutos <?php echo $segundos_restantes; ?> segundos</strong>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Volcado crudo de $_SESSION -->
    <div style="margin-top: 24px;">
        <h4 style="margin-bottom: 8px; color: var(--color-secondary);">Volcado Crudo de la Superglobal <code>$_SESSION</code> con <code>print_r()</code>:</h4>
        <pre class="code-output"><?php ob_start(); print_r($_SESSION); echo htmlspecialchars(ob_get_clean()); ?></pre>
    </div>

    <!-- Panel de Acción y Reinicio -->
    <div style="margin-top: 24px; padding: 20px; background-color: #fff1f2; border: 1px solid #fecdd3; border-radius: var(--border-radius);">
        <h4 style="color: var(--color-danger); margin-bottom: 8px;">Control del Ciclo de Vida: Reinicio de Sesión</h4>
        <p style="font-size: 0.93rem; color: #4c0519; margin-bottom: 16px;">
            Al pulsar el botón a continuación, el sistema enviará la petición a <code>index.php?reiniciar=1</code>. El servidor ejecutará <code>session_unset()</code> y <code>session_destroy()</code> para liberar la memoria actual y generará una nueva marca de tiempo mediante <code>session_start()</code> y <code>time()</code>.
        </p>
        <a href="index.php?reiniciar=1" class="btn-restart-session" style="font-size: 0.95rem; padding: 10px 18px;">
            Destruir y Reiniciar Sesión Ahora
        </a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
