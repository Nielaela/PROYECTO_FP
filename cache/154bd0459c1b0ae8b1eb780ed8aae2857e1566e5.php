<?php $__env->startSection('titulo', 'Detalles del Curso'); ?>
<?php $__env->startSection('encabezado', 'Detalles del Curso'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container my-4">
        <?php if($curso_detalle): ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo e($ruta_imagen . '/' . $curso_detalle['imagen']); ?>" alt="Imagen del curso" style="max-width: 100%; height: auto;">
                </div>
                <div class="col-md-8">
                    <h2><?php echo e($curso_detalle['titulo']); ?></h2>
                    <p><?php echo e($curso_detalle['descripcion']); ?></p>
                    <p>Dificultad: <?php echo e($curso_detalle['nivel_dificultad']); ?></p>
                    <p>Precio: $<?php echo e($curso_detalle['precio']); ?></p>
                    <p>Manual del curso: <a href="<?php echo e($ruta_manual . '/' . $curso_detalle['manual_pdf']); ?>" class="btn btn-primary">Descargar</a></p>
                </div>
            </div>
        <?php else: ?>
            <p>No se encontró información para este curso.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>