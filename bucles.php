<?php
$page_title = "Bucles y Ciclos Repetitivos";
require_once __DIR__ . '/includes/header.php';

// =========================================================================
// DATOS REALES PARA DEMOSTRACIÓN DE BUCLES
// =========================================================================

// Arreglo real para Evidencia 6 (while)
$tareas_servidor = [
    "Inicialización del motor Zend PHP",
    "Carga de módulos mod_rewrite y cabeceras HTTP",
    "Asignación de zona horaria America/Mexico_City",
    "Generación de identificador de sesión único",
    "Verificación de permisos de lectura en includes/"
];

// Arreglo real para Evidencia 7 (foreach)
$frameworks_php = [
    ["nombre" => "Laravel", "tipo" => "Full-Stack", "version" => "11.x", "popularidad" => "Muy Alta"],
    ["nombre" => "Symfony", "tipo" => "Componentes Modulares", "version" => "7.x", "popularidad" => "Alta"],
    ["nombre" => "CodeIgniter", "tipo" => "Ligero / Minimalista", "version" => "4.x", "popularidad" => "Media"],
    ["nombre" => "Slim Framework", "tipo" => "Micro-Framework REST", "version" => "4.x", "popularidad" => "Alta"]
];
?>

<div class="page-header">
    <h2>Módulo 3: Bucles y Estructuras de Repetición</h2>
    <p>Generación algorítmica de contenido y recorrido de colecciones en memoria mediante <code>for</code>, <code>while</code> y <code>foreach</code>.</p>
</div>

<!-- =======================================================================
     SECCIÓN CONCEPTUAL: FUNDAMENTOS
     ======================================================================= -->
<section class="card card-rebeca-custom">
    <div class="card-header-flex">
        <h3 class="card-title">Conceptos y Comparativa de Bucles en PHP</h3>
        <span class="evidence-badge">Fundamento Teórico</span>
    </div>

    <div class="concept-box">
        <h3>¿Cuándo utilizar cada estructura repetitiva?</h3>
        <ul style="margin-left: 20px; line-height: 1.8;">
            <li><strong>Bucle <code>for</code>:</strong> Se utiliza cuando se conoce con exactitud el número de iteraciones de antemano. Maneja en su cabecera la inicialización, la condición de parada y el paso o incremento (<code>for ($i = 1; $i <= $n; $i++)</code>).</li>
            <li><strong>Bucle <code>while</code>:</strong> Itera mientras una condición permanezca como verdadera (<code>true</code>). Es ideal para procesos cuyo final depende de un estado dinámico o un puntero de control.</li>
            <li><strong>Bucle <code>foreach</code>:</strong> Diseñado específicamente para recorrer arreglos y objetos de forma segura sin necesidad de gestionar manualmente punteros o índices numéricos.</li>
        </ul>
    </div>
</section>

<!-- =======================================================================
     EVIDENCIA 5: BUCLE FOR GENERANDO SALIDA DINÁMICA
     ======================================================================= -->
