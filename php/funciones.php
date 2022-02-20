<?php
  function formatearFecha($fecha){
    $timestamp=strtotime($fecha);
    $fechaFormateada=date('d/m/Y',$timestamp);
    return $fechaFormateada;
  }

  function extension_imagen($tipo_imagen){
    $extension="";
    switch($tipo_imagen){
        case "image/jpeg": $extension=".jpg";
        break;
        case "image/png": $extension=".png";
        break;
    }
    return $extension;
}

  function sesionNormal($ruta){
      if(isset($_GET["cerrar_sesion"])){
        if(isset($_COOKIE['mantener'])){
            setcookie("mantener",null,time()-60,"/");
        }
        $_SESSION=array();
        session_destroy();
        header("Location: $ruta/index.php");
    }else if(isset($_COOKIE["mantener"])){
        session_decode($_COOKIE["mantener"]);
    }
  }

  function sesionAcceder(){
    if(isset($_COOKIE["mantener"])){
      session_decode($_COOKIE["mantener"]);
    }

    if(isset($_SESSION["id"])){
        header('Location: ../../index.php');
    }
  }

  function sesionProhibidoAdmin(){
    if(isset($_GET["cerrar_sesion"])){
        if(isset($_COOKIE['mantener'])){
            setcookie("mantener",null,time()-60,"/");
        }
        $_SESSION=array();
        session_destroy();
        header('Location: ../../index.php');
    }else{
        if(isset($_COOKIE["mantener"])){
          session_decode($_COOKIE["mantener"]);
        }
    
        if(isset($_SESSION["id"]) && $_SESSION["id"]===0){
            header('Location: ../../index.php');
        }

    }
  }

  function sesionSoloAdmin(){
    if(isset($_GET["cerrar_sesion"])){
        if(isset($_COOKIE['mantener'])){
            setcookie("mantener",null,time()-60,"/");
        }
        $_SESSION=array();
        session_destroy();
        header('Location: ../../index.php');
    }else{
        if(isset($_COOKIE["mantener"])){
          session_decode($_COOKIE["mantener"]);
        }
    
        if(!isset($_SESSION["id"]) || $_SESSION["id"]!==0){
            header('Location: ../../index.php');
        }

    }
  }

    function crearHeaderIndex($ruta){
      if(isset($_SESSION["id"]) && $_SESSION["id"]==0){
        echo "
        <header class='fixed-top zindex-fixed'>

        <!-- NAV -->
        <nav class='navbar navbar-index navbar-expand-md navbar-dark transparente px-md-5'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='$ruta/index.php'><img src='$ruta/assets/imagenes/logo.png' class='img-fluid logo logo-index' alt='logo'></a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav ms-auto'>
                  <li class='nav-item me-5'>
                    <a class='nav-link active' aria-current='page' href='$ruta/index.php'>Inicio</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/series/series.php'>Series</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/plataformas/plataformas.php'>Plataformas</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/lanzamientos/lanzamientos.php'>Lanzamientos</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/socios/socios.php'>Socios</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/comentarios/comentarios.php'>Comentarios</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/pyr/pyr.php'>Preguntas frecuentes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='$ruta/index.php?cerrar_sesion'>Salir</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!-- FIN NAV -->

    </header>
        ";
      }else if(isset($_SESSION["id"]) && $_SESSION["id"]!=0){
        echo "
        <header class='fixed-top zindex-fixed'>

        <!-- NAV -->
        <nav class='navbar navbar-index navbar-expand-md navbar-dark transparente px-md-5'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='$ruta/index.php'><img src='$ruta/assets/imagenes/logo.png' class='img-fluid logo logo-index' alt='logo'></a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav ms-auto'>
                  <li class='nav-item me-5'>
                    <a class='nav-link active' aria-current='page' href='$ruta/index.php'>Inicio</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/series/series.php'>Series</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/plataformas/plataformas.php'>Plataformas</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/pyr/pyr.php'>Preguntas frecuentes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='$ruta/index.php?cerrar_sesion'>Salir</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!-- FIN NAV -->

    </header>
        ";
      }else{
        echo "
        <header class='fixed-top zindex-fixed'>

        <!-- NAV -->
        <nav class='navbar navbar-index navbar-expand-md navbar-dark transparente px-md-5'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='$ruta/index.php'><img src='$ruta/assets/imagenes/logo.png' class='img-fluid logo logo-index' alt='logo'></a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav ms-auto'>
                  <li class='nav-item me-5'>
                    <a class='nav-link active' aria-current='page' href='$ruta/index.php'>Inicio</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/series/series.php'>Series</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/plataformas/plataformas.php'>Plataformas</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/pyr/pyr.php'>Preguntas frecuentes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='$ruta/vistas/acceder/acceder.php'>Acceder</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!-- FIN NAV -->

    </header>
        ";
      }
        
    }

    function crearHeader($ruta){
      if(isset($_SESSION["id"]) && $_SESSION["id"]===0){
        echo "
        <header class='sticky-top zindex-sticky'>
  
        <!-- NAV -->
        <nav class='navbar navbar-expand-md navbar-dark px-md-5'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='$ruta/index.php'><img src='$ruta/assets/imagenes/logo.png' class='img-fluid logo' alt='logo'></a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav ms-auto'>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/index.php'>Inicio</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/series/series.php'>Series</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/plataformas/plataformas.php'>Plataformas</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/lanzamientos/lanzamientos.php'>Lanzamientos</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/socios/socios.php'>Socios</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/comentarios/comentarios.php'>Comentarios</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/pyr/pyr.php'>Preguntas frecuentes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='$ruta/index.php?cerrar_sesion'>Salir</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!-- FIN NAV -->
  
    </header>
        ";
      }else if(isset($_SESSION["id"]) && $_SESSION["id"]!==0){
        echo "
        <header class='sticky-top zindex-sticky'>
  
        <!-- NAV -->
        <nav class='navbar navbar-expand-md navbar-dark px-md-5'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='$ruta/index.php'><img src='$ruta/assets/imagenes/logo.png' class='img-fluid logo' alt='logo'></a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav ms-auto'>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/index.php'>Inicio</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/series/series.php'>Series</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/plataformas/plataformas.php'>Plataformas</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/pyr/pyr.php'>Preguntas frecuentes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='$ruta/index.php?cerrar_sesion'>Salir</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!-- FIN NAV -->
  
    </header>
        ";
      }else{
        echo "
        <header class='sticky-top zindex-sticky'>
  
        <!-- NAV -->
        <nav class='navbar navbar-expand-md navbar-dark px-md-5'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='$ruta/index.php'><img src='$ruta/assets/imagenes/logo.png' class='img-fluid logo' alt='logo'></a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav ms-auto'>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/index.php'>Inicio</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/series/series.php'>Series</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/plataformas/plataformas.php'>Plataformas</a>
                  </li>
                  <li class='nav-item me-5'>
                    <a class='nav-link' href='$ruta/vistas/pyr/pyr.php'>Preguntas frecuentes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='$ruta/vistas/acceder/acceder.php'>Acceder</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!-- FIN NAV -->
  
    </header>
        ";
      }
      
  }

    function crearFooter($ruta){
      echo "
      <footer class='container-fluid bg-dark text-light'>
        <div class='row'>
            <div class='col-12'>
                <div class='container py-5'>
                    <div class='row'>
                        <div class='col-md-3 my-5'>
                            <h3 class='fw-bold'>ILoveTV</h3>
                            <h4 class='my-5 h6'>La web para los amantes de las series</h4>
                            <h5><a href='$ruta/vistas/legal/aviso.php' class='h6 fw-bold text-uppercase text-light'>Aviso legal</a></h5>
                            <h5><a href='$ruta/vistas/legal/privacidad.php' class='h6 fw-bold text-uppercase text-light'>Política de privacidad</a></h5>
                            <h5><a href='$ruta/vistas/legal/cookies.php' class='h6 fw-bold text-uppercase text-light'>Política de cookies</a></h5>
                        </div>
                        <div class='col-md-4 offset-md-1 my-5'>
                            <h3 class='fw-bold text-uppercase'>Únete a nuestra Newsletter</h3>
                            <form action='#' method='post'>
                                <div>
                                    <label for='fn'>Nombre completo</label>
                                    <input type='text' name='fn' id='fn'>
                                </div>       
                                <div>
                                    <label for='email'>Correo electrónico</label>
                                    <input type='email' name='email' id='email'>
                                </div>
                                <input class='btn mt-3' type='submit' value='Suscríbete'>
                            </form>
                        </div>
                        <div class='col-md-3 offset-md-1 my-5'>
                            <h3 class='fw-bold text-uppercase'>Explora</h3>
                            <h4><a href='$ruta/index.php' class='text-uppercase text-light'>Inicio</a></h4>
                            <h4><a href='$ruta/vistas/series/series.php' class='text-uppercase text-light'>Series</a></h4>
                            <h4><a href='$ruta/vistas/plataformas/plataformas.php' class='text-uppercase text-light'>Plataformas</a></h4>
                            <h4><a href='$ruta/vistas/pyr/pyr.php' class='text-uppercase text-light'>Preguntas frecuentes</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>
      ";
    }
?>
