<?php $__env->startSection('titulo', 'Lista de Patrones'); ?>
<?php $__env->startSection('encabezado', 'Lista de Patrones'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">
                        <label for="filtro-categoria">Filtrar por Categoría:</label>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <select id="filtro-categoria" class="form-control">
                            <option value="">Todos</option>
                            <option value="amigurumis">Amigurumis</option>
                            <option value="prendas_ropa">Prendas de Ropa</option>
                            <option value="accesorios">Accesorios</option>
                        </select>
                        <div class="input-group-append">
                            <button id="btn-filtrar" class="btn btn-primary" type="button">Filtrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!-- Botón para subir un nuevo patrón -->
            <button class="btn btn-primary mt-2" id="boton-subir-patron" onclick="mostrarFormulario()">Agregar Nuevo Patrón</button>
            <!-- Formulario para subir un nuevo patrón -->
            <div id="formulario-accion" style="display: none;">
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="agregar_patron.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nivel_dificultad">Dificultad:</label>
                                <select id="nivel_dificultad" name="nivel_dificultad" class="form-control" required>
                                    <option value="">--Seleccione--</option>
                                    <option value="Facil">Facil</option>
                                    <option value="Medio">Medio</option>
                                    <option value="Dificil">Dificil</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoría:</label>
                                <select id="categoria" name="categoria" class="form-control" required>
                                    <option value="">--Seleccione--</option>
                                    <option value="amigurumis">Amigurumis</option>
                                    <option value="prendas_ropa">Prendas de Ropa</option>
                                    <option value="accesorios">Accesorios</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen:</label>
                                <input type="file" id="imagen" name="imagen" class="form-control-file" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <label for="manual">Manual del patrón:</label>
                                <input type="file" id="manual" name="manual" class="form-control-file" accept=".pdf*" required>
                            </div>
                            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo e($_SESSION['usuario']->id); ?>">
                            <button type="submit" id="btn-submit" class="btn btn-primary">Guardar Patrón</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <?php $__currentLoopData = $patrones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patron): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4 <?php echo e($patron['categoria']); ?>">
                <div class="card">
                    <div class="card-img-container">
                        <img src="<?php echo e($ruta_imagenes . '/' . $patron['imagen']); ?>" class="card-img-top" alt="Imagen del patrón">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($patron['nombre']); ?></h5>
                        <p class="card-text"><?php echo e($patron['descripcion']); ?></p>
                        <p class="card-text">Dificultad: <?php echo e($patron['nivel_dificultad']); ?></p>
                        <p class="card-text">Categoría: <?php echo e($patron['categoria']); ?></p>
                        <p class="card-text">Subido por: <?php echo e($patron['nombre_usuario']); ?></p>
                        <form action="detalles_patron.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo e($patron['id']); ?>">
                            <button type="submit" class="btn btn-primary">Ver detalles</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<script src="../views/plantillas/js/mostrar_formulario.js"></script>
<script src="../views/plantillas/js/verificar_sesion.js"></script>
<script src="../views/plantillas/js/filtrado_patron_categoria.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>