<section class="card card-rebeca-custom">
    <div class="card-header-flex">
        <h3 class="card-title">Evidencia 5: Bucle for (Cálculo y Proyección Numérica)</h3>
        <span class="evidence-badge">Evidencia 5</span>
    </div>

    <p style="margin-bottom: 14px;">
        Generación de una tabla dinámica con 10 iteraciones de proyección de carga de memoria simulada (Paso * Factor base de 64 KB):
    </p>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Iteración ($i)</th>
                    <th>Operación Matemática Ejecutada</th>
                    <th>Memoria Asignada (KB)</th>
                    <th>Equivalente en Megabytes (MB)</th>
                    <th>Estado de Carga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $factor_base = 64;
                for ($i = 1; $i <= 10; $i++) {
                    $memoria_kb = $i * $factor_base;
                    $memoria_mb = round($memoria_kb / 1024, 2);
                    $badge = ($i <= 5) ? 'status-success' : (($i <= 8) ? 'status-warning' : 'status-danger');
                    $etiqueta = ($i <= 5) ? 'Carga Óptima' : (($i <= 8) ? 'Carga Media' : 'Carga Elevada');
                    
                    echo "<tr>";
                    echo "<td><strong>Iteración #{$i}</strong></td>";
                    echo "<td><code>{$i} &times; {$factor_base} KB</code></td>";
                    echo "<td>{$memoria_kb} KB</td>";
                    echo "<td>{$memoria_mb} MB</td>";
                    echo "<td><span class='status-badge {$badge}'>{$etiqueta}</span></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 14px;">
        <h4 style="margin-bottom: 6px;">Código PHP Ejecutado:</h4>
        <pre class="code-output">
for ($i = 1; $i <= 10; $i++) {
    $memoria_kb = $i * 64;
    $memoria_mb = round($memoria_kb / 1024, 2);
    // Renderizado dinámico de filas HTML con echo
}</pre>
    </div>
</section>

<!-- =======================================================================
     EVIDENCIA 6: BUCLE WHILE RECORRIENDO DATOS REALES
     ======================================================================= -->
<section class="card card-rebeca-custom">
    <div class="card-header-flex">
        <h3 class="card-title">Evidencia 6: Bucle while (Control por Índice)</h3>
        <span class="evidence-badge">Evidencia 6</span>
    </div>

    <p style="margin-bottom: 14px;">
        Recorrido de una lista real de verificación del servidor mediante un contador incremental <code>$indice</code> evaluado en la cabecera del <code>while</code>:
    </p>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Índice ($indice)</th>
                    <th>Tarea del Sistema Verificada</th>
                    <th>Condición Evaluada</th>
                    <th>Resultado de Ejecución</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $indice = 0;
                $limite = count($tareas_servidor);

                while ($indice < $limite) {
                    $tarea_actual = $tareas_servidor[$indice];
                    $paso_num = $indice + 1;
                    
                    echo "<tr>";
                    echo "<td>Posición <code>[{$indice}]</code></td>";
                    echo "<td>{$tarea_actual}</td>";
                    echo "<td><code>{$indice} &lt; {$limite}</code> (true)</td>";
                    echo "<td><span class='status-badge status-success'>Verificado en paso {$paso_num}</span></td>";
                    echo "</tr>";
                    
                    $indice++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 14px;">
        <h4 style="margin-bottom: 6px;">Código PHP Ejecutado:</h4>
        <pre class="code-output">
$indice = 0;
$limite = count($tareas_servidor);
while ($indice < $limite) {
    echo "Fila renderizada: " . $tareas_servidor[$indice];
    $indice++; // Incremento obligatorio para evitar bucles infinitos
}</pre>
    </div>
</section>

<!-- =======================================================================
     EVIDENCIA 7: BUCLE FOREACH GENERANDO ELEMENTOS DINÁMICOS
     ======================================================================= -->
<section class="card card-rebeca-custom">
    <div class="card-header-flex">
        <h3 class="card-title">Evidencia 7: Bucle foreach (Iteración de Colección)</h3>
        <span class="evidence-badge">Evidencia 7</span>
    </div>

    <p style="margin-bottom: 14px;">
        Recorrido de una colección de tecnologías generando dinámicamente una lista no ordenada (<code>&lt;ul&gt;</code>) y tarjetas informativas:
    </p>

    <div style="background-color: #f8fafc; border: 1px solid var(--color-border); border-radius: var(--border-radius); padding: 18px; margin-bottom: 20px;">
        <h4 style="margin-bottom: 10px; color: var(--color-primary);">Lista HTML Generada con <code>foreach</code>:</h4>
        <ul style="margin-left: 24px; line-height: 2;">
            <?php foreach ($frameworks_php as $fw): ?>
                <li>
                    <strong><?php echo $fw['nombre']; ?></strong> 
                    (Versión actual: <code><?php echo $fw['version']; ?></code>) — 
                    <em><?php echo $fw['tipo']; ?></em>. 
                    Popularidad en el ecosistema: 
                    <span class="status-badge status-info"><?php echo $fw['popularidad']; ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div>
        <h4 style="margin-bottom: 6px;">Código PHP Ejecutado:</h4>
        <pre class="code-output">
foreach ($frameworks_php as $fw) {
    echo "&lt;li&gt;" . $fw['nombre'] . " (" . $fw['version'] . ")&lt;/li&gt;";
}</pre>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
