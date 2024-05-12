<?php $__env->startSection('titulo', 'Inicio'); ?>
<?php $__env->startSection('encabezado', 'HomePage'); ?>

<?php $__env->startSection('content'); ?>

<section id="about" class="padding-small mt-xl-5">
    <div class="container">
      <div class="row align-items-center mt-xl-5">
        <div class="offset-md-12 col-md-5">
          <img src="../views/plantillas/images/pexels-waad-abdulaziz-280714012-12999714.jpg" alt="img" style="max-width: 300px" class="img-fluid rounded-5">
        </div>
        <div class="col-md-5 mt-5 mt-md-0">
          <div class="mb-3">
            <h2 class="display-6 fw-semibold">¿Quiénes somos?</h2>
          </div>
          <p>Bienvenido a <b>Tejedores de Sueños</b>, el lugar perfecto para todos los amantes del crochet. En nuestra plataforma, encontrarás un espacio interactivo donde podrás:</p>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Compartir con el resto de usuarios tus inquietudes y dudas.</p>
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Explorar nuevos patrones para tu colección.</p>
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Aprender nuevas técnicas gracias a los cursos ofrecidos por la plataforma.</p>
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <p class="ps-4">Compartir tus creaciones con la comunidad.</p>
          </div>
          <p>Descubre una comunidad apasionada por esta labor, Tejedores de Sueños es tu destino para inspirarte y hacer realidad tus proyectos.</p>
          <p>Únete a nuestra comunidad hoy mismo y comienza a tejer tus sueños.</p>
          <a href="account.php" class="btn btn-primary px-2 py-2 ">Acceso</a>

        </div>
      </div>
    </div>
  </section>

  <section id="seccion" class="padding-medium">
    <div class="container">
      <div class="text-center mb-5">
        <p class="text-secondary">Visita y explora nuestros rincones</p>
        <h2 class="display-6 fw-semibold">¡Patrones, cursos... y más!</h2>
      </div>

      <div class="row">
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="cursos.php"><img src="../views/plantillas/images/curso_ganch.png" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <div class="d-flex justify-content-between my-3">
                <p class="text-black-50 fw-bold text-uppercase m-0">Cursos</p>
                <div class="d-flex align-items-center">
                </div>
              </div>

              <a href="cursos.php">
                <h5 class="seccion-title py-2 m-0">Accede aquí para ver todos los cursos disponibles</h5>
              </a>

            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="#"><img src="../views/plantillas/images/blog_ganch.png" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <div class="d-flex justify-content-between my-3">
                <p class="text-black-50 fw-bold text-uppercase m-0">Blog</p>
                <div class="d-flex align-items-center">
                </div>
              </div>

              <a href="#">
                <h5 class="seccion-title py-2 m-0">Visita nuestro blog y comparte tus inquietudes</h5>
              </a>

            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="#"><img src="../views/plantillas/images/patrones_ganch.png" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <div class="d-flex justify-content-between my-3">
                <p class="text-black-50 fw-bold text-uppercase m-0">Patrones</p>
                <div class="d-flex align-items-center">
                </div>
              </div>

              <a href="#">
                <h5 class="seccion-title py-2 m-0">Ven y descubre nuestra colección de patrones</h5>
              </a>

            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="#"><img src="../views/plantillas/images/pexels-anete-lusina-4792086.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <div class="d-flex justify-content-between my-3">
                <p class="text-black-50 fw-bold text-uppercase m-0">Proyectos</p>
                <div class="d-flex align-items-center">
                </div>
              </div>

              <a href="#">
                <h5 class="seccion-title py-2 m-0">Comparte tus creaciones</h5>
              </a>

            </div>
          </div>
        </div>

    </div>
  </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>