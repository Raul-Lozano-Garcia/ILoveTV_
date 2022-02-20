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
    sesionSoloAdmin();
    crearHeader("../..");
?>

 <!-- MAIN -->
 <main class="bg-light">

    <!-- SOCIOS -->
<section id="sociosAdmin" class="container">
    <div class="row">
        <div class="col-12">
            <div class="insertar text-center">
                <a href="insertar_socio.php" class='btn boton con_animacion'>Insertar socio</a>
            </div>
        </div>
    </div>
    <?php
    echo "<div class='row'>
            <div class='col-12 col-md-4 mt-5 ms-auto px-1'>
                <form class='busqueda' action='#' method='GET'>
                    <input type='text' name='busqueda' maxlength='50' placeholder='Nombre del socio'>
                    <input type='submit' value='Buscar' class='btn boton'>
                </form>
            </div>
            </div>";

        require_once("../../controladores/controlador_socios_admin.php");
        
        if (isset($socios)) {
            echo "<div class='row'>
                <table>
                <tr><th>Nombre</th><th>Nick</th><th></th><th></th></tr>";
            foreach ($socios as $socio) {
                echo "<tr>
                        <td>$socio[nombre]</td>
                        <td>$socio[nick]</td>
                        <td>
                            <form method='POST' action='modificar_socio.php'>
                                <input type='hidden' name='id' value='$socio[id]'>
                                <input type='submit' name='enviarId' value='Modificar' class='btn boton'>
                            </form>
                         </td>
                         ";

                        if($socio["activo"]==='1'){
                            echo "<td>
                            <form method='POST' action='../../controladores/controlador_desactivar_socio.php'>
                                <input type='hidden' name='id' value='$socio[id]'>
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
            echo "<h2 class='fw-bold text-center'>No hay socios aún</h2>";
        }
        
    ?>
    </section>
    
    <!-- FIN SOCIOS -->


</main>
<!-- FIN MAIN -->

<?php
    crearFooter("../..");
?>

</body>
</html>