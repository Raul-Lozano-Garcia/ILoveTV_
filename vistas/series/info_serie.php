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

    <!-- INFO SERIE -->
    <section id="info_serie" class="container">
    <?php
        require_once("../../controladores/controlador_series_info.php");
        if(isset($series)){
            foreach ($series as $serie) {
                echo "<div class='row mb-5'>
                        <div class='col-12 col-md-6 text-center mb-5 mb-md-0'>
                            <img class='img-fluid w-50' src='../../assets/imagenes/series/$serie[foto]' alt='serie'>
                        </div>
                        <div class='col-12 col-md-6 p-3 p-md-0'>
                            <h1 class='d-inline-block'>$serie[nombre]</h1>
                            <p>"; echo nl2br("$serie[descripcion]"); echo"</p>
                        </div>
                    </div>";
            }

            echo "<div class='row'>
                    <div class='col-12 text-center text-light py-5 px-3 bg-dark'>
                        <h2>Plataformas disponibles</h2>
                    </div>
                </div>
                <div class='row'>";

                    require_once("../../controladores/controlador_lanzamientos_donde_serie.php");
                    foreach ($lanzamientos as $lanzamiento) {

                        $fecha=formatearFecha($lanzamiento['fecha']);

                        echo "<div class='col-12 col-md-4 p-5'>
                                <div class='plataforma_disponible'>
                                    <img class='img-fluid' src='../../assets/imagenes/plataformas/$lanzamiento[logotipo]' alt='plataforma'>
                                </div>
                                <div class='text-center mt-3 fecha_estreno'>
                                    <span>Fecha de estreno: $fecha</span>
                                </div>   
                            </div>";
                    }

                    echo "</div>";

            if(isset($_SESSION["id"])){
                echo "<section id='comentarios'>
                        <div class='row text-light bg-dark'>
                            <div class='col-12 text-center py-5 px-3'>
                                <h2>Comentarios</h2>
                            </div>
                        </div>
                        <div class='row text-light bg-dark'>
                            <div class='col-10 col-md-6 mx-auto pb-3'>
                                <form class='comentario' action='../../controladores/controlador_insertar_comentarios_en_series.php' method='POST'>
                                    <input type='hidden' name='serie' value='$_GET[id]'>
                                    <textarea name='comentario' maxlength='5000' placeholder='Añade tu comentario' rows='3' required></textarea>
                                    <input type='submit' name='enviarComentario' value='Insertar' class='btn boton'>
                                </form>
                            </div>
                        </div>";

                        require_once("../../controladores/controlador_mostrar_comentarios.php");
                        if (isset($comentarios)) {
                            echo "<div class='row text-light bg-dark p-3'>";
                            foreach ($comentarios as $comentario) {
                                $fecha=formatearFecha($comentario["fecha"]);
                                echo "<div class='col-12'>
                                        <div class='row g-0 fila_comentario pt-3'>
                                            <div class='col-12 col-md-6'>
                                                <h3>$comentario[nick]</h3>
                                            </div>
                                            <div class='col-12 col-md-6'>
                                                <h3 class='text-md-end'>$fecha</h3>
                                            </div>
                                        </div>
                                        <div class='row g-0'>
                                            <div class='col-12'>
                                                <p class='fst-italic'>\"$comentario[texto]\"</p>
                                            </div>
                                        </div>
                                    </div>";
                            }
                            echo "</div>";
                        } else {

                            echo "<div class='row text-light bg-dark py-5'>
                                    <h2 class='fw-bold text-center'>No hay comentarios aún</h2>
                                </div>";
                        }
                    echo "</section>";
            }
        }else{
            header("Location: series.php");
        }
            
        
        
    ?>
    </section>
    <!-- FIN INFO SERIE -->

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