<?php
// Detección dinámica de la página activa mediante el nombre del script
$current_page = basename($_SERVER['PHP_SELF']);

// Lista modular de páginas del menú
$menu_items = [
    'index.php'         => '1. Inicio / Portada',
    'variables.php'     => '2. Variables y Tipos',
    'condicionales.php' => '3. Condicionales',
    'bucles.php'        => '4. Bucles y Ciclos',
    'arreglos.php'      => '5. Arreglos y Matrices',
    'sesiones.php'      => '6. Control de Sesiones'
];
?>
<nav class="main-nav" aria-label="Navegación principal del proyecto">
    <?php foreach ($menu_items as $url => $label): ?>
        <?php $is_active = ($current_page === $url) ? 'active' : ''; ?>
        <a href="<?php echo $url; ?>" class="nav-link <?php echo $is_active; ?>">
            <?php echo $label; ?>
        </a>
    <?php endforeach; ?>
</nav>
