<?php
$page_title = "Arreglos y Matrices";
require_once __DIR__ . '/includes/header.php';

// =========================================================================
// DEFINICIÓN DE ARREGLOS REALES EN MEMORIA
// =========================================================================

// 1. Arreglo Indexado (Índices numéricos implícitos 0, 1, 2...)
$servidores_web = [
    "Apache HTTP Server",
    "Nginx Web Engine",
    "LiteSpeed Web Server",
    "Caddy Server",
    "Microsoft IIS"
];

// 2. Arreglo Asociativo (Estructura Clave => Valor)
$ficha_servidor = [
    "Sistema Operativo"    => "Linux (Ubuntu Server 24.04 LTS)",
    "Motor PHP"            => "PHP 8.3 Zend Engine",
    "Límite de Memoria"    => "256M (memory_limit)",
    "Zona Horaria"         => "America/Mexico_City",
    "Persistencia"         => "Memoria Temporal de Sesión (Sin Base de Datos)",
    "Protocolo de Red"     => "HTTP / HTTPS Seguro"
];

// 3. Arreglo Multidimensional (Catálogo de Productos / Componentes de Hardware)
$catalogo_equipos = [
    [
        "codigo"        => "SRV-001",
        "producto"      => "Servidor Rack Dell PowerEdge R750",
        "categoria"     => "Servidores",
        "precio"        => 3850.00,
        "stock"         => 8,
        "garantia_meses"=> 36
    ],
    [
        "codigo"        => "SWT-020",
        "producto"      => "Switch Gestionable Cisco Catalyst 48 Puertos",
        "categoria"     => "Redes",
        "precio"        => 1420.50,
        "stock"         => 0, // Agotado para probar condición if/else
        "garantia_meses"=> 24
    ],
    [
        "codigo"        => "UPS-500",
        "producto"      => "Sistema UPS APC Smart-Online 3kVA",
        "categoria"     => "Energía",
        "precio"        => 980.00,
        "stock"         => 4,
        "garantia_meses"=> 12
    ],
    [
        "codigo"        => "NAS-104",
        "producto"      => "Almacenamiento Synology DiskStation 8 Bahías",
        "categoria"     => "Almacenamiento",
        "precio"        => 1150.00,
        "stock"         => 2, // Stock bajo
        "garantia_meses"=> 24
    ],
    [
        "codigo"        => "FRW-300",
        "producto"      => "Firewall Fortinet FortiGate 60F",
        "categoria"     => "Seguridad",
        "precio"        => 890.00,
        "stock"         => 0, // Agotado
        "garantia_meses"=> 12
    ]
];
?>

<div class="page-header">
    <h2>Módulo 4: Arreglos y Matrices en PHP</h2>
    <p>Estructuras de datos en memoria: arreglos indexados, asociativos y matrices multidimensionales con condicionales de renderizado.</p>
</div>

<!-- =======================================================================
     SECCIÓN CONCEPTUAL: FUNDAMENTOS
     ======================================================================= -->
<section class="card">
    <div class="card-header-flex">
        <h3 class="card-title">Conceptos de Estructuras de Datos en PHP</h3>
        <span class="evidence-badge">Fundamento Teórico</span>
    </div>

    <div class="concept-box">
        <h3>Tipos de Arreglos en PHP</h3>
        <ul style="margin-left: 20px; line-height: 1.8;">
            <li><strong>Arreglos Indexados:</strong> Colecciones donde cada posición se accede mediante un índice numérico secuencial que inicia en <code>0</code>.</li>
            <li><strong>Arreglos Asociativos:</strong> Colecciones basadas en pares clave-valor (<em>key => value</em>), donde las claves son cadenas personalizadas que le dan significado semántico a los datos.</li>
            <li><strong>Arreglos Multidimensionales:</strong> Arreglos cuyos elementos son a su vez otros arreglos, conformando matrices o tablas bidimensionales de registros estructurados.</li>
        </ul>
    </div>
</section>

<!-- =======================================================================
     EVIDENCIA 8: ARREGLOS INDEXADOS Y ASOCIATIVOS
     ======================================================================= -->
