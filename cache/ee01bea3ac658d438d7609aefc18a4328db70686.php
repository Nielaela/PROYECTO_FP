<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tejedores de sueños. Crochet </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<link rel="stylesheet" type="text/css" href="../views/plantillas/icomoon/icomoon.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="../views/plantillas/css/vendor.css">
<link rel="stylesheet" type="text/css" href="../views/plantillas/style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

</head>
<header>
  <section id="top-nav">
    <div class="container-fluid">
        <div class="row justify-content-end">
          <div class="col-md-4 text-center px-md-3 py-md-2 mt-2">
            <p class="text-white py-1 m-0">Únete y disfruta de la plataforma.
              <span><a href="account.php" class="text-white text-decoration-underline">Registrate</a></span>
            </p>
          </div>
            <div class="col-md-4 text-center mb-2">
                <?php if(isset($_SESSION['usuario'])): ?>
                <!-- Usuario autenticado -->
                <div class="float-right d-inline-flex mt-2">
                    <input type="text" value='<?php echo e($_SESSION['usuario']['nombre']); ?>' class="form-control mr-2 bg-transparent text-white" disabled>
                    <a href='cerrar_sesion.php' class='btn btn-primary'>Salir</a>
                </div>
                <?php else: ?>
                <!-- Formulario de inicio de sesión -->
                <form action="login.php" method="POST" class="form-inline float-right d-inline-flex mt-2">
                    <div class="form-group mr-2">
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario">
                    </div>
                    <div class="form-group mr-2 ">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Iniciar sesión</button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

  <div class="container-fluid">
    <div class="main-logo text-center mt-3">
      <a href="index.php">
        <img src="../views/plantillas/images/main_logo.png" alt="logo" class="img-fluid">
      </a>
    </div>
  </div>
</header>
<body>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <defs>
      <symbol id="tick-circle" viewBox="0 0 15 15">
        <path fill="currentColor" fill-rule="evenodd"
          d="M0 7.5a7.5 7.5 0 1 1 15 0a7.5 7.5 0 0 1-15 0m7.072 3.21l4.318-5.398l-.78-.624l-3.682 4.601L4.32 7.116l-.64.768z"
          clip-rule="evenodd" />
      </symbol>
    </defs>
  </svg>

  <div class="preloader-wrapper">
    <div class="preloader">
    </div>
  </div>

  <nav class="main-menu d-flex navbar navbar-expand-lg p-2 py-2 p-lg-3 py-lg-3 ">
    <div class="container-fluid">
      <!-- <div class="main-logo d-lg-none">
        <a href="index.html">
          <img src="../views/plantillas/images/Logotipo_principal_fondo_transparente.png" alt="logo" class="img-fluid">
        </a>
      </div> -->

      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

        <div class="offcanvas-header mt-3">
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body justify-content-center">
          <ul class="navbar-nav menu-list list-unstyled align-items-lg-center d-flex gap-md-3 mb-0">
            <li class="nav-item">
              <a href="index.php" class="nav-link mx-2 active">Inicio</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link mx-2 align-items-center" role="button" id="cursos"
                  href="cursos.php" aria-expanded="false">Cursos</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link mx-2 align-items-center" role="button" id="patrones"
                href="patrones.php" aria-expanded="false">Patrones</a>
            </li>
            
            

            <li class="nav-item dropdown">
              <a class="nav-link mx-2 align-items-center" role="button" id="blog"
              href="#" aria-expanded="false">blog</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link mx-2 align-items-center" role="button" id="proyectos"
                href="#" aria-expanded="false">Proyectos</a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link mx-2">Contacto</a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link mx-2 align-items-center" role="button" id="miCuenta"
              href="mi_perfil.php" aria-expanded="false">Mi cuenta</a>
            </li>

          </ul>

        </div>
      </div>

    </div>

  </nav>
  
<?php echo $__env->yieldContent('content'); ?> 

<section id="prefooter">
    <div class="container padding-small">
      <div class="row align-items-center">
       
<!-- ****revisar -->
      </div>
    </div>
  </section>
<footer id="footer">
    <div class="container padding-small ">
      <div class="row">
        <div class="col-sm-6 col-lg-4 my-3">
          <div class="footer-menu">
            <a href="index.php">
              <img src="../views/plantillas/images/main_logo.png" alt="logo" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2 my-3">
          <div class="footer-menu">
            <h5 class=" fw-bold mb-4">Enlaces</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="cursos.php" class="footer-link">Cursos</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Patrones</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Blog</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Proyectos</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2 my-3">
          <div class="footer-menu">
            <h5 class=" fw-bold mb-4">Información</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Aviso legal</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Contacto</a>
              </li>
              <li class="menu-item mb-2">
                <a href="mi_perfil.php" class="footer-link">Mi cuenta</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2 my-3">
          <div class="footer-menu">
            <h5 class=" fw-bold mb-4">Contacto</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">hola@tejedoresdesueños.es
              </li>
              <li class="menu-item mb-2">Cantabria (España)
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div id="footer-bottom">
    <hr class="text-black-50">
    <div class="container">
      <div class="row py-3">
        <div class="col-md-6 copyright">
          <p>© 2024 Tejedores de sueños. Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="../views/plantillas/js/jquery-1.11.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="../views/plantillas/js/plugins.js"></script>
  <script src="../views/plantillas/js/script.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  
</body>

</html>