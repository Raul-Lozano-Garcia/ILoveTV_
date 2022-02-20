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

    <!-- LANZAMIENTOS -->
<section id="lanzamientosAdmin" class="container"> 
    <?php

        require_once("../../controladores/controlador_lanzamientos_admin.php");
        
        if (isset($lanzamientos)) {
            echo "
            <div class='row'>
                <div class='col-12'>
                    <div class='insertar text-center'>
                        <a href='insertar_lanzamiento.php' class='btn boton con_animacion'>Insertar lanzamiento</a>
                    </div>
                </div>
            </div>
            <div class='row'>
                <table>
                <tr><th>Serie</th><th>Plataforma</th><th>Fecha</th><th></th><th></th></tr>";
            foreach ($lanzamientos as $lanzamiento) {
                $marca=strtotime($lanzamiento["fecha"]);
                $fecha=date("d/m/Y",$marca);
                echo "<tr>
                        <td>$lanzamiento[ser]</td>
                        <td>$lanzamiento[pla]</td>
                        <td>$fecha</td>
                        <td>
                            <form method='POST' action='modificar_lanzamiento.php'>
                                <input type='hidden' name='serie' value='$lanzamiento[serie]'>
                                <input type='hidden' name='plataforma' value='$lanzamiento[plataforma]'>
                                <input type='submit' name='enviarId' value='Modificar' class='btn boton'>
                            </form>
                         </td>
                        <td>
                            <form method='POST' action='../../controladores/controlador_borrar_lanzamiento.php'>
                                <input type='hidden' name='serie' value='$lanzamiento[serie]'>
                                <input type='hidden' name='plataforma' value='$lanzamiento[plataforma]'>
                                <input type='submit' name='enviarBorrar' value='Borrar' class='btn boton'>
                            </form>
                        </td>
                    </tr>";
            }

            echo "</table>
            </div>";
        } else {
            echo "<h2 class='fw-bold text-center'>No hay lanzamientos aún</h2>";
        }
        
    ?>
    </section>
    
    <!-- FIN LANZAMIENTOS -->


</main>
<!-- FIN MAIN -->

<?php
    crearFooter("../..");
?>

</body>
</html>