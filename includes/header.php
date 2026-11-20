<?php
// Configuración de la zona horaria obligatoria
date_default_timezone_set('America/Mexico_City');

// Inicialización de sesión si aún no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Respaldo de inicio de sesión si se ingresa directo a una subpágina
if (!isset($_SESSION['inicio_sesion'])) {
    $_SESSION['inicio_sesion'] = time();
}

// Cálculos dinámicos de sesión en memoria
$hora_inicio = date('H:i:s', $_SESSION['inicio_sesion']);
$hora_actual = date('H:i:s', time());
$segundos_totales = time() - $_SESSION['inicio_sesion'];
$minutos = floor($segundos_totales / 60);
$segundos = $segundos_totales % 60;
$tiempo_activo_formato = "{$minutos} minutos {$segundos} segundos";

// Título de la página si no está definido previamente
if (!isset($page_title)) {
    $page_title = "Desarrollo Web con PHP - Unidad 4";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?> | Mini Proyecto 1</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- Barra de Estado de Sesión en Memoria (Persistente en todas las vistas) -->
    <header class="session-bar">
        <div class="container session-bar-content">
            <div class="session-info-group">
                <span class="session-badge-item">
                    <span class="session-pulse-dot" title="Sesión activa en memoria del servidor"></span>
                    <strong>Sesión Activa</strong>
                </span>
                <span class="session-badge-item">
                    <span>Inicio:</span>
                    <strong><?php echo $hora_inicio; ?></strong>
                </span>
                <span class="session-badge-item">
                    <span>Hora actual:</span>
                    <strong><?php echo $hora_actual; ?></strong>
                </span>
                <span class="session-badge-item">
                    <span>Tiempo transcurrido:</span>
                    <strong><?php echo $tiempo_activo_formato; ?></strong>
                </span>
            </div>
            <div>
                <a href="index.php?reiniciar=1" class="btn-restart-session" title="Destruye e inicia una nueva sesión con time()">
                    Reiniciar Sesión
                </a>
            </div>
        </div>
    </header>

    <!-- Encabezado Principal y Menú Modular -->
    <header class="main-header">
        <div class="container header-branding">
            <h1>Mini Proyecto 1 — Programación Web (Unidad 4)</h1>
            <p>Demostración dinámica de servidor con PHP puro (Variables, Condicionales, Bucles, Arreglos y Sesiones)</p>
        </div>
        
        <?php require_once __DIR__ . '/menu.php'; ?>
    </header>

    <!-- Contenido Dinámico de la Página -->
    <main class="site-content">
        <div class="container">
