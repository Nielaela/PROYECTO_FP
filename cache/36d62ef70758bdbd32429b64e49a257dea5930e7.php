<?php $__env->startSection('titulo', 'Lista de Cursos'); ?>
<?php $__env->startSection('encabezado', 'Lista de Cursos'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
   <!-- Mensaje para usuarios no conectados -->
   <?php if(!$usuarioConectado): ?>
   <div class="alert alert-warning mt-2" role="alert">
      ¡Inicia sesión para poder adquirir los cursos!.
   </div>
   <?php endif; ?>
    <div class="row">
        <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-img-container">
                        <img src="<?php echo e($ruta_imagenes . '/' . $curso['imagen']); ?>" class="card-img-top" alt="Imagen del curso">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($curso['titulo']); ?></h5>
                        <p class="card-text"><?php echo e($curso['descripcion']); ?></p>
                        <p class="card-text">Dificultad: <?php echo e($curso['nivel_dificultad']); ?></p>
                        <p class="card-text">Precio: <?php echo e($curso['precio']); ?> €</p>
                        <?php if($usuarioConectado): ?>
                        <form action="detalles_curso.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo e($curso['id']); ?>">
                            <button type="submit" class="btn btn-primary">Ver detalles</button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<script src="../views/plantillas/js/verificar_sesion.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>