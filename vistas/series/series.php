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
    require_once("../../php/funciones.php");
    sesionNormal("../..");
    crearHeader("../..");
?>

 <!-- MAIN -->
 <main class="bg-light">

    <!-- LANZAMIENTOS -->
    <?php
        //NO REGISTRADO Y USUARIO
        if(!isset($_SESSION["id"]) || $_SESSION["id"]!==0){
    ?>

<section id="lanzamientos" class="container">
    <?php
        require_once("../../controladores/controlador_plataformas_series.php");
        if (isset($plataformas)) {
            foreach ($plataformas as $plataforma) {
                echo "<div class='row img_plataforma'>
                        <div class='col-12 col-md-6 mx-auto text-center'>
                            <img class='img-fluid w-50' src='../../assets/imagenes/plataformas/$plataforma[logotipo]' alt='plataforma'>
                        </div>
                    </div>";

                echo "<div class='info_lanzamiento'>";

                include "../../controladores/controlador_lanzamientos.php";
                if (isset($lanzamientos)) {
                    foreach ($lanzamientos as $lanzamiento) {
                       
                        if($plataforma['id']===$lanzamiento['idP']){

                            echo "<div class='mb-5 text-center'>
                                    <img class='img_lanzamiento img-fluid' src='../../assets/imagenes/series/$lanzamiento[foto]' alt='lanzamiento'>
                                    <h3 class='text-start mt-1'>$lanzamiento[nombre]</h3>
                                    <a href='info_serie.php?id=$lanzamiento[idS]' class='btn boton con_animacion'>Ver más</a>
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

    <?php
        //ADMIN
        }else if($_SESSION["id"]===0){
    ?>
<section id="seriesAdmin" class="container">
    <div class="row">
        <div class="col-12">
            <div class="insertar text-center">
                <a href="insertar_serie.php" class='btn boton con_animacion'>Insertar serie</a>
            </div>
        </div>
    </div>
    <?php
    echo "<div class='row'>
            <div class='col-12 col-md-4 mt-5 ms-auto px-1'>
                <form class='busqueda' action='#' method='GET'>
                    <input type='text' name='busqueda' maxlength='50' placeholder='Nombre de la serie'>
                    <input type='submit' value='Buscar' class='btn boton'>
                </form>
            </div>
            </div>";

        require_once("../../controladores/controlador_series_admin.php");
        
        if (isset($series)) {
            echo "<div class='row'>
                <table>
                <tr><th>Nombre</th><th class='largo'>Descripción</th><th>Foto</th><th></th><th></th></tr>";
            foreach ($series as $serie) {
                echo "<tr>
                        <td>$serie[nombre]</td>
                        <td class='largo'>"; echo nl2br("$serie[descripcion]"); echo"</td>";

                        if($serie["activo"]==='0'){
                            echo "<td><img src='../../assets/imagenes/series/$serie[foto]' class='img-fluid desactivada'></td>";
                        }else{
                            echo "<td><img src='../../assets/imagenes/series/$serie[foto]' class='img-fluid'></td>";
                        }
                        
                        echo "<td>
                            <form method='POST' action='modificar_serie.php'>
                                <input type='hidden' name='id' value='$serie[id]'>
                                <input type='submit' name='enviarId' value='Modificar' class='btn boton'>
                            </form>
                         </td>
                         ";

                        if($serie["activo"]==='1'){
                            echo "<td>
                            <form method='POST' action='../../controladores/controlador_desactivar_serie.php'>
                                <input type='hidden' name='id' value='$serie[id]'>
                                <input type='submit' name='enviarActivo' value='Desactivar' class='btn boton'>
                            </form>
                        </td>";
                        }
                        echo "
                    </tr>";
            }

            echo "</table>
            </div>";
        } else {
            echo "<h2 class='fw-bold text-center'>No hay series aún</h2>";
        }
        
    ?>
    </section>
    <?php
        }
    ?>
    
    <!-- FIN LANZAMIENTOS -->


</main>
<!-- FIN MAIN -->

<?php
    crearFooter("../..");
?>

</body>
</html>