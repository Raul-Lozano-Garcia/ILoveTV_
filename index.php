<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILoveTV || La web para los amantes de las series</title>
    <link rel="icon" href="assets/imagenes/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/app.js" defer></script>
</head>
<body>

<?php
    require_once("php/funciones.php");
    
    sesionNormal(".");
    
    crearHeaderIndex(".");
?>

 <!-- MAIN -->
 <main class="bg-light">

    <!-- BANNER -->
    <section id="banner" class="container-fluid">
        <div class="row">
            <video src="assets/videos/banner.mp4" autoplay loop muted></video>  
            <div class="banner-logo d-none d-md-flex col-md-6">
                <img src="assets/imagenes/logo.png" alt="logo" class="img-fluid">
            </div>
            <div class="banner-texto col-12 col-md-6 px-5">
                <div class="text-light text-center text-md-start">
                    <span class="h1 text-uppercase">Prepárate para alucinar</span> 
                    <p class="my-3">Más de mil plataformas y series te esperan aquí, es una de las mejores páginas para informarte de los últimos estrenos. No solo podrás visualizarlos, sino que también podrás dejar tu review de la serie que te apetezca.</p>
                    <a href="vistas/series/series.php" class="btn boton con_animacion">Ver más</a>
                </div>  
            </div>
        </div>
    </section>
    <!-- FIN BANNER -->

    <div id="titulo" class="container-fluid bg-dark">
        <div class="row">
            <h1 class="col-12 text-center text-light py-5 px-3">La web para los amantes de las series</h1>
        </div>
    </div>

    <!-- ULTIMOS LANZAMIENTOS -->
    <section id="ultimos_lanzamientos" class="container">
    <?php
        require_once("controladores/controlador_plataformas_index.php");
        if (isset($plataformas)) {
            foreach ($plataformas as $plataforma) {
                echo "<div class='row img_plataforma'>
                        <div class='col-12 col-md-6 mx-auto text-center'>
                            <img class='img-fluid w-50' src='assets/imagenes/plataformas/$plataforma[logotipo]' alt='plataforma'>
                        </div>
                    </div>";

                echo "<div class='info_lanzamiento'>";

                include "controladores/controlador_4_lanzamientos.php";
                if (isset($lanzamientos)) {
                    foreach ($lanzamientos as $lanzamiento) {
                       
                        if($plataforma['id']===$lanzamiento['idP']){

                            $fecha=formatearFecha($lanzamiento['fecha']);

                            echo "<div class='mb-5 text-center'>
                                    <img class='img_lanzamiento img-fluid' src='assets/imagenes/series/$lanzamiento[foto]' alt='lanzamiento'>
                                    <h3 class='text-start mt-1'>$lanzamiento[nombre]</h3>
                                    <span class='text-start d-block'>Fecha de estreno: $fecha</span>
                                </div>";
                        }       
                           
                    }
                } else {
                    echo "<h2 class='fw-bold'>No hay lanzamientos aún</h2>";
                }

                echo "</div>";
            }
        } else {
            echo "<h2 class='fw-bold'>No hay plataformas aún</h2>";
        }
        
    ?>
    </section>
    <!-- FIN ULTIMOS LANZAMIENTOS -->

    <!-- ÚLTIMOS COMENTARIOS -->
    <section id="ultimos_comentarios" class="container p-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center fw-bold mb-5 d-inline-block">Últimos comentarios</h2>
            </div>
        </div>
        <div class="row">
            
                
                <?php
                require_once("controladores/controlador_5_comentario.php");
                if (isset($comentarios)) {
                    echo "<div class='owl-carousel owl-theme'>";
                    foreach ($comentarios as $comentario) {
                            $fecha=formatearFecha($comentario['fecha']);

                            echo "
                            <div class='item'>
                                <div class='card'>
                                    <img src='assets/imagenes/series/$comentario[foto]' alt='imagen comentario' class='card-img-top'>
                                    <div class='card-body text-center'>
                                        <h3>$comentario[nombre]</h3>
                                        <span>$fecha</span>
                                        <i class='fa-solid fa-quote-right'></i>
                                        <p class='fst-italic'>$comentario[texto]</p>
                                    </div>
                                </div>
                            </div> 
                            ";
                           
                    }
                    echo "</div>";
                } else {
                    echo "<h3 class='fw-bold text-center'>No hay comentarios aún</h3>";
                }
                ?>
        </div>
    </section>

    <!-- FIN ÚLTIMOS COMENTARIOS -->

    <!-- MODAL COOKIES -->
    <div class="cookie-consent-modal">
        <div class="content">
            <h2>Permitir cookies</h2>
            <p>Utilizamos cookies propias y de terceros para obtener datos estadísticos de la navegación de nuestros usuarios y mejorar nuestros servicios. Si acepta o continúa navegando, consideramos que acepta su uso. Puede cambiar la configuración u obtener más información <a href="vistas/legal/cookies.php">aquí</a></p>
            <div class="btns">
                <button class="btn cancel">Cancelar</button>
                <button class="btn accept">Aceptar</button>
            </div>
        </div>
    </div>

</main>
<!-- FIN MAIN -->

<?php
    crearFooter(".");
?>

</body>
</html>