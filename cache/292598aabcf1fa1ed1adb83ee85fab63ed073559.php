<?php $__env->startSection('titulo', 'Detalles del Patrón'); ?>
<?php $__env->startSection('encabezado', 'Detalles del Patrón'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container my-4">
        <?php if($patron_detalle): ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo e($ruta_imagen . '/' . $patron_detalle['imagen']); ?>" alt="Imagen del patrón" style="max-width: 100%; height: auto;">
                </div>
                <div class="col-md-8">
                    <h2><?php echo e($patron_detalle['nombre']); ?></h2>
                    <p><?php echo e($patron_detalle['descripcion']); ?></p>
                    <p>Dificultad: <?php echo e($patron_detalle['nivel_dificultad']); ?></p>
                    <p>Cetgoria: <?php echo e($patron_detalle['categoria']); ?></p>
                    <p>Creador: <?php echo e($patron_detalle['nombre_usuario']); ?></p>
                    <p>Manual del patron: <a href="<?php echo e($ruta_manual . '/' . $patron_detalle['manual_patron']); ?>" id = "boton-descargar" class="btn btn-primary">Descargar</a></p>
                </div>
            </div>
        <?php else: ?>
            <p>No se encontró información para este patron.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<script>
    var usuarioConectado = <?php echo json_encode($usuarioConectado, 15, 512) ?>;
    
<script src="../views/plantillas/js/verificar_sesion.js"></script>

<?php echo $__env->make('plantillas.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>