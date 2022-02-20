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

    <!-- COMENTARIOS -->
<section id="comentariosAdmin" class="container">
    <?php

        require_once("../../controladores/controlador_comentarios_admin.php");

        if (isset($comentarios)) {
            echo "<div class='row'>
                <table>
                <tr><th>Socio</th><th>Serie</th><th>Fecha</th><th class='largo'>Texto</th><th></th></tr>";
            foreach ($comentarios as $comentario) {
                $marca=strtotime($comentario["fecha"]);
                $fecha=date("d/m/Y",$marca);
                echo "<tr>
                        <td>$comentario[soc]</td>
                        <td>$comentario[ser]</td>
                        <td>$fecha</td>
                        <td class='largo'>"; echo nl2br("$comentario[texto]"); echo"</td>
                        <td>
                            <form method='POST' action='../../controladores/controlador_borrar_comentario.php'>
                                <input type='hidden' name='socio' value='$comentario[socio]'>
                                <input type='hidden' name='serie' value='$comentario[serie]'>
                                <input type='submit' name='enviarId' value='Borrar' class='btn boton'>
                            </form>
                         </td>
                    </tr>";
            }

            echo "</table>
            </div>";
        } else {
            echo "<h2 class='fw-bold text-center'>No hay comentarios aún</h2>";
        }
        
    ?>
    </section>
    
    <!-- FIN COMENTARIOS -->


</main>
<!-- FIN MAIN -->

<?php
    crearFooter("../..");
?>

</body>
</html>