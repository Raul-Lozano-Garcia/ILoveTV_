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
    <link rel="icon" href="../../assets/imagenes/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <script type="text/javascript" src="../../js/app.js" defer></script>
</head>
<body>

<?php
    if(!isset($_GET["id"])){
        if(isset($_SESSION["id"]) && $_SESSION["id"]===0){
            header("Location: ../../index.php");
        }else{
            header("Location: series.php");
        }
    }else{
?>

<?php
    require_once("../../php/funciones.php");
    sesionProhibidoAdmin();
    crearHeader("../..");
?>

 <!-- MAIN -->
 <main class="bg-light">

    <!-- PLATAFORMAS_SERIES -->
    <section id="plataformas_series" class="container">

    <?php
        require_once("../../controladores/controlador_plataformas_series_2.php");
        if (isset($plataformas)) {
            foreach ($plataformas as $plataforma) {

                echo "<div class='row img_plataforma'>
                        <div class='col-12 col-md-6 mx-auto text-center'>
                            <img class='img-fluid w-50' src='../../assets/imagenes/plataformas/$plataforma[logotipo]' alt='plataforma'>
                        </div>
                    </div>";            
            }
        } else {
            header("Location: plataformas.php");
        }

        echo "<div class='info_lanzamiento'>";

        require_once("../../controladores/controlador_lanzamientos_series.php");
        if (isset($series)) {
            foreach ($series as $serie) {

                    $fecha=formatearFecha($serie['fecha']);

                    echo "<div class='mb-5 text-center'>
                            <img class='img_lanzamiento img-fluid' src='../../assets/imagenes/series/$serie[foto]' alt='serie'>
                            <h3 class='text-start mt-1'>$serie[nom]</h3>
                            <span class='text-start d-block'>Fecha de estreno: $fecha</span>
                        </div>";            
            }
        } else {
            echo "<h2 class='fw-bold'>No hay series aún</h2>";
        }

        echo "</div>";      
        
    ?>
    </section>

    <!-- MODAL COOKIES -->
    <div class="cookie-consent-modal">
        <div class="content">
            <h2>Permitir cookies</h2>
            <p>Utilizamos cookies propias y de terceros para obtener datos estadísticos de la navegación de nuestros usuarios y mejorar nuestros servicios. Si acepta o continúa navegando, consideramos que acepta su uso. Puede cambiar la configuración u obtener más información <a href="../../vistas/legal/cookies.php">aquí</a></p>
            <div class="btns">
                <button class="btn cancel">Cancelar</button>
                <button class="btn accept">Aceptar</button>
            </div>
        </div>
    </div>
    <!-- FIN PLATAFORMAS_SERIES -->


</main>
<!-- FIN MAIN -->

<?php
    crearFooter("../..");
?>

<?php
    }
?>

</body>
</html>