<section class="card">
    <div class="card-header-flex">
        <h3 class="card-title">Evidencia 8: Arreglos Indexados y Asociativos</h3>
        <span class="evidence-badge">Evidencia 8</span>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
        
        <!-- Bloque 1: Arreglo Indexado -->
        <div>
            <h4 style="color: var(--color-primary); margin-bottom: 10px;">1. Arreglo Indexado (Servidores Web)</h4>
            <p style="font-size: 0.9rem; color: #64748b; margin-bottom: 12px;">Recorrido directo con <code>foreach ($servidores_web as $indice => $servidor)</code>:</p>
            
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Índice Numérico</th>
                            <th>Servidor Registrado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($servidores_web as $indice => $servidor): ?>
                            <tr>
                                <td><code>[<?php echo $indice; ?>]</code></td>
                                <td><strong><?php echo $servidor; ?></strong></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bloque 2: Arreglo Asociativo -->
        <div>
            <h4 style="color: var(--color-primary); margin-bottom: 10px;">2. Arreglo Asociativo (Ficha Técnica)</h4>
            <p style="font-size: 0.9rem; color: #64748b; margin-bottom: 12px;">Recorrido con clave-valor <code>foreach ($ficha_servidor as $clave => $valor)</code>:</p>
            
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Propiedad (Clave)</th>
                            <th>Configuración (Valor)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ficha_servidor as $clave => $valor): ?>
                            <tr>
                                <td><strong><?php echo $clave; ?></strong></td>
                                <td><code><?php echo $valor; ?></code></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<!-- =======================================================================
     EVIDENCIA 9: ARREGLO MULTIDIMENSIONAL CON CONDICIONAL IF/ELSE INTERNO
     ======================================================================= -->
<section class="card">
    <div class="card-header-flex">
        <h3 class="card-title">Evidencia 9: Arreglo Multidimensional con Evaluación Condicional</h3>
        <span class="evidence-badge">Evidencia 9</span>
    </div>

    <p style="margin-bottom: 14px;">
        Recorrido de la matriz <code>$catalogo_equipos</code> mediante <code>foreach</code>. Dentro de cada fila se ejecuta una evaluación <code>if / elseif / else</code> sobre la variable <code>$item['stock']</code> para aplicar dinámicamente colores de estado y acciones recomendadas:
    </p>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción del Producto</th>
                    <th>Categoría</th>
                    <th>Precio Unitario (USD)</th>
                    <th>Unidades en Stock</th>
                    <th>Estado de Disponibilidad (if/else)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($catalogo_equipos as $item): ?>
                    <?php
                    // Evaluación condicional dentro del bucle foreach
                    if ($item['stock'] >= 5) {
                        $badge_clase = "status-success";
                        $texto_disponibilidad = "Disponible (Stock Suficiente)";
                    } elseif ($item['stock'] > 0 && $item['stock'] < 5) {
                        $badge_clase = "status-warning";
                        $texto_disponibilidad = "Últimas Piezas (Pedir Reabastecimiento)";
                    } else {
                        $badge_clase = "status-danger";
                        $texto_disponibilidad = "Agotado / Sin Inventario";
                    }
                    ?>
                    <tr>
                        <td><code><?php echo $item['codigo']; ?></code></td>
                        <td><strong><?php echo $item['producto']; ?></strong></td>
                        <td><?php echo $item['categoria']; ?></td>
                        <td>$<?php echo number_format($item['precio'], 2); ?></td>
                        <td>
                            <?php if ($item['stock'] > 0): ?>
                                <strong><?php echo $item['stock']; ?></strong> unidades
                            <?php else: ?>
                                <span style="color: var(--color-danger); font-weight: bold;">0 unid.</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="status-badge <?php echo $badge_clase; ?>">
                                <?php echo $texto_disponibilidad; ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 16px;">
        <h4 style="margin-bottom: 6px;">Código PHP Ejecutado con Condicional Interno:</h4>
        <pre class="code-output">
foreach ($catalogo_equipos as $item) {
    if ($item['stock'] >= 5) {
        $badge = "status-success";
        $estado = "Disponible";
    } elseif ($item['stock'] > 0) {
        $badge = "status-warning";
        $estado = "Últimas Piezas";
    } else {
        $badge = "status-danger";
        $estado = "Agotado";
    }
    // Renderizado dinámico de la fila con clase CSS calculada
}</pre>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
