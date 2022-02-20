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

    <!-- PLATAFORMAS -->

    <?php
        //NO REGISTRADO Y USUARIO
        if(!isset($_SESSION["id"]) || $_SESSION["id"]!==0){
    ?>
    <section id="plataformas" class="container">
        <div class="row">
            <div class='col-12 text-center text-light py-5 px-3 bg-dark'>
                <h1>Plataformas disponibles</h1>
            </div>
        </div>
    <?php
        require_once("../../controladores/controlador_plataformas_series.php");
        if (isset($plataformas)) {
            echo "<div class='row'>";
            foreach ($plataformas as $plataforma) {
                echo "<div class='col-12 col-md-5 m-auto text-center py-5'>
                        <a href='plataformas_series.php?id=$plataforma[id]'><img class='img-fluid w-50' src='../../assets/imagenes/plataformas/$plataforma[logotipo]' alt='plataforma'></a>
                    </div>";
            }
            echo "</div>";
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

<section id="plataformasAdmin" class="container">
    <div class="row">
        <div class="col-12">
            <div class="insertar text-center">
                <a href="insertar_plataforma.php" class='btn boton con_animacion'>Insertar plataforma</a>
            </div>
        </div>
    </div>
    <?php
    echo "<div class='row'>
            <div class='col-12 col-md-4 mt-5 ms-auto px-1'>
                <form class='busqueda' action='#' method='GET'>
                    <input type='text' name='busqueda' maxlength='50' placeholder='Nombre de la plataforma'>
                    <input type='submit' value='Buscar' class='btn boton'>
                </form>
            </div>
            </div>";

        require_once("../../controladores/controlador_plataformas_admin.php");
        
        if (isset($plataformas)) {
            echo "<div class='row'>
                <table>
                <tr><th>Nombre</th><th>Logotipo</th><th></th></tr>";
            foreach ($plataformas as $plataforma) {
                echo "<tr>
                        <td>$plataforma[nombre]</td>
                        <td><img src='../../assets/imagenes/plataformas/$plataforma[logotipo]' class='img-fluid'></td>  
                        <td>
                            <form method='POST' action='modificar_plataforma.php'>
                                <input type='hidden' name='id' value='$plataforma[id]'>
                                <input type='submit' name='enviarId' value='Modificar' class='btn boton'>
                            </form>
                         </td>
                    </tr>";
            }

            echo "</table>
            </div>";
        } else {
            echo "<h2 class='fw-bold text-center'>No hay plataformas aún</h2>";
        }
        
    ?>
    </section>

    <?php
        }
    ?>
    <!-- FIN PLATAFORMAS -->


</main>
<!-- FIN MAIN -->

<?php
    crearFooter("../..");
?>

</body>
</